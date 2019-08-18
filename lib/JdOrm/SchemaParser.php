<?php
namespace JdOrm;
class SchemaParser {
    /**
     * @property string
     */
    private $filename;

    protected function parseDatabase(\SimpleXMLElement $xml) {
        foreach($xml->attributes() as $name => $b) {
            switch($name) {
                default:
                    throw new \Exception("Unrecognised attribute {$name}");
            }
        }
    }

    /**
     * @param string $schema_filename
     */
    public function __construct(string $schema_filename) {
        $this->filename = $schema_filename;
    }

    public function parse() {
        $xml = simplexml_load_file($this->filename);
        $context = new \JdOrm\SchemaParserContext\Database();
        $context->parse("/database", $xml);
        return $context;
    }
}