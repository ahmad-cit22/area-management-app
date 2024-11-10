<?php

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

beforeEach(function () {
    $this->artisan('migrate:fresh');
    $this->user = User::factory()->create([
        'password' => Hash::make('password123'),
    ]);
    $this->actingAs($this->user);
});

it('can display a list of cities', function () {
    City::factory()->count(3)->create();
    
    $response = $this->get(route('cities.index'));

    $response->assertStatus(200);
    $response->assertViewHas('cities');
});

it('can store a new city', function () {
    $state = State::factory()->create();
    $data = [
        'name' => 'Test City',
        'state_id' => $state->id,
    ];
    $response = $this->post(route('cities.store'), $data);
    $response->assertStatus(200);
    $response->assertJson(['message' => 'City created successfully']);
    $this->assertDatabaseHas('cities', $data);
});

it('can edit an existing city', function () {
    $city = City::factory()->create();
    $response = $this->get(route('cities.edit', $city));
    $response->assertStatus(200);
    $response->assertJson([
        'id' => $city->id,
        'name' => $city->name,
        'state_id' => $city->state_id,
    ]);
});

it('can update an existing city', function () {
    $city = City::factory()->create();
    $data = [
        'name' => 'Updated City Name',
        'state_id' => $city->state_id,
    ];
    $response = $this->put(route('cities.update', $city), $data);
    $response->assertStatus(200);
    $response->assertJson(['message' => 'City updated successfully']);
    $this->assertDatabaseHas('cities', $data);
    $this->assertDatabaseMissing('cities', ['name' => $city->name]);
});

it('can delete a city', function () {
    $city = City::factory()->create();
    $response = $this->delete(route('cities.destroy', $city));
    $response->assertStatus(200);
    $response->assertJson(['message' => 'City deleted successfully']);
    $this->assertDatabaseMissing('cities', ['id' => $city->id]);
});
