<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }        
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ログインユーザーを取得
        $user = \Auth::user();
        return view('users.index', [
          'title' => 'プロフィール',
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    
    public function show($id)
    {
        $user = User::find($id);
        $recommended_posts = Post::recommend($user->id)->get();

        return view('users.index', [
            'user' => $user,
            'title' => 'プロフィール',
            'recommended_posts' => $recommended_posts,
            'recommended_user' => User::recommend($user->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
