<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test registration form submission with valid data.
     *
     * @return void
     */
    public function test_registration_with_valid_data()
    {
        $response = $this->post(route('store'), [
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password123',
            // 'terms' => 'on'
        ]);

        $response->assertStatus(302); // Check if it redirects after successful registration
        $response->assertSessionHas('success'); // Check for success message
    }

    /**
     * Test registration form submission with invalid data (missing fields).
     *
     * @return void
     */
    public function test_registration_with_missing_data()
    {
        $response = $this->post(route('store'), [
            'username' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => ''
        ]);

        $response->assertStatus(302); // Should redirect back due to validation failure
        $response->assertSessionHasErrors(['username', 'email', 'password']); // Check for specific validation errors
    }

    /**
     * Test registration form submission with mismatched passwords.
     *
     * @return void
     */
    public function test_registration_with_mismatched_passwords()
    {
        $response = $this->post(route('store'), [
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password1234', // Different password
            // 'terms' => 'on'
        ]);

        $response->assertStatus(302); // Should redirect back due to validation failure
        $response->assertSessionHasErrors(['password']); // Check for password confirmation error
    }

    /**
     * Test registration form submission without agreeing to terms.
     *
     */
    // public function test_registration_without_agreeing_to_terms()
    // {
    //     $response = $this->post(route('store'), [
    //         'username' => 'testuser',
    //         'email' => 'testuser@example.com',
    //         'password' => 'password123',
    //         'password_confirmation' => 'password123'
    //         // 'terms' is not set
    //     ]);

    //     $response->assertStatus(302); // Should redirect back due to validation failure
    //     $response->assertSessionHasErrors(['terms']); // Check for terms agreement error
    // }
}
