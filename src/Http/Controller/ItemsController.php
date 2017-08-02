<?php namespace Anomaly\OrdersModule\Http\Controller;

use Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface;
use Anomaly\OrdersModule\Order\Command\GetOrder;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class ItemsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ItemsController extends PublicController
{

    /**
     * Add an item to the order.
     *
     * @param ItemRepositoryInterface $items
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(ItemRepositoryInterface $items)
    {

        /* @var OrderInterface $order */
        $order = $this->dispatch(new GetOrder());

        $input = $this->request->all();

        $input['order'] = $order;

        $redirect = array_pull($input, 'redirect', $this->url->route('anomaly.module.orders::orders.view'));

        $items->create($input);

        return $this->redirect->to($redirect);
    }

    /**
     * Update an item in the order.
     *
     * @param ItemRepositoryInterface $items
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ItemRepositoryInterface $items, $id)
    {
        if (!$item = $items->find($id)) {
            abort(404);
        }

        $item->fill($this->request->all());

        $items->save($item);

        return $this->redirect->back();
    }

    /**
     * Remove an item from the order.
     *
     * @param ItemRepositoryInterface $items
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(ItemRepositoryInterface $items, $id)
    {
        if ($item = $items->find($id)) {
            $items->delete($item);
        }

        return $this->redirect->back();
    }
}
