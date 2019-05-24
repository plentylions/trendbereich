<?php

namespace Trendbereich\Containers;

use Plenty\Plugin\Templates\Twig;

class BasketVueContainer
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('Trendbereich::Containers.BasketVueContainer');
    }
}