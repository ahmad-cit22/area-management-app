<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * @var CountryService
     */
    protected $countryService;

    /**
     * CountryController constructor.
     *
     * @param CountryService $countryService
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of countries.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    /**
     * Store a newly created country.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:countries']);
        $this->countryService->create($validated);

        return response()->json(['message' => 'Country created successfully']);
    }

    /**
     * Update the specified country.
     *
     * @param \Illuminate\Http\Request $request
     * @param Country $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Country $country)
    {
        $validated = $request->validate(['name' => 'required|unique:countries,name,' . $country->id]);
        $this->countryService->update($country, $validated);

        return response()->json(['message' => 'Country updated successfully']);
    }

    /**
     * Remove the specified country.
     *
     * @param Country $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Country $country)
    {
        $this->countryService->delete($country);

        return response()->json(['message' => 'Country deleted successfully']);
    }
}
