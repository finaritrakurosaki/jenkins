<?php

namespace TutoBundle\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TutoBundle\Entity\etudiant;
use TutoBundle\Entity\note;
use TutoBundle\Form\noteType;

class NoteController extends BaseController
{
    /**
     * @Route("/admin/createNote",name="createNote")
     */
    public function createNote(Request $request)
    {
        $note=new note();
        $form=$this->createForm(noteType::class,$note);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted()) {
            $this->loadService()->add($note);
            $this->addFlash(
                'notice',
                'note Added!'
            );
           return $this->redirectToRoute("createNote");
        }
        return $this->render('TutoBundle:Bulletin:createNote.html.twig',array('form'=> $form->createView()));
    }
    /**
     * @Route("/user/FindQ/{id}")
     */
    public function findQB(etudiant $etudiant)
    {

        $notes = $this->getDoctrine()->getRepository(note::class)->FindQueribuilder($etudiant->getId());

        return $this->render('TutoBundle:Note:affiche_note.html.twig',array(
                             'notes'=> $notes,
                             'etudiant'=> $etudiant
                             ));
    }
    /**
     * @Route("/user/FindDQL",name="findNote")
     */
    public function findDQL(Request $request)
    {
        $result = $this->getDoctrine()->getRepository(note::class)->FindDQL((int)$request->request->get('number'));
        print_r($result);
        die();
        return new Response();
    }

}
