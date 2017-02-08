<?php
/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 07/02/17
 * Time: 10:48 AM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PruebasController extends Controller
{

    public function indexAction(Request $request, $name, $page)
    {
        //return $this->redirect($this->generateUrl("holamundo"));
        //return $this->redirect($request->getBaseUrl()."/holamundo?hola=true");
//        var_dump($request->query->get("hola"));
//        var_dump($request->get("hola-post"));
        $products[0] = ["productos" => "consola 1" , "precio" => 2];
        $products[1] = ["productos" => "consola 2" , "precio" => 7];
        $products[2] = ["productos" => "consola 3" , "precio" => 6];
        $products[3] = ["productos" => "consola 4" , "precio" => 3];
        $products[4] = ["productos" => "consola 5" , "precio" => 3];
        $fruits = ["manzana" => "golden", "pera" => "rica"];
        return  $this->render('AppBundle:pruebas:index.html.twig', array(
            'texto' => $name." - ".$page,
            'products' => $products,
            'fruits' => $fruits
        ));
    }
}