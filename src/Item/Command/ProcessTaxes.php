<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\StoreModule\Contract\TaxableInterface;
use Anomaly\TaxesModule\Tax\TaxProcessor;
use Anomaly\TaxesModule\Tax\TaxResolver;

/**
 * Class ProcessTaxes
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProcessTaxes
{

    /**
     * The item instance.
     *
     * @var ItemInterface
     */
    protected $item;

    /**
     * Create a new ProcessTaxes instance.
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
     * @param TaxResolver  $resolver
     * @param TaxProcessor $processor
     */
    public function handle(TaxResolver $resolver, TaxProcessor $processor)
    {
        if (!$purchasable = $this->item->getPurchasable()) {
            return null;
        }

        if (!$purchasable instanceof TaxableInterface) {
            return null;
        }

        $order = $this->item->getOrder();

        $rates = $resolver->resolve($purchasable, $order->getBillingAddress());

        return $processor->calculate($rates, $this->item->getSubtotal());
    }
}
