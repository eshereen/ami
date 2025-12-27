<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Powertype;
use Illuminate\Auth\Access\HandlesAuthorization;

class PowertypePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Powertype');
    }

    public function view(AuthUser $authUser, Powertype $powertype): bool
    {
        return $authUser->can('View:Powertype');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Powertype');
    }

    public function update(AuthUser $authUser, Powertype $powertype): bool
    {
        return $authUser->can('Update:Powertype');
    }

    public function delete(AuthUser $authUser, Powertype $powertype): bool
    {
        return $authUser->can('Delete:Powertype');
    }

    public function restore(AuthUser $authUser, Powertype $powertype): bool
    {
        return $authUser->can('Restore:Powertype');
    }

    public function forceDelete(AuthUser $authUser, Powertype $powertype): bool
    {
        return $authUser->can('ForceDelete:Powertype');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Powertype');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Powertype');
    }

    public function replicate(AuthUser $authUser, Powertype $powertype): bool
    {
        return $authUser->can('Replicate:Powertype');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Powertype');
    }

}