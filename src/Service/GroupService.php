<?php
namespace PHPFacile\Group\Service;

use PHPFacile\Group\Model\GroupItemInterface;
use Psr\Log\LoggerInterface;

abstract class GroupService implements GroupServiceInterface
{
    /**
     * Factory used to instantiate new (grouped) items
     *
     * @var GroupItemFactoryInterface
     */
    protected $groupItemFactory;

    /**
     * Logger for trace purpose
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Defines a factory that can instantiate an (grouped) item
     * FIXME GroupItemFactoryInterface to be defined
     *
     * @param GroupItemFactoryInterface $groupItemFactory Factory of items
     *
     * @return void
     */
    public function setGroupItemFactory($groupItemFactory)
    {
        $this->groupItemFactory = $groupItemFactory;
    }

    /**
     * Returns a factory that can instantiate an (grouped) item
     *
     * @return GroupItemFactoryInterface
     */
    public function getGroupItemFactory()
    {
        return $this->groupItemFactory;
    }

    /**
     * Defines a logger for trace purpose
     *
     * @param LoggerInterface $logger Logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Returns all items
     *
     * @return array Array of (grouped) items
     */
    abstract public function getAllGroupItems();

    /**
     * Returns all items that match the given filter.
     *
     * @param array $filter  Rules to be applied to filter the items
     * @param array $context Any other data that might be useful
     *
     * @return array Array of items
     */
    public function getGroupItems($filter = null, $context = null)
    {
        // Not optimized
        // It is highlighly recommended to have a custom implémentation
        if (null === $filter) {
            // No filter... have to return all group items
            return $this->getAllGroupItems();
        } else {
            $allGroupItems  = $this->getAllGroupItems();
            $keptGroupItems = [];
            foreach ($allGroupItems as $groupItem) {
                if (false === $this->isGroupItemToBeFiltered($groupItem, $filter, $context)) {
                    $keptGroupItems[] = $groupItem;
                }
            }

            return $keptGroupItems;
        }
    }

    /**
     * Checks whether the given (grouped) item has to be filtered (i.e. rejeted)
     * or not (i.e. belongs to the group)
     *
     * @param GroupItemInterface $groupItem (Grouped) item to be checked
     * @param array              $filter    Rules to be applied to filter the group items
     * @param array              $context   Any other data that might be useful
     *
     * @return boolean True if the item has to be rejected, false otherwise
     */
    abstract protected function isGroupItemToBeFiltered(GroupItemInterface $groupItem, $filter = null, $context = null);

}
