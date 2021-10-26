<?php

namespace App\Repositories;

use App\Models\Package;
use App\Repositories\Eloquent\BaseRepository;

class PackageRepository extends BaseRepository
{
    /**
     * var $package
     */
    protected $package;

    /**
     * PackageRepository constructor
     * @param Package $package
     */
    public function __construct(Package $package)
    {
        parent::__construct($package);

        $this->package = $package;
    }
}
