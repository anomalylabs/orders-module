<?php namespace Anomaly\OrdersModule\Order\Command;

use Anomaly\CustomersModule\Customer\Contract\CustomerRepositoryInterface;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;

/**
 * Class SetCustomer
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetCustomer
{

    /**
     * The order instance.
     *
     * @var OrderInterface $order
     */
    protected $order;

    /**
     * Create a new SetCustomer instance.
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
     * @param CustomerRepositoryInterface $customers
     */
    public function handle(CustomerRepositoryInterface $customers)
    {
        if (!$email = $this->order->getEmail()) {
            return;
        }

        if (!$customer = $customers->findByEmail($email)) {
            $customer = $customers->create(
                [
                    'email'      => $this->order->getEmail(),
                    'last_name'  => $this->order->getLastName(),
                    'first_name' => $this->order->getFirstName(),
                ]
            );
        }

        $this->order->setAttribute('customer', $customer);
    }
}
