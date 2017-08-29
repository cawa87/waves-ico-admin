<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserSettingsControllerTest extends WebTestCase
{
    public function testIndwex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'settgins/');
    }

}
