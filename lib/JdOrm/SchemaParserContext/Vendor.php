<?php
namespace JdOrm\SchemaParserContext;
class Vendor extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
        "parameter" => ["\JdOrm\SchemaParserContext\Parameter"],
    ];

    /**
     * @property string eg. "mysql"
     */
    public $attr_type;
}