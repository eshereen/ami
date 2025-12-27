<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PowertypeValue;
use Illuminate\Auth\Access\HandlesAuthorization;

class PowertypeValuePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PowertypeValue');
    }

    public function view(AuthUser $authUser, PowertypeValue $powertypeValue): bool
    {
        return $authUser->can('View:PowertypeValue');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PowertypeValue');
    }

    public function update(AuthUser $authUser, PowertypeValue $powertypeValue): bool
    {
        return $authUser->can('Update:PowertypeValue');
    }

    public function delete(AuthUser $authUser, PowertypeValue $powertypeValue): bool
    {
        return $authUser->can('Delete:PowertypeValue');
    }

    public function restore(AuthUser $authUser, PowertypeValue $powertypeValue): bool
    {
        return $authUser->can('Restore:PowertypeValue');
    }

    public function forceDelete(AuthUser $authUser, PowertypeValue $powertypeValue): bool
    {
        return $authUser->can('ForceDelete:PowertypeValue');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PowertypeValue');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PowertypeValue');
    }

    public function replicate(AuthUser $authUser, PowertypeValue $powertypeValue): bool
    {
        return $authUser->can('Replicate:PowertypeValue');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PowertypeValue');
    }

}