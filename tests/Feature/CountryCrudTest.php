<?php

use App\Models\Country;
use App\Models\User;
use App\Services\CountryService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Testing\RefreshDatabase;

beforeEach(function () {
    // $this->artisan('migrate:fresh');
    $this->user = User::factory()->create([
        'password' => Hash::make('password123'),
    ]);
    $this->actingAs($this->user);
});

it('can display a list of countries', function () {
    Country::factory()->count(3)->create();

    $response = $this->get(route('countries.index'));

    $response->assertStatus(200);
    $response->assertViewHas('countries');
});

it('can store a new country', function () {
    $data = [
        'name' => 'Test Country',
    ];

    $response = $this->post(route('countries.store'), $data);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Country created successfully']);

    $this->assertDatabaseHas('countries', $data);
});

it('can edit an existing country', function () {
    $country = Country::factory()->create();

    $response = $this->get(route('countries.edit', $country));

    $response->assertStatus(200);
    $response->assertJson([
        'id' => $country->id,
        'name' => $country->name,
    ]);
});

it('can update an existing country', function () {
    $country = Country::factory()->create();

    $data = [
        'name' => 'Updated Country Name',
    ];

    $response = $this->put(route('countries.update', $country), $data);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Country updated successfully']);

    $this->assertDatabaseHas('countries', $data);
    $this->assertDatabaseMissing('countries', ['name' => $country->name]);
});

it('can delete a country', function () {
    $country = Country::factory()->create();

    $response = $this->delete(route('countries.destroy', $country));

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Country deleted successfully']);

    $this->assertDatabaseMissing('countries', ['id' => $country->id]);
});

