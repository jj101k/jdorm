<?php
namespace JdOrm\SchemaParserContext;
class ForeignKey extends \JdOrm\SchemaParserContext\Base {
    protected static $ELEMENT_HANDLERS = [
        "reference" => ["\JdOrm\SchemaParserContext\Reference", true],
    ];

    /**
     * @property string The literal name of the other table, eg. "table_name"
     */
    public $attr_foreignTable;

    /**
     * @property string eg. "cascade"
     */
    public $attr_onDelete;

    /**
     * @property string eg. "cascade"
     */
    public $attr_onUpdate;

    /**
     * @property string An override for the PHP name, eg. "OwnerTableName"
     */
    public $attr_phpName;

    /**
     * @property string An override for the PHP name from the other table's
     *  perspective, eg. "OwnedTableName"
     */
    public $attr_refPhpName;
}