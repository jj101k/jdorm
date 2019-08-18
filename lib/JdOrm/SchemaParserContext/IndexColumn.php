<?php
namespace JdOrm\SchemaParserContext;
class IndexColumn extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
    ];

    /**
     * @property string The matching literal column name, eg. "some_name"
     */
    public $attr_name;
}