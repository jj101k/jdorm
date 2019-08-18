<?php
namespace JdOrm\SchemaParserContext;
class Unique extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
        "unique-column" => ["\JdOrm\SchemaParserContext\UniqueColumn", true],
    ];

    /**
     * @property string The chosen literal index name, if applicable
     */
    public $attr_name;
}