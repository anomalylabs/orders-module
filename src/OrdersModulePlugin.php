<?php namespace Anomaly\OrdersModule;

use Anomaly\OrdersModule\Order\Command\GetOrder;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class OrdersModulePlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class OrdersModulePlugin extends Plugin
{

    /**
     * The runtime cache.
     *
     * @var array
     */
    protected $cache = [];

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'order',
                function () {

                    if (isset($this->cache[$key = __METHOD__])) {
                        return $this->cache[$key];
                    }

                    return $this->cache[$key] = (new Decorator())->decorate($this->dispatch(new GetOrder()));
                }
            ),
        ];
    }

}
