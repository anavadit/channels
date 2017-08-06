<?php

namespace Rina\Channels\Models;

class User extends \App\User
{
    public function channels()
    {
        return $this->belongsToMany('\Rina\Channels\Models\SubscriptionChannel', 'user_subscription_channels');
    }
}