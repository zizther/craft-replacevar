<?php
/**
 * replacevar plugin for Craft CMS
 *
 * replacevar Twig Extension
 *
 *
 * @author    Nathan Reed
 * @copyright Copyright (c) 2017 Nathan Reed
 * @link      https://github.com/zizther
 * @package   Replacevar
 * @since     1.0.0
 */

namespace Craft;

use Twig_Extension;
use Twig_SimpleFilter;

class ReplacevarTwigExtension extends \Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Replace Var';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | replacevar }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('replacevar', [craft()->replacevar, 'replaceVar'], ['is_safe' => ['html']]),
            new Twig_SimpleFilter('rv', [craft()->replacevar, 'replaceVar'], ['is_safe' => ['html']]),
        ];
    }
}
