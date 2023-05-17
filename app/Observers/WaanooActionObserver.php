<?php

namespace App\Observers;

use App\Models\Waanoo;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class WaanooActionObserver
{
    public function created(Waanoo $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Waanoo'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Waanoo $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Waanoo'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Waanoo $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Waanoo'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
