<?php namespace Anomaly\OrdersModule\Item\Contract;

use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\StoreModule\Contract\PurchasableInterface;
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
     * Get the item image.
     *
     * @return Image|null
     */
    public function getImage();

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
     * Get the tax.
     *
     * @return float
     */
    public function getTax();

    /**
     * Get the quantity.
     *
     * @return int
     */
    public function getQuantity();

    /**
     * Get the related order.
     *
     * @return OrderInterface
     */
    public function getOrder();

    /**
     * Get the related purchasable.
     *
     * @return null|PurchasableInterface
     */
    public function getPurchasable();

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
