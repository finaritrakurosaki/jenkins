<?php

namespace TutoBundle\Infrastructure;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TutoBundle\Entity\article;
use TutoBundle\Entity\IEntity;


class BaseController extends Controller
{
    /**
     * @Route("/", name="base")
     */
    public function indexAction(Request $request)
    {
        $articles= $this->getDoctrine()->getRepository(article::class)->findBy(array(),array('datetime'=>'desc'));
        $form= $this->createFormBuilder()
                    ->add('number', IntegerType::class)
                    ->add('rechercher', SubmitType::class)
                    ->getForm();
        $form->handleRequest($request);
        if( $form->isSubmitted()) {
            return $this->forward('TutoBundle\Infrastructure\NoteController::FindQB',array(
                                  'id'=>$form->get('number')->getData()
                                 ));
        }
        return $this->render('TutoBundle:Default:index.html.twig',array('form'=>$form->createView(),
                             'articles'=>$articles
                            ));
    }
    protected function loadService()
    {
        return $this->container->get('tuto.crud');
    }
}
