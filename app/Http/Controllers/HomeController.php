<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     * 一番新しい未達成ToDoを表示するTop画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();

        $todo = Todo::where('user_id', '=', $user_id)
            ->where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->first();

        return view('home', compact('todo'));
    }
}
