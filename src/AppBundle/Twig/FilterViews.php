<?php
/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 09/02/17
 * Time: 02:18 PM
 */

namespace AppBundle\Twig;


class FilterViews extends \Twig_Extension
{

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('addText', array($this, 'addText')),
        ];
    }

    public function addText($string)
    {
        return $string." texto contatenado";
    }

    public function getName()
    {
        return 'filter_views';
    }
}