<?php

namespace app\services\renderers;
use app\interfaces\IRenderer;


class TwigRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
        $twig = new \Twig_Environment(
            new \Twig_Loader_Filesystem(TEMPLATES_DIR . 'twig'),
            ['autoescape' => false]
        );
        $template .= ".twig";
        return $twig->render($template, $params);
    }

}