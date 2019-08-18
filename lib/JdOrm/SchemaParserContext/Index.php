<?php
namespace JdOrm\SchemaParserContext;
class Index extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
        "index-column" => ["\JdOrm\SchemaParserContext\IndexColumn", true],
    ];

    /**
     * @property string The chosen literal index name, if applicable
     */
    public $attr_name;
}