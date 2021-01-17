<?php

namespace App\Test\Fun;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase; 

class UserControllerTest extends WebTestCase
{
   

    public function testGetUsers()
    {
        $client   = static::createClient();
        $crawler  = $client->request('GET', '/api/users');

        $response = $client->getResponse();

      
        $this->assertJsonResponse($response, 200);
    }

    protected function assertJsonResponse($response, $statusCode = 200)
      {
          $this->assertEquals(
              $statusCode, $response->getStatusCode(),
              $response->getContent()
          );
          $this->assertTrue(
              $response->headers->contains('Content-Type', 'application/json'),
              $response->headers
          );
      }
}


?>