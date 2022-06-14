<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Order $order)
    {
        return $user->id == $order->id_user;
        
        // return $user->id == $order->id_user
        //     || $user->is_admin;
    }
}
