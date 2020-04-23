<?php

namespace Trendbereich\Providers;

use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Helper\ResourceContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\ConfigRepository;
use Plenty\Modules\ShopBuilder\Contracts\ContentWidgetRepositoryContract;
use Trendbereich\Widgets\WidgetCollection;


class TrendbereichServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher, ConfigRepository $config)
    {
        $widgetRepository = pluginApp(ContentWidgetRepositoryContract::class);
        $widgetClasses = WidgetCollection::all();
        foreach ($widgetClasses as $widgetClass) {
            $widgetRepository->registerWidget($widgetClass);
        }

        $dispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('Trendbereich::Stylesheet');
            $container->addScriptTemplate('Trendbereich::Script');

            $container->addStyleTemplate('Trendbereich::Basket.Components.BasketListItem');
        }, self::PRIORITY);

        $dispatcher->listen( 'IO.ResultFields.*', function(ResultFieldTemplate $container) {
            $container->setTemplates([
                ResultFieldTemplate::TEMPLATE_BASKET_ITEM => 'Trendbereich::ResultFields.BasketItem' // properties.property.names.name
            ]);
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.category.content', function (TemplateContainer $container)
        {
            $container->setTemplate('Trendbereich::Category.Content.CategoryContent');
        }, self::PRIORITY);
    }
}

