<?php namespace Anomaly\OrdersModule\Order\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Order\OrderSequence;

/**
 * Class SetNumber
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetNumber
{

    /**
     * The order instance.
     *
     * @var OrderInterface $order
     */
    protected $order;

    /**
     * Create a new SetNumber instance.
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
     * @param OrderSequence $sequence
     */
    public function handle(OrderSequence $sequence)
    {
        if (!$this->order->getNumber()) {
            $this->order->setAttribute('number', $sequence->next('P001'));
        }
    }
}
