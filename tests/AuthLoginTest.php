<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    public function test_login_view_is_returned()
    {
        // Send a GET request to the login route
        $response = $this->get('/login');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the correct view is returned
        $response->assertViewIs('authenticate.authenticate-login');

        // Assert that the pageConfigs data is passed to the view
        $response->assertViewHas('pageConfigs', ['myLayout' => 'blank']);
    }

    public function test_register_view_is_returned()
    {
        // Send a GET request to the register route
        $response = $this->get('/register');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the correct view is returned
        $response->assertViewIs('authenticate.authenticate-register');

        // Assert that the pageConfigs data is passed to the view
        $response->assertViewHas('pageConfigs', ['myLayout' => 'blank']);
    }
}
