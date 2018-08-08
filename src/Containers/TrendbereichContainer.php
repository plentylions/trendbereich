<?php

namespace Trendbereich\Containers;

use Plenty\Plugin\Templates\Twig;

class TrendbereichContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('Trendbereich::Stylesheet');
    }
}