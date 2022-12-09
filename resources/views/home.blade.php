@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        ログインしました!
                        <hr>

                        <!-- 未了のToDoがあるとき -->
                        @if ($todo)
                            <h5 class="card-title">
                                {{ Auth::user()->name }}さんの最新のToDo
                            </h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 100px;">タイトル</th>
                                        <td>{{ $todo->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>内容</th>
                                        <td>{{ $todo->content }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        <!-- 未了のToDoがないとき -->
                        @else
                            <h5 class="card-title">未了のToDoはありません</h5>
                        @endif

                        <a href="{{ url('todos') }}" class="btn btn-info">ToDo一覧</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
