<?php

namespace Rina\Channels;

use Illuminate\Http\Request;

class Channels
{
    public function show()
    {
        $request = request();
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/templates/');
        $twig = new \Twig_Environment($loader);
        $template = $twig->load('channels.html');
        return $template->render([
            'all_channels' => Models\SubscriptionChannel::all(),
            'user_channels' => Models\User::find($request->user()->id)->channels->map(function($channel) {
                return $channel->id;
            }),
            '_token' => $request->session()->get('_token')
        ]);
    }
}
