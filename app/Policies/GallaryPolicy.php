<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Gallary;
use Illuminate\Auth\Access\HandlesAuthorization;

class GallaryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Gallary');
    }

    public function view(AuthUser $authUser, Gallary $gallary): bool
    {
        return $authUser->can('View:Gallary');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Gallary');
    }

    public function update(AuthUser $authUser, Gallary $gallary): bool
    {
        return $authUser->can('Update:Gallary');
    }

    public function delete(AuthUser $authUser, Gallary $gallary): bool
    {
        return $authUser->can('Delete:Gallary');
    }

    public function restore(AuthUser $authUser, Gallary $gallary): bool
    {
        return $authUser->can('Restore:Gallary');
    }

    public function forceDelete(AuthUser $authUser, Gallary $gallary): bool
    {
        return $authUser->can('ForceDelete:Gallary');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Gallary');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Gallary');
    }

    public function replicate(AuthUser $authUser, Gallary $gallary): bool
    {
        return $authUser->can('Replicate:Gallary');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Gallary');
    }

}