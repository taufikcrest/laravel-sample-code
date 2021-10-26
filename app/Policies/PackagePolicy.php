<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Package;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can view the area.
     *
     * @param User $user
     * @param Package $package
     * @return mixed
     */
    public function view(User $user, Package $package)
    {
        return true;
    }

    /**
     * Determine whether the user can create area.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the area.
     *
     * @param  User $user
     * @param  Package $package
     * @return mixed
     */
    public function update(User $user, Package $package)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the package.
     * @param  User $user
     * @param  Package $package
     * @return mixed
     */
    public function delete(User $user, Package $package)
    {
        if ($user && $user->role && $user->role == 'admin') {
            return true;
        }

        return false;
    }
}
