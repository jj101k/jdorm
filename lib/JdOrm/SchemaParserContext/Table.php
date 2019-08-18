<?php
namespace JdOrm\SchemaParserContext;
class Table extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
        "column" => ["\JdOrm\SchemaParserContext\Column", true],
        "unique" => ["\JdOrm\SchemaParserContext\Unique", true],
        "index" => ["\JdOrm\SchemaParserContext\Index", true],
        "behavior" => ["\JdOrm\SchemaParserContext\Behaviour", true],
        "foreign-key" => ["\JdOrm\SchemaParserContext\ForeignKey", true],
    ];

    /**
     * @property string Some text about the table, for the class and table comment
     */
    public $attr_description;

    /**
     * @property string The autoincrement mech, eg. "native"
     */
    public $attr_idMethod;

    /**
     * @property string The literal table name, eg. "some_name"
     */
    public $attr_name;
}