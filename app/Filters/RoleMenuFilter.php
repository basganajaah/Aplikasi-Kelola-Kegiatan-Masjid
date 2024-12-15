<?php

namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Illuminate\Support\Facades\Auth;

class RoleMenuFilter implements FilterInterface
{
    public function transform($item)
    {
        if (Auth::check()) {
            if (isset($item['role']) && Auth::user()->role !== $item['role']) {
                return false;
            }
        }

        return $item;
    }
}