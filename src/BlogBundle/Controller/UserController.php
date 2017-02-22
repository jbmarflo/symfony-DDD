<?php
/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 17/02/17
 * Time: 10:22 AM
 */

namespace BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class UserController extends Controller
{
    public function loginAction(Request $request)
    {
        //La logica que necesitamos para que se pueda hacer el login
        $authUtils = $this->get("security.authentication_utils");

        //Errores que pudar dar al hacer el login
        $error = $authUtils->getLastAuthenticationError();

        //lastUsername
        $lastUsername = $authUtils->getLastUsername();

        return $this->render("BlogBundle:User:login.html.twig",
            [
                "error" => $error,
                "lastUsername" => $lastUsername
            ]
        );
    }
}