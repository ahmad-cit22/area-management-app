<?php

namespace App\Services;

use App\Models\City;

class CityService
{
    /**
     * Create a new city.
     *
     * @param array $data
     * @return \App\Models\City
     */
    public function create(array $data)
    {
        return City::create($data);
    }

    /**
     * Update an existing city.
     *
     * @param \App\Models\City $city
     * @param array $data
     * @return \App\Models\City
     */
    public function update(City $city, array $data)
    {
        return $city->update($data);
    }

    /**
     * Delete an existing city.
     *
     * @param \App\Models\City $city
     * @return bool
     */
    public function delete(City $city)
    {
        return $city->delete();
    }
}
