<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Services\PackageService;

class PackageController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('create', Package::class);

        $list = $this->packageService->packageListing();

        return view('dashboard', ['list' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Package::class);

        $package = $this->packageService->create($request);

        return response()->json($package, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $this->authorize('view', $package);

        $result = $this->packageService->show($package);

        return response()->json($result, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $this->authorize('view', $package);

        $updatedPackage = $this->packageService->update($package, $request);

        return response()->json($updatedPackage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $this->authorize('delete', $package);

        $result = $this->packageService->delete($package);

        return response()->json($result);
    }
}
