<?php
namespace PHPFacile\Group\Model;

use PHPFacile\Group\Service\GroupServiceInterface;

interface GroupItemInterface
{
    /**
     * Returns the id of the (grouped) item in the given data source
     *
     * @param string $dataSourceId Id of the datasource
     *
     * @return string Id of the (grouped) item
     */
    public function getId($dataSourceId = GroupServiceInterface::DATASOURCE_ID_APPLI);
}
