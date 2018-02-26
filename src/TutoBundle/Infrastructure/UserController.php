<?php
//tsy mis interface f tifirin page test any ivelany :p

namespace TutoBundle\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TutoBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    /**
     * @Route("/tuto/create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $user = new User();
        $user->setName($request->request->get('name'));
        $user->setLastName($request->request->get('lastName'));
        $user->setAge((int)$request->request->get('age'));
        $this->loadService()->add($user);
        return new Response('User' . $user->getName() . 'added');
    }

    /**
     * @Route("/list")
     * @Method("POST")
     */
    public function getAllAction()
    {
        $data = array();
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $itteration = 0;
        foreach ($users as $us) {
            $data[$itteration] = $us->convertion();
            $itteration++;
        }
        return new JsonResponse($data);
    }

    /**
     * @Route("/get/{id}")
     * @Method("GET")
     */
    public function getByIdAction($id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $data = $user->convertion();
        return new Response(json_encode($data));
    }

    /**
     * @Route("/tuto/delete")
     * @Method("POST")
     */
    public function delAction(Request $request)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($request->request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return new Response('User' . $user->getName() . ' deleted');
    }


}
