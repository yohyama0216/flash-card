@extends('layouts.layout')

@section('title','TOP')

@section('content')
@include('layouts.sidebarmenu', ['current' => 'top'])
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">学習設定</h1>
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
        <div class="col-md-2 mb-3">
            <label for="country">出題数</label>
            <select class="custom-select d-block w-50" id="country" required="">
                <option value="">Choose...</option>
                <option>United States</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label for="category">カテゴリー</label>
            <select class="custom-select d-block w-50" id="state" required="">
                <option value="">Choose...</option>
                <option>California</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="word_limit">単語数上限</label>
            <select class="custom-select d-block w-50" id="state" required="">
                <option value="">Choose...</option>
                <option>California</option>
            </select>
            </div>
            <div class="col-md-2 mb-3">
            <label for="last_learn_date">前回学習日</label>
            <select class="custom-select d-block w-50" id="state" required="">
                <option value="">Choose...</option>
                <option>California</option>
            </select>
        </div>
    </div>

              <div class="col-md-2">
            <button>設定を保存</button>
        </div>
            </div>
    <div class="row">
        <div class="col-4">
            <ul>
            <li>
                <span>出題数</span>
                <select>
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </li>
            <li>
                <span>単語数上限</span>
                <select>
                    <option>8</option>
                    <option>15</option>
                    <option>25</option>
                </select>
            </li>    
            <li>
                <span>前回学習日</span>
                <select>
                <option>なし</option>
                    <option>5日前</option>
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </li>
                <li>
                    <span>ジャンル</span>
                    <select>
                        <option value="0">すべて</option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </li>
            </ul>
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