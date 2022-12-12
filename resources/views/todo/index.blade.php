@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    ToDo一覧
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('todos/create') }}" class="btn btn-primary mb-3">登録</a>

                    <!-- 検索フォーム -->
                    <form method="GET" action="/todos">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <span>内容検索</span>
                            </div>
                            <div class="col-auto">
                                <!-- label for="search" class="ssr-only">内容検索</label -->
                                <input class="form-control mb-2" type="text" name="search"
                                    value="{{ $search }}" placeholder="検索語句を入力">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary mb-2" type="submit">検索</button>
                            </div>
                        </div>
                    </form>
                    <!-- / 検索フォーム -->
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 150px;">状態</th>
                                <th>タイトル</th>
                                <th style="width: 200px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($todos as $todo)
                                <tr>
                                    <td class="text-center">
                                        <!-- 未了の場合、完了ボタンを表示 -->
                                        @if($todo->status === 0)
                                            <form method="POST" action="/todos/complete/{{ $todo->id }}">
                                                @csrf
                                                <button class="btn btn-success" type="submit">完了にする</button>
                                            </form>
                                        <!-- 完了の場合、「済」と表示 -->
                                        @elseif($todo->status === 1)
                                            完了
                                        @endif
                                    </td>
                                    <td>{{ $todo->title }}</td>
                                    <td>
                                        <a href="{{ url('todos/' . $todo->id) }}" class="btn btn-info">詳細</a>
                                        <a href="{{ url('todos/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a>
                                        <form method="POST" action="/todos/{{ $todo->id }}" class="d-inline-block" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td>ToDoはありません</td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/todo.js') }}"></script>
@endsection
