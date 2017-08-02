<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Item\ItemCalculator;

/**
 * Class CalculateTotals
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CalculateTotals
{

    /**
     * The item instance.
     *
     * @var ItemInterface
     */
    protected $item;

    /**
     * Create a new CalculateTotals instance.
     *
     * @param ItemInterface $item
     */
    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }

    /**
     * Handle the command.
     *
     * @param ItemCalculator $calculator
     */
    public function handle(ItemCalculator $calculator)
    {
        $calculator->process($this->item);
    }
}
