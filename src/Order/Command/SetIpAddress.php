<?php namespace Anomaly\OrdersModule\Order\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Illuminate\Http\Request;

/**
 * Class SetIpAddress
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetIpAddress
{

    /**
     * The order instance.
     *
     * @var OrderInterface $order
     */
    protected $order;

    /**
     * Create a new SetIpAddress instance.
     *
     * @param OrderInterface $order
     */
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    /**
     * Handle the command.
     *
     * @param Request $request
     */
    public function handle(Request $request)
    {
        $this->order->setAttribute('ip_address', $request->ip());
    }
}
