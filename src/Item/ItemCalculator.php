<?php namespace Anomaly\OrdersModule\Item;

use Anomaly\OrdersModule\Item\Command\ProcessTaxes;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ItemCalculator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ItemCalculator
{

    use DispatchesJobs;

    /**
     * Process the item calculations.
     *
     * @param ItemInterface $item
     * @return ItemInterface
     */
    public function process(ItemInterface $item)
    {
        $this
            ->subtotal($item)
            ->total($item)
            ->tax($item);

        return $item;
    }

    /**
     * Process the total.
     *
     * @param ItemInterface $item
     * @return $this
     */
    public function total(ItemInterface $item)
    {
        $modifiers = $item->getModifiers();

        $item->setAttribute('total', $modifiers->apply($item->getSubtotal()));

        return $this;
    }

    /**
     * Process the subtotal.
     *
     * @param ItemInterface $item
     * @return $this
     */
    public function subtotal(ItemInterface $item)
    {
        $item->setAttribute('subtotal', $item->getQuantity() * $item->getPrice());

        return $this;
    }

    /**
     * Process the tax.
     *
     * @param ItemInterface $item
     * @return $this
     */
    public function tax(ItemInterface $item)
    {
        $item->setAttribute('tax', $this->dispatch(new ProcessTaxes($item)));

        return $this;
    }

    /**
     * Calculate total adjustments.
     *
     * @param $type
     * @return float
     */
    public function calculate($type)
    {
        $modifiers = $this
            ->getModifiers()
            ->type($type);

        return $modifiers->calculate($this->subtotal());
    }
}
