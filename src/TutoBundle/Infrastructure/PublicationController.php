<?php

namespace TutoBundle\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use TutoBundle\Entity\publication;

class PublicationController extends BaseController
{
    /**
     * @Route("/user/forum", name="forum")
     */
    public function createPublication(Request $request)
    {
        $form= $this->createFormBuilder()
            ->add('contenu', TextareaType::class)
            ->add('publish', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if( $form->isSubmitted()) {
            $publication = new publication();
            $publication->setContents($form->get('contenu')->getData())
                        ->setUser($this->getUser());
            $this->loadService()->add($publication);
            return $this->redirectToRoute('forum');
         }
        $publications = $this->getDoctrine()->getRepository(publication::class)->findBy(array(),array('date'=>'desc') );
        return $this->render('TutoBundle:Publication:index_publication.html.twig',
            array('publications'=>$publications,
                   'form'=>$form->createView()
                ));
    }

}
