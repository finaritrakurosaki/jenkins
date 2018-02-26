<?php
/**
 * Created by PhpStorm.
 * User: f.ratsimbazafy
 * Date: 13/02/2018
 * Time: 15:11
 */

namespace TutoBundle\ServiceApplicatif;


use Symfony\Component\HttpFoundation\Request;
use TutoBundle\Entity\User;


class UserServiceImpl implements UserService
{

    private $_em;
    private $request;

    public function __construct($em , Request $req)
    {
        $this->_em = $em;
        $this->request = $req;
    }
    public  function createUser()
    {
        $user= new User();
        $user->setName($this->request->request->get('name'));
        $user->setLastName($this->request->request->get('lastName'));
        $user->setAge((int)$this->request->request->get('age'));
        $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

    }
    public  function listUser()
    {

    }
    public  function deleteUser()
    {

    }
}