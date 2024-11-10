<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

beforeEach(function () {
    // $this->artisan('migrate:fresh');
});

it('shows the registration view', function () {
    $response = $this->get(route('register'));

    $response->assertStatus(200);
    $response->assertViewIs('auth.register');
});

it('can register a new user with valid data', function () {
    $data = [
        'name' => 'Test User',
        'username' => 'testuser123',
        'email' => 'testuser@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ];

    $response = $this->post(route('register'), $data);

    $response->assertRedirect(route('dashboard'));
    $this->assertDatabaseHas('users', [
        'email' => $data['email'],
        'username' => $data['username'],
    ]);
    $this->assertAuthenticated();
});

it('fails to register a user with invalid data', function () {
    $data = [
        'name' => '',
        'username' => 'testuser123',
        'email' => 'invalidemail',
        'password' => 'password',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post(route('register'), $data);

    $response->assertSessionHasErrors(['name', 'email', 'password']);
    $this->assertGuest();
});

it('can validate the username field', function () {
    $response = $this->postJson(route('register.validate'), [
        'field' => 'username',
        'username' => 'validusername123',
    ]);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Valid input']);
});

it('can validate the password field', function () {
    $response = $this->postJson(route('register.validate'), [
        'field' => 'password',
        'password' => 'Password123!',
    ]);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Valid input']);
});
