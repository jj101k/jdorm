<?php
namespace JdOrm\SchemaParserContext;
class Column extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
    ];

    /**
     * @property string Whether this column (a primary key) should
     *  auto-increment. Generally "true" if supplied.
     */
    public $attr_autoIncrement;

    /**
     * @property string The default value
     */
    public $attr_default;

    /**
     * @property string Some text about the column, for the class and column comment
     */
    public $attr_description;

    /**
     * @property string The literal column name, eg. "some_name"
     */
    public $attr_name;

    /**
     * @property string An override for the PHP name, eg. "SomeName"
     */
    public $attr_phpName;

    /**
     * @property string Whether this is the primary key, typically "true"
     */
    public $attr_primaryKey;

    /**
     * @property string Whether the column is not null, eg. "true"
     */
    public $attr_required;

    /**
     * @property string Special information about the representation, eg. digits
     *  after the decimal point for "decimal".
     */
    public $attr_scale;

    /**
     * @property string The size in characters, eg. "255"
     */
    public $attr_size;

    /**
     * @property string The Propel-format column type, eg. "VARCHAR"
     */
    public $attr_type;
}