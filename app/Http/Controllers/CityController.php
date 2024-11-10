<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\State;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * The city service instance.
     *
     * @var CityService
     */
    protected $cityService;

    /**
     * CityController constructor.
     *
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of cities.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cities = City::latest()->get();
        $states = State::latest()->get();

        return view('pages.cities.index', compact('cities', 'states'));
    }

    /**
     * Store a newly created city.
     *
     * @param CityRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CityRequest $request)
    {
        $validated = $request->validated();

        $this->cityService->create($validated);

        return response()->json(['message' => 'City created successfully']);
    }

    /**
     * Edit the specified city.
     *
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(City $city)
    {
        return response()->json($city);
    }

    /**
     * Update the specified city.
     *
     * @param CityRequest $request
     * @param City    $city
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CityRequest $request, City $city)
    {
        $validated = $request->validated();

        $this->cityService->update($city, $validated);

        return response()->json(['message' => 'City updated successfully']);
    }

    /**
     * Remove the specified city.
     *
     * @param City $city
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(City $city)
    {
        $this->cityService->delete($city);

        return response()->json(['message' => 'City deleted successfully']);
    }
}
