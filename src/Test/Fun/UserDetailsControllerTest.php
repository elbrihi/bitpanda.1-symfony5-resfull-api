<?php

namespace App\Test\Fun;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase; 

class UserDetailsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        
    }

    /*public function testUpdateUserDetailsUsers()
    {
        $client   = static::createClient();

        $crawler  = $client->request('POST', '/api/users/details/update/4',
        array( 
            "firstName" =>"Igor +++********",
            "lastName" =>"Snow",
            "phoneNumber" =>"0043664777777",
            "user_id" =>7,
            "citizenship_country_id" =>4,
           
        )); 
       
        $response = $client->getResponse();

    
        $this->assertJsonResponse($response, 200);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
      
        $this->assertJsonResponse($response, 200);
    }*/

    public function testDeleteUserDetailsUsers()
    {
        $client   = static::createClient();

        $crawler  = $client->request('DELETE', '/api/users/details/delete/{id_users_details}'); 
       
        $response = $client->getResponse();

    
        $this->assertJsonResponse($response, 200);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
      
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