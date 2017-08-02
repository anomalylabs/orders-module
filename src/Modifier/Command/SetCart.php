<?php namespace Anomaly\OrdersModule\Modifier\Command;

use Anomaly\OrdersModule\Modifier\Contract\ModifierInterface;

/**
 * Class SetOrder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetOrder
{

    /**
     * The modifier instance.
     *
     * @var ModifierInterface
     */
    protected $modifier;

    /**
     * Create a new SetOrder instance.
     *
     * @param ModifierInterface $modifier
     */
    public function __construct(ModifierInterface $modifier)
    {
        $this->modifier = $modifier;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        if ($this->modifier->getOrder()) {
            return;
        }

        if (!$item = $this->modifier->getItem()) {
            return;
        }

        $this->modifier->setAttribute('order_id', $item->getOrderId());
    }
}
