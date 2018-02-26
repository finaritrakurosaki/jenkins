<?php

namespace TutoBundle\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use TutoBundle\Entity\article;
use TutoBundle\Form\articleEditType;
use TutoBundle\Form\articleType;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class ArticleController extends BaseController
{
    /**
     * @Route("/admin/createArticle", name="createArticle")
     */
    public function createArticle(Request $request)
    {
        $article= new  article();
        $title="Create article";
        $form= $this->createForm(articleType::class,$article);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()){
            $this->loadService()->add($article);
            $this->addFlash(
                'notice',
                'article Ajouté!'
            );
            return $this->redirectToRoute('createArticle');
        }
        return $this->render('TutoBundle:Article:create_article.html.twig',array('form'=> $form->createView(),
                              'title'=>$title
                                ));
    }

    /**
     * @Route("/admin/updateArticle/{id}", name="updateArticle")
     */
    public function updateArticle(article $article,Request $request)
    {
        $title="Update Article";
        $form = $this->createForm(articleEditType::class,$article);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted()) {
            $this->loadService()->update($article);
            $this->addFlash(
                'notice',
                'Article Edited!'
            );

        }
        return $this->render('TutoBundle:Article:update_article.html.twig',array('form'=> $form->createView(),
                              'title'=>$title
                              ));
    }
    /**
     * @Route("/user/listArticle",name="listArticle")
     */
    public function listArticle()
    {
        $articles= $this->getDoctrine()->getRepository(article::class)->findAll();
        return $this->render('TutoBundle:Article:list.html.twig', array(
            'articles' => $articles
        ));
    }
}
