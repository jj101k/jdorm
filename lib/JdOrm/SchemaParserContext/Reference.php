<?php
namespace JdOrm\SchemaParserContext;
class Reference extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
    ];

    /**
     * @property string The literal remote column name, eg. "some_other_name"
     */
    public $attr_foreign;

    /**
     * @property string The literal local column name, eg. "some_name"
     */
    public $attr_local;
}