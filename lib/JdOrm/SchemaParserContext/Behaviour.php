<?php
namespace JdOrm\SchemaParserContext;
class Behaviour extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
    ];

    /**
     * @property string The name of the behaviour to apply
     */
    public $attr_name;
}