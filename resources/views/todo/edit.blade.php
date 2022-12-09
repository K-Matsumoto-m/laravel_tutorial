@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    ToDo編集
                </div>
                <div class="card-body">
                    <form method="POST" action="/todos/{{ $todo->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" class="control-label">タイトル</label>
                            <input class="form-control" name="title" type="text" value="{{ $todo->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">内容</label>
                            <input class="form-control" name="content" type="text" value="{{ $todo->content }}">
                        </div>
                        <button class="btn btn-success" type="submit">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
