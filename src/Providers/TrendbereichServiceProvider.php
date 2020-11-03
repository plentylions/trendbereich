<?php

namespace Trendbereich\Providers;

use Plenty\Modules\Webshop\ItemSearch\Helpers\ResultFieldTemplate;
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

        $dispatcher->listen('IO.init.templates', function (Partial $partial)
        {
            $partial->set('head', 'Ceres::PageDesign.Partials.Head');
            $partial->set('header', 'Ceres::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Ceres::PageDesign.PageDesign');
            $partial->set('footer', 'Ceres::PageDesign.Partials.Footer');
            $partial->set('page-metadata', 'Ceres::PageDesign.Partials.PageMetadata');

            $partial->set('page-design', 'Trendbereich::PageDesign.PageDesign');
        }, self::PRIORITY);

        $dispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('Trendbereich::Stylesheet');
            $container->addScriptTemplate('Trendbereich::Script');

            $container->addStyleTemplate('Trendbereich::Basket.Components.BasketListItem');
        }, self::PRIORITY);

        $resultFieldTemplate = pluginApp(ResultFieldTemplate::class);
        $resultFieldTemplate->setTemplate(ResultFieldTemplate::TEMPLATE_BASKET_ITEM, 'Trendbereich::ResultFields.BasketItem'); // properties.property.names.name

        $dispatcher->listen('IO.tpl.category.content', function (TemplateContainer $container)
        {
            $container->setTemplate('Trendbereich::Category.Content.CategoryContent');
        }, self::PRIORITY);
    }
}

