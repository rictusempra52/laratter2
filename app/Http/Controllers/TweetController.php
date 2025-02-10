<?php

namespace App\Http\Controllers;

use App\Models\tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Tweet の全件を新しい順に取得する
        $tweets = tweet::with('user')->latest()->get();
        // ツイート一覧ビューを表示する
        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tweet $tweet)
    {
        //
    }
}
