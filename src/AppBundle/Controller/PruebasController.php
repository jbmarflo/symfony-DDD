<?php
/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 07/02/17
 * Time: 10:48 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Album;
use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\AlbumType;
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

    public function createAction()
    {
        $curso = new Project();
        $curso->setTitulo("Programcion DDD");
        $curso->setDescripcion("Poyecto completo de symfony 3");
        $curso->setPrecio(80.45);

        $em = $this->getDoctrine()->getManager();
        $em->persist($curso);

        //Colocar a la base de datos
        $flush = $em->flush();

        if($flush != null){
            echo "El curso no se ha creado bien";
        }else{
            echo "EL curso se ha creado bien";
        }

        exit();
    }

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projects_rep = $em->getRepository("AppBundle:Project");
        //$projects = $projects_rep->findAll();
        //$projects = $projects_rep->findBy(["precio" => 80.45]);
        $projects = $projects_rep->findOneByPrecio(80.45);
        //saca 1 del primero que vale 80
        var_dump($projects->getTitulo());
        exit();
        foreach($projects as $project)
        {
            echo $project->getTitulo()."<br>";
            echo $project->getDescripcion()."<br>";
            echo $project->getPrecio()."<br><hr>";
        }

        exit;
    }

    public function nativeSqlAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM projects";
        $stmt = $db->prepare($query);
        $params = [];
        $stmt->execute($params);

        //devuelve  un array
        $projects = $stmt->fetchAll();

        foreach($projects as $project){
            echo $project['titulo'];
        }
        exit;
    }

    public function queryDqlAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("
            SELECT c FROM AppBundle:Project c
              WHERE c.precio > :precio
        ")->setParameter("precio", "79");
        $projects  = $query->getResult();
        foreach($projects as $project){
            echo $project->getTitulo().'<br>';
        }
        exit();
    }


    public function queryBuilderAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $project_rep = $em->getRepository("AppBundle:Project");
//
//        $query = $project_rep->createQueryBuilder("p")
//                ->where("p.precio > :precio")
//                ->setParameter("precio", "79")
//                ->getQuery();
//        $projects = $query->getResult();
        $em = $this->getDoctrine()->getManager();
        $project_rep = $em->getRepository("AppBundle:Project");
        $projects = $project_rep->getProjects();
        foreach($projects as $project){
            echo $project->getTitulo().'<br>';
        }
        exit();

    }

    public function updateAction($id, $title, $description, $price)
    {
        $em = $this->getDoctrine()->getManager();
        $project_rep = $em->getRepository("AppBundle:Project");

        $project = $project_rep->find($id);
        $project->setTitulo($title);
        $project->setDescripcion($description);
        $project->setPrecio($price);

        $em->persist($project);
        //Colocar a la base de datos
        $flush = $em->flush();

        if($flush != null){
            echo "El curso no se ha actualizado bien";
        }else{
            echo "EL curso se ha actualizado bien";
        }
        exit;
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $project_rep = $em->getRepository("AppBundle:Project");

        $project = $project_rep->find($id);

        $em->remove($project);

        //Eliminar de la base de datos
        $flush = $em->flush();

        if($flush != null){
            echo "El curso no se ha eliminado bien";
        }else{
            echo "EL curso se ha eliminado bien";
        }
        exit;
    }

    #### Com un formulario
    public function formAction()
    {
        $album = new Album();
        $form = $this->createForm(AlbumType::class,$album);
        return  $this->render('AppBundle:pruebas:form.html.twig', array(
            'form' => $form->createView()
        ));
    }
}