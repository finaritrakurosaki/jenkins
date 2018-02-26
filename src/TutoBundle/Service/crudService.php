<?php

namespace TutoBundle\Service;

class crudService
{
    private $_em;
    public static  $PREVIEWPAGE  ;
    /**
     * crudService constructor.
     * @param $_em
     */
    public function __construct($em)
    {
        $this->_em = $em;
    }


    public function add($object)
    {
        $this->_em->persist($object);
        $this->_em->flush();
    }
    public function update()
    {
        $this->_em->flush();
    }
    public function delete($object)
    {
        $this->_em->remove($object);
    }
}