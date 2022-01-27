<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnrollmentPolicy
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

    public function withdraw(User $user, $enrollment)
    {
        return $enrollment->status==='Active';
    }
    public function closed(User $user, $enrollment)
    {
        return $enrollment->status==='Inactive';
    }

}
