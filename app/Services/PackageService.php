<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\PackageRepository;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageService
{
    /**
     * var $packageRepository
     */
    protected $packageRepository;

    /**
     * PackageRepository constructor
     * @param PackageRepository $packageRepository
     */
    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    /**
     * Package create
     * @param \Illuminate\Http\Request $request
     * @return Model
     */
    public function create(Request $request)
    {
        return $this->packageRepository->create($request->all());
    }

    /**
     * Get Package
     *
     * @param Package $package
     * @return model
     */
    public function show($package)
    {
        return $this->packageRepository->findById($package->id);
    }

    /**
     * Package update
     *
     * @param Package $package
     * @param \Illuminate\Http\Request $request
     * @return Model
     */
    public function update(Package $package, Request $request)
    {
        $result = $this->packageRepository->update($package->id, $request->all());

        return $result;
    }

    /**
     * Package Delete
     * @param Package $package
     * @return array
     */
    public function delete(Package $package)
    {
        $this->packageRepository->deleteById($package->id);

        return ['deleted' => true, 'id' => $package->id];
    }

    /**
     * Listing
     * @return array
     */
    public function packageListing()
    {
        return $this->packageRepository->all()->toArray();
    }
}
