<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Tweet;

class TweetController extends Controller
{
    /**
     * Store a newly tweet in storage
     *
     * @param  TweetRequest $request
     * @return Redirect
     */
    public function store(TweetRequest $request)
    {
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $request->validated()['body'],
        ]);

        return redirect()->route('home');
    }

    /**
     * Show the tweets timeline.
     *
     * @return View
     */
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }
}
