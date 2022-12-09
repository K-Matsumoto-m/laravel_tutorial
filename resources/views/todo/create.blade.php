@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    ToDo登録
                </div>
                <div class="card-body">
                    <form method="POST" action="/todos">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="control-label">タイトル</label>
                            <input class="form-control" name="title" type="text">
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">内容</label>
                            <input class="form-control" name="content" type="text">
                        </div>
                        <button class="btn btn-success" type="submit">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
