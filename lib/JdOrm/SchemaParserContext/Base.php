<?php
namespace JdOrm\SchemaParserContext;
abstract class Base implements \JsonSerializable {
    protected static $ELEMENT_HANDLERS = [];

    /**
     * @property array {
     *  @var \JdOrm\SchemaParserContext\Base[] $(name)
     * }
     */
    protected $elements = [];

    protected function finishParse() {
        return $this;
    }
    public function parse(string $path, \SimpleXMLElement $xml) {
        foreach($xml->attributes() as $name => $value) {
            $p = "attr_" . $name;
            if(property_exists($this, $p)) {
                $this->$p = "" . $value;
            } else {
                $discovered = null;
                foreach(get_object_vars($this) as $k => $v) {
                    if(strtolower($k) == strtolower($p)) {
                        $discovered = $k;
                        break;
                    }
                }
                if($discovered) {
                    trigger_error("Presuming that {$discovered} was meant");
                    $this->$discovered = "" . $value;
                } else {
                    throw new \Exception("Unrecognised attribute {$name} at {$path}");
                }
            }
        }
        foreach($xml->children() as $name => $child) {
            $handler = @static::$ELEMENT_HANDLERS[$name];
            if(!$handler) {
                throw new \Exception("Unrecognised element {$name} at {$path}");
            }
            @list($class, $multiple) = $handler;
            $p = new $class();
            $i = (@$this->elements[$name]) ? count($this->elements[$name]) : 0;

            if($multiple) {
                $r = $p->parse("{$path}/{$name}/{$i}", $child);
            } else {
                if($i and !$multiple) {
                    throw new \Exception("Parse failure at {$path}: Multiple {$name}");
                }
                $r = $p->parse("{$path}/{$name}", $child);
            }
            @$this->elements[$name][$i] = $r;
        }
        return $this->finishParse();
    }

    public function jsonSerialize() {
        $attributes = [];
        foreach(get_object_vars($this) as $k => $v) {
            if(
                $v !== null and
                preg_match("/^attr_(.+)/", $k, $md)
            ) {
                $attributes[$md[1]] = $v;
            }
        }
        ksort($attributes);
        return (object) ($attributes + $this->elements);
    }
}