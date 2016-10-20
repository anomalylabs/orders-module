<?php namespace Anomaly\OrdersModule\Http\Controller;

use Anomaly\OrdersModule\Order\Command\DeleteItems;
use Anomaly\OrdersModule\Order\Command\GetOrder;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class OrdersController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class OrdersController extends PublicController
{

    /**
     * View the contents of a order.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view()
    {
        $order = $this->dispatch(new GetOrder());

        $this->template->set('meta_title', 'Order');
        $this->breadcrumbs->add('Order', $this->request->fullUrl());

        return $this->view->make('anomaly.module.orders::orders.view', compact('order'));
    }

    /**
     * Update all items in a order.
     *
     * @param ItemRepositoryInterface $items
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ItemRepositoryInterface $items)
    {
        /* @var OrderInterface $order */
        $order = $this->dispatch(new GetOrder());

        foreach ($this->request->get('quantity') as $id => $quantity) {

            /* @var ItemInterface|EloquentModel $item */
            if ($item = $order->getItems()->find($id)) {

                if ($quantity == 0) {

                    $items->delete($item);

                    continue;
                }

                $item->setAttribute('quantity', $quantity);

                $items->save($item);
            }
        }

        return $this->redirect->back();
    }

    /**
     * Destroy the active order.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        /* @var OrderInterface|EloquentModel $order */
        if ($order = $this->dispatch(new GetOrder())) {
            $this->dispatch(new DeleteItems($order));
        }

        return $this->redirect->back();
    }
}
