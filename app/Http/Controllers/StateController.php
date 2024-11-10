<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateRequest;
use App\Models\Country;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $states = State::latest()->get();
        $countries = Country::all();

        return view('pages.states.index', compact('states', 'countries'));
    }

    /**
     * Store a newly created state in storage
     *
     * @param  \App\Http\Requests\StateRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StateRequest $request)
    {
        $validated = $request->validated();

        $this->stateService->create($validated);

        return response()->json(['message' => 'State created successfully']);
    }

    /**
     * Edit the specified state.
     *
     * @param State $state
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(State $state)
    {
        return response()->json($state);
    }

    /**
     * Update an existing state in storage
     *
     * @param  \App\Http\Requests\StateRequest  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StateRequest $request, State $state)
    {
        $validated = $request->validated();

        $this->stateService->update($state, $validated);

        return response()->json(['message' => 'State updated successfully']);
    }

    /**
     * Remove an existing state from storage
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(State $state)
    {
        $this->stateService->delete($state);

        return response()->json(['message' => 'State deleted successfully']);
    }
}
