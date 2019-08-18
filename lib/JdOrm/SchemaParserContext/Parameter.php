<?php
namespace JdOrm\SchemaParserContext;
class Parameter extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
    ];

    /**
     * @property string eg. "Charset"
     */
    public $attr_name;

    /**
     * @property string eg. "utf8mb4"
     */
    public $attr_value;
}