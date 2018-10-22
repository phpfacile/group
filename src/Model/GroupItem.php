<?php
namespace PHPFacile\Group\Model;

use PHPFacile\Group\Service\GroupServiceInterface;

class GroupItem implements GroupItemInterface
{
    /**
     * Ids of the (grouped) item in different possible data sources
     *
     * @var array
     */
    protected $ids = [];

    /**
     * Values of different attributes
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Sets the id of the (grouped) item in a given datasource
     *
     * @param string $id           Id of the (grouped) item
     * @param string $dataSourceId Id of the datasource
     *
     * @return void
     */
    public function setId($id, $dataSourceId = GroupServiceInterface::DATASOURCE_ID_APPLI)
    {
        $this->ids[$dataSourceId] = $id;
    }

    /**
     * Returns the id of the (grouped) item in the given datasource
     *
     * @param string $dataSourceId Id of the datasource
     *
     * @return string Id of the (grouped) item
     */
    public function getId($dataSourceId = GroupServiceInterface::DATASOURCE_ID_APPLI)
    {
        // FIXME Manage not set value
        return $this->ids[$dataSourceId];
    }

    /**
     * Sets the value of a given attribute
     *
     * @param mixed  $value     Value of the attribute
     * @param string $attribute Name of the attribute
     *
     * @return void
     */
    public function setAttribute($value, $attribute)
    {
        $this->attributes[$attribute] = $value;
    }

    /**
     * Returns the value of a given attribute
     *
     * @param string $attribute Name of the attribute
     *
     * @return mixed Value of the attribute
     */
    public function getAttribute($attribute)
    {
        // FIXME Manage not set value
        return $this->attributes[$attribute];
    }
}
