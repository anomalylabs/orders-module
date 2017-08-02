<?php namespace Anomaly\OrdersModule\Payment;

use Anomaly\OrdersModule\Payment\Contract\PaymentInterface;
use Anomaly\Streams\Platform\Model\Orders\OrdersPaymentsEntryModel;

class PaymentModel extends OrdersPaymentsEntryModel implements PaymentInterface
{

}
