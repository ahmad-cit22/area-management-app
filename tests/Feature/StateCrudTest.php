<?php

use App\Models\Country;
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

it('can display a list of states', function () {
    State::factory()->count(3)->create();

    $response = $this->get(route('states.index'));

    $response->assertStatus(200);
    $response->assertViewHas('states');
});

it('can store a new state', function () {
    $country = Country::factory()->create();
    $data = [
        'name' => 'Test State',
        'country_id' => $country->id,
    ];
    $response = $this->post(route('states.store'), $data);
    $response->assertStatus(200);
    $response->assertJson(['message' => 'State created successfully']);
    $this->assertDatabaseHas('states', $data);
});

it('can edit an existing state', function () {
    $state = State::factory()->create();
    $response = $this->get(route('states.edit', $state));
    $response->assertStatus(200);
    $response->assertJson([
        'id' => $state->id,
        'name' => $state->name,
    ]);
});

it('can update an existing state', function () {
    $state = State::factory()->create();
    $data = [
        'name' => 'Updated State Name',
        'country_id' => $state->country_id,
    ];
    $response = $this->put(route('states.update', $state), $data);
    $response->assertStatus(200);
    $response->assertJson(['message' => 'State updated successfully']);
    $this->assertDatabaseHas('states', $data);
    $this->assertDatabaseMissing('states', ['name' => $state->name]);
});

it('can delete a state', function () {
    $state = State::factory()->create();
    $response = $this->delete(route('states.destroy', $state));
    $response->assertStatus(200);
    $response->assertJson(['message' => 'State deleted successfully']);
    $this->assertDatabaseMissing('states', ['id' => $state->id]);
});

