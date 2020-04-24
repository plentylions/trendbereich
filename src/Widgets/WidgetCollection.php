<?php

namespace Trendbereich\Widgets;

use Trendbereich\Widgets\Common\ItemListWidget;

class WidgetCollection
{
    const COMMON_WIDGETS = [
        ItemListWidget::class
    ];

    public static function all()
    {
        return array_merge(
            self::COMMON_WIDGETS,
            []
        );
    }

}
