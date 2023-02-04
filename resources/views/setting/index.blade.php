@extends('layouts.layout')

@section('title','TOP')

@section('content')
@include('layouts.sidebarmenu', ['current' => 'top'])
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">学習設定</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="country">出題数</label>
            <select class="custom-select d-block w-50" id="country" required="">
            <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                    <option>50</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label for="category">カテゴリー</label>
            <select class="custom-select d-block w-50" id="state" required="">
            <option value="0">すべて</option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                        <option>50</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="word_limit">単語数上限</label>
            <select class="custom-select d-block w-50" id="state" required="">
            <option>8</option>
                    <option>15</option>
                    <option>25</option>
            </select>
            </div>
            <div class="col-md-2 mb-3">
            <label for="last_learn_date">前回学習日</label>
            <select class="custom-select d-block w-50" id="state" required="">
            <option>5日前</option>
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                    <option>50</option>
            </select>
        </div>
    </div>

              <div class="col-md-2">
            <button>設定を保存</button>
        </div>
    </div>
</main>
@endsection

@section('side')
  @parent
  <ul>
    <li>ccc</li>
    <li>ddd</li>
  </ul>
@endsection