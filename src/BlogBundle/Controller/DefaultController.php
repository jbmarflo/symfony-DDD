<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    private function indexddddAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $entry_rep = $em->getRepository("BlogBundle:Entry");
//        $entries = $entry_rep->findAll();
//        foreach($entries as $entry){
//            echo $entry->getTitle();
//            $tags = $entry->getEntryTag()->getValues();
//            foreach($tags as $tag){
//                echo '<br>'.$tag->getName();
//            }
//
//            echo '<hr>';
//        }

//        $em = $this->getDoctrine()->getManager();
//        $category_rep = $em->getRepository("BlogBundle:Category");
//        $categories = $category_rep->findAll();
//        foreach($categories as $category){
//            echo $category->getName();
//            $entries = $category->getEntry()->getIterator();
//            foreach($entries as $entry){
//                echo '<br>'.$entry->getTitle();
//            }
//
//            echo '<hr>';
//        }
//        $em = $this->getDoctrine()->getManager();
//        $tag_rep = $em->getRepository("BlogBundle:Tag");
//        $tags = $tag_rep->findAll();
//        foreach($tags as $tag){
//            echo $tag->getName();
//            $entryTags = $tag->getEntry()->getValues();
//            foreach($entryTags as $entry){
//                echo ' | '.$entry->getTitle().',';
//            }
//
//            echo '<hr>';
//        }
exit();
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }
}
