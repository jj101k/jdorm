<?php
namespace JdOrm\SchemaParserContext;
class Database extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
        "vendor" => ["\JdOrm\SchemaParserContext\Vendor"],
        "table" => ["\JdOrm\SchemaParserContext\Table", true],
    ];
    /**
     * @property string The autoincrement mech, eg. "native"
     */
    public $attr_defaultIdMethod;

    /**
     * @property string Something something PHP naming, eg. "underscore"
     */
    public $attr_defaultPhpNamingMethod;

    /**
     * @property string The name in the meta-schema, eg. "default"
     */
    public $attr_name;
}