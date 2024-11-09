<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Services\StateService;
use Illuminate\Http\Request;

class StateController extends Controller
{

    /**
     * The state service instance.
     *
     * @var \App\Services\StateService
     */
    protected $stateService;

    /**
     * Create a new state controller instance.
     *
     * @param  \App\Services\StateService  $stateService
     * @return void
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    /**
     * Display a listing of states
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();

        return view('states.index', compact('states'));
    }

    /**
     * Store a newly created state in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:states']);

        $this->stateService->create($validated);

        return response()->json(['message' => 'State created successfully']);
    }

    /**
     * Update an existing state in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $validated = $request->validate(['name' => 'required|unique:states,name,' . $state->id]);

        $this->stateService->update($state, $validated);

        return response()->json(['message' => 'State updated successfully']);
    }

    /**
     * Remove an existing state from storage
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $this->stateService->delete($state);

        return response()->json(['message' => 'State deleted successfully']);
    }
}
