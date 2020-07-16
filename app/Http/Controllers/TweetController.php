<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Store a newly tweet in storage
     *
     * @param  TweetRequest $request
     * @return JsonResponse
     */
    public function store(TweetRequest $request)
    {
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $request->validated()['body'],
        ]);

        return redirect()->route('home');
    }
}
