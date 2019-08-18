<?php
namespace JdOrm\SchemaParserContext;
class UniqueColumn extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
    ];

    /**
     * @property string The matching literal column name, eg. "some_name"
     */
    public $attr_name;
}