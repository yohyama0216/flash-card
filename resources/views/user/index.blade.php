@extends('layouts.layout')

@section('title','TOP')

@section('content')
@include('layouts.sidebarmenu', ['current' => 'top'])
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">学習</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <h4>統計</h4>
            <ul>
                <li>総例文数:3000</li>
                <li>未着手  :2000</li>
                <li>暗記中  :290</li>
                <li>暗記完了:100</li>
            </ul>
        </div>
        <div class="col-2">
            <h4>学習ペース</h4>
            <ul>
                <li>新規:2.5</li>
                <li>復習:2.5</li>
                <li>完了:1.2</li>
            </ul>
        </div>
        <div class="col-2">
            <h4>学習ポイント</h4>
            <ul>
                <li>合計:1200</li>
            </ul>
        </div>
    </div>
    // todo 学習状態テーブルと結合
    @if($users)
    <div class="table-responsive col-6">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>学習中</th>
                    <th>学習完了</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>500</td>
                        <td>100</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div>見つかりませんでした。</div>
    @endif
</main>
@endsection

@section('side')
  @parent
  <ul>
    <li>ccc</li>
    <li>ddd</li>
  </ul>
@endsection