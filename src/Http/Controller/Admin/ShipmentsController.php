<?php namespace Anomaly\OrdersModule\Http\Controller\Admin;

use Anomaly\OrdersModule\Shipment\Form\ShipmentFormBuilder;
use Anomaly\OrdersModule\Shipment\Table\ShipmentTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ShipmentsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ShipmentTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ShipmentTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ShipmentFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ShipmentFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ShipmentFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ShipmentFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
