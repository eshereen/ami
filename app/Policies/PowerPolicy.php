<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Power;
use Illuminate\Auth\Access\HandlesAuthorization;

class PowerPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Power');
    }

    public function view(AuthUser $authUser, Power $power): bool
    {
        return $authUser->can('View:Power');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Power');
    }

    public function update(AuthUser $authUser, Power $power): bool
    {
        return $authUser->can('Update:Power');
    }

    public function delete(AuthUser $authUser, Power $power): bool
    {
        return $authUser->can('Delete:Power');
    }

    public function restore(AuthUser $authUser, Power $power): bool
    {
        return $authUser->can('Restore:Power');
    }

    public function forceDelete(AuthUser $authUser, Power $power): bool
    {
        return $authUser->can('ForceDelete:Power');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Power');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Power');
    }

    public function replicate(AuthUser $authUser, Power $power): bool
    {
        return $authUser->can('Replicate:Power');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Power');
    }

}