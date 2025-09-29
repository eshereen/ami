<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Powertype;
use Illuminate\Auth\Access\HandlesAuthorization;

class PowerTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PowerType');
    }

    public function view(AuthUser $authUser, Powertype $powerType): bool
    {
        return $authUser->can('View:PowerType');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PowerType');
    }

    public function update(AuthUser $authUser, Powertype $powerType): bool
    {
        return $authUser->can('Update:PowerType');
    }

    public function delete(AuthUser $authUser, Powertype $powerType): bool
    {
        return $authUser->can('Delete:PowerType');
    }

    public function restore(AuthUser $authUser, Powertype $powerType): bool
    {
        return $authUser->can('Restore:PowerType');
    }

    public function forceDelete(AuthUser $authUser, Powertype $powerType): bool
    {
        return $authUser->can('ForceDelete:PowerType');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PowerType');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PowerType');
    }

    public function replicate(AuthUser $authUser, Powertype $powerType): bool
    {
        return $authUser->can('Replicate:PowerType');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PowerType');
    }

}
