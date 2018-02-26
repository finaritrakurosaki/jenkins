<?php

namespace TutoBundle\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use TutoBundle\Entity\etudiant;
use TutoBundle\Form\etudiantEditType;
use TutoBundle\Form\etudiantType;

class EtudiantController extends BaseController
{
    /**
     * @Route("/admin/createEtudiant",name="createEtudiant")
     */
    public function CreateEtudiant(Request $request)
    {
        $etudiant = new etudiant();
        $form = $this->createForm(etudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted()) {
            $this->loadService()->add($etudiant);
            $this->addFlash(
                'notice',
                'Student Added!'
            );
           return $this->redirectToRoute("createEtudiant");
        }
        return $this->render('TutoBundle:Etudiant:create.html.twig',array('form'=> $form->createView()));
    }

    /**
     * @Route("/user/listEtudiant",name="listEtudiant")
     */
    public function ListEtudiant()
    {
        $etudiants= $this->getDoctrine()->getRepository(etudiant::class)->findAll();
        return $this->render('TutoBundle:Etudiant:list.html.twig', array(
            'etudiants' => $etudiants
        ));
    }

    /**
     * @Route("/admin/updateEtudiant/{id}",name="updateEtudiant")
     */
    public function UpdateEtudiant(Request $request, etudiant $etudiant)
    {
        $form = $this->createForm(etudiantEditType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted()) {
            $this->loadService()->update($etudiant);
            $this->addFlash(
                'notice',
                'Student Edited!'
            );

        }
        return $this->render('TutoBundle:Etudiant:update.html.twig',array('form'=> $form->createView()));
    }

    /**
     * @Route("/admin/deleteEtudiant/{id}",name="deleteEtudiant")
     */
    public function DeleteEtudiant(etudiant $etudiant)
    {

        try {
            $this->remove($etudiant);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
            return $this->redirectToRoute('listEtudiant');
    }

    /**
     * @Route("/user/noteEtudiant/{id}",name="noteEtudiant")
     */
    public function NoteEtudiant($id)
    {
        return $this->forward('TutoBundle\Infrastructure\NoteController::FindQB',array(
                              'id'=>$id
                             ));
    }
    /**
     * @Route("/user/detailsEtudiant/{id}",name="detailsEtudiant")
     */
    public function DetailsEtudiant(etudiant $etudiant)
    {
        return $this->render('TutoBundle:Etudiant:details.html.twig',array('etudiant'=> $etudiant));
    }
}
