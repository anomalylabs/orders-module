<?php namespace Anomaly\OrdersModule\Item\Contract;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Image\Image;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface ItemInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\OrdersModule\Item\Contract
 */
interface ItemInterface extends EntryInterface
{

    /**
     * Get the tax.
     *
     * @return float
     */
    public function getTax();

    /**
     * Get the price.
     *
     * @return float
     */
    public function getPrice();

    /**
     * Get the total.
     *
     * @return float
     */
    public function getTotal();

    /**
     * Get the subtotal.
     *
     * @return float
     */
    public function getSubtotal();

    /**
     * Get the shipping.
     *
     * @return float
     */
    public function getShipping();

    /**
     * Get the discounts.
     *
     * @return float
     */
    public function getDiscounts();

    /**
     * Get the item quantity.
     *
     * @return float
     */
    public function getQuantity();


    /**
     * Calculate total adjustments.
     *
     * @param $type
     * @return float
     */
    public function calculate($type);

    /**
     * Get the image.
     *
     * @return null|Image
     */
    public function getImage();

    /**
     * Get the entry.
     *
     * @return EntryInterface
     */
    public function getEntry();

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions();

    /**
     * Get the order.
     *
     * @return OrderInterface
     */
    public function getOrder();

    /**
     * Get the order ID.
     *
     * @return int
     */
    public function getOrderId();

    /**
     * Get related modifiers.
     *
     * @return ModifierCollection
     */
    public function getModifiers();

    /**
     * Return the modifiers relationship.
     *
     * @return HasMany
     */
    public function modifiers();
}
