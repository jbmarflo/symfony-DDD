<?php
namespace AppBundle\Twig;


/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 09/02/17
 * Time: 10:37 AM
 */
class HelperViews extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            'generateTable' => new \Twig_SimpleFunction('generateTable', array($this, 'generateTable')),
        ];
    }

    public function generateTable(Array $result)
    {
        $table = '<table class="table">';
        for($i = 0; $i < count($result); $i++){
            $table .= '<tr>';
            for($f = 0; $f < count($result[$i]); $f++){
                $resultSt_values = array_values($result[$i]);
                $table .= '<td>'.$resultSt_values[$f].'</td>';
            }
            $table .= '</tr>';
        }

        return $table;
    }

    public function getName()
    {
        return "app_bundle";
    }
}