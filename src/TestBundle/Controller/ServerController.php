<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TestBundle\Entity\Server;
use TestBundle\Form\ServerType;
use Symfony\Component\HttpFoundation\Request;


class ServerController extends Controller
{
    public function ajouterServeurAction(Request $request)
    {
        $server = new Server();
        $form= $this->createForm(ServerType::class, $server);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em= $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();
            return $this->redirectToRoute('affiche_server');
        }
        return $this->render("@Test/server/ajout.html.twig",array('form'=>$form->createView()));
    }
    public function read_serversAction()
    {
        $server =new Server();
        $em=$this->getDoctrine()->getManager();
        $server=$em->getRepository(Server::class)->findAll();
        return $this->render('TestBundle:Server:afficheServer.html.twig', array(
            'server'=>$server
        ));
    }

    public function deleteServerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $server= $em->getRepository(Server::class)->find($id);
        $server->setEtatServer("Faux");
        $em->flush();
        return $this->redirectToRoute("affiche_server");
    }
    public function update_serverAction ($id,Request $request)
    {
        $em= $this->getDoctrine()->getManager();
        $server=$em->getRepository(Server::class)->find($id);
        $form=$this->createForm(ServerType::class,$server);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute("affiche_server");
        }
        return $this->render('@Test/server/updateServer.html.twig', array(
            "form"=>$form->createView()

        ));

    }
}
