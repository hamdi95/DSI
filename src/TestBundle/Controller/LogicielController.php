<?php

namespace TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TestBundle\Entity\Logiciel;
use TestBundle\Entity\Server;
use TestBundle\Form\LogicielType;
use TestBundle\Form\ServerType;

class LogicielController extends Controller
{
    public function ajouterLogicielAction(Request $request)
    {
        $logiciel = new Logiciel();
        $form= $this->createForm(LogicielType::class, $logiciel);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em= $this->getDoctrine()->getManager();
            $em->persist($logiciel);
            $em->flush();
            return $this->redirectToRoute('affiche_server');
        }
        return $this->render("@Test/logiciel/ajoutLogiciel.html.twig",array('form'=>$form->createView()));
    }
    public function read_logicielsAction()
    {
        $logiciel =new Logiciel();
        $em=$this->getDoctrine()->getManager();
        $logiciel=$em->getRepository(Server::class)->findAll();
        return $this->render('TestBundle:logiciel:afficheLogiciel.html.twig', array(
            'logiciel'=>$logiciel
        ));
    }
}
