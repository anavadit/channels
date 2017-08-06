<?php

namespace Rina\Channels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ChannelsController extends Controller
{
    public function save(Request $request)
    {
        $user = Auth::user();

        Models\User::find($user->id)->channels()->detach();

        $channels = $request->input('channels');
        if (count($channels))
        {
            foreach($channels as $channel)
            {
                Models\SubscriptionChannel::find($channel)->users()->attach($user->id);
            }
        }

        return redirect()->to(app('url')->previous());
    }
}
