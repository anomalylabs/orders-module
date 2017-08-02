<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Item\ItemProcessor;

/**
 * Class ProcessItem
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProcessItem
{

    /**
     * The item instance.
     *
     * @var ItemInterface
     */
    protected $item;

    /**
     * Create a new ProcessItem instance.
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
     * @param ItemProcessor $processor
     */
    public function handle(ItemProcessor $processor)
    {
        $processor->process($this->item);
    }
}
