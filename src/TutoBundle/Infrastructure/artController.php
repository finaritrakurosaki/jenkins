<?php

namespace TutoBundle\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use TutoBundle\Form\articleType;


class artController extends BaseAdminController
{
    protected function createEntityForm($entity, array $entityProperties, $view)
    {
        return $form = $this->createForm(articleType::class,$entity);

    }
}
