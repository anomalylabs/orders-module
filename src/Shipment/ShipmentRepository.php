<?php namespace Anomaly\OrdersModule\Shipment;

use Anomaly\OrdersModule\Shipment\Contract\ShipmentRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ShipmentRepository extends EntryRepository implements ShipmentRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ShipmentModel
     */
    protected $model;

    /**
     * Create a new ShipmentRepository instance.
     *
     * @param ShipmentModel $model
     */
    public function __construct(ShipmentModel $model)
    {
        $this->model = $model;
    }
}
