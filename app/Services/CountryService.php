<?php

namespace App\Services;

use App\Models\Country;

class CountryService
{
    /**
     * Create a new country.
     *
     * @param  array  $data
     * @return \App\Models\Country
     */
    public function create(array $data)
    {
        return Country::create($data);
    }

    /**
     * Update an existing country.
     *
     * @param  \App\Models\Country  $country
     * @param  array  $data
     * @return \App\Models\Country
     */
    public function update(Country $country, array $data)
    {
        return $country->update($data);
    }

    /**
     * Delete an existing country.
     *
     * @param  \App\Models\Country  $country
     * @return bool
     */
    public function delete(Country $country)
    {
        return $country->delete();
    }
}
