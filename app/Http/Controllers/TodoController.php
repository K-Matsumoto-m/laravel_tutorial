<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 一旦全件取得する（後程、ログインユーザーのToDoに限定する予定）
        $todos = Todo::all();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * 登録画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->content = $request->input('content');
        $todo->user_id = Auth::id();
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を登録しました!'
        );
    }

    /**
     * Display the specified resource.
     * 
     * 詳細画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * 編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->title = $request->input('title');
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を更新しました!'
        );
    }

    /**
     * Remove the specified resource from storage.
     * 
     * 削除機能
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を削除しました!'
        );
    }
}
