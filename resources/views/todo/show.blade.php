@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    ToDo詳細
                </div>
                <div class="card-body">
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
                            <tr>
                                <th>状態</th>
                                <td>
                                    <!-- 未了の場合 -->
                                    @if($todo->status === 0)
                                        未了
                                    <!-- 完了の場合 -->
                                    @elseif($todo->status === 1)
                                        済
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('todos') }}" class="btn btn-secondary">戻る</a>
                    <a href="{{ url('todos/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a>
                </div>
            </div>
        </div>
    </div>
@endsection
