<?php

namespace App\Services;

use App\Models\State;

class StateService
{
    /**
     * Create a new state.
     *
     * @param array $data
     * @return \App\Models\State
     */
    public function create(array $data)
    {
        return State::create($data);
    }

    /**
     * Update an existing state.
     *
     * @param \App\Models\State $state
     * @param array $data
     * @return \App\Models\State
     */
    public function update(State $state, array $data)
    {
        return $state->update($data);
    }

    /**
     * Delete an existing state.
     *
     * @param \App\Models\State $state
     * @return bool|null
     */
    public function delete(State $state)
    {
        return $state->delete();
    }
}
