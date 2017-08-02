<?php namespace Anomaly\OrdersModule\Order\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class OrderTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\OrdersModule\Order\Table
 */
class OrderTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'number',
            ],
        ],
        'tags',
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'number',
        [
            'heading' => 'anomaly.module.orders::field.status.name',
            'value'   => 'entry.label(entry.status.value)',
        ],
        'entry.tags.labels|join(" ")',
        '{{ currency_format(entry.total()) }}' => [
            'heading' => 'anomaly.module.orders::field.total.name',
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
