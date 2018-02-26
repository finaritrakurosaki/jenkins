<?php

namespace TutoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EtudiatControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'CreateEtudiant');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'UpdateEtudiant');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'ListEtudiant');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'DeleteEtudiant');
    }

}
