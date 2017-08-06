<?php

namespace Rina\Channels\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class SubscriptionChannel extends Eloquent
{
    protected $table = 'subscription_channels';
    public $incrementing = false;
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_subscription_channels');
    }
}