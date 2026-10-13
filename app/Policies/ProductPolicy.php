<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin', 'editor', 'user');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin', 'editor');
    }

    public function update(User $user, Product $product): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('editor') && $product->created_by === $user->id;
    }

    public function delete(User $user, Product $product): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('editor') && $product->created_by === $user->id;
    }
}
