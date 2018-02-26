<?php

namespace TutoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MatiereControllerTest extends WebTestCase
{
    public function testCreatematiere()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'createMatiere');
    }

    public function testUpdatematiere()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'updateMatiere');
    }

    public function testListmatiere()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'listMatiere');
    }

    public function testDeletematiere()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'deleteMatiere');
    }

}
