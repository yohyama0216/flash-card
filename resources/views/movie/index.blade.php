@extends('layouts.layout')

@section('title','TOP')

@section('content')
@include('layouts.sidebarmenu', ['current' => 'top'])
<main class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100"><i class="bi bi-search"></i> 対戦動画検索</h6>
        </div>
    </div>


    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">検索結果</h6>
                <small>検索条件：なし</small>
            </div>
        </div>
        <h6 class="border-bottom border-gray pb-2 mb-0">検索件数：10件</h6>
        <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#007bff" width="100%" height="100%"></rect><text fill="#007bff" dy=".3em" x="50%" y="50%">32x32</text></svg>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@username</strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
            </p>
        </div>
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#e83e8c" width="100%" height="100%"></rect><text fill="#e83e8c" dy=".3em" x="50%" y="50%">32x32</text></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">@username</strong>
        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
      </p>
    </div>
    <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#6f42c1" width="100%" height="100%"></rect><text fill="#6f42c1" dy=".3em" x="50%" y="50%">32x32</text></svg>
        <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">@username</strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
        <div class="table-responsive col-12 border-bottom border-gray">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>英文</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $key => $movie)
                        <tr><td>{{$movie['winners_deck']}}</td><td>3.6</td><td>COPY</td></tr>
                        <tr><td>{{$movie['losers_deck']}}</td><td>3.6</td><td>COPY</td></tr>
                        <tr><td>{{$movie['url']}}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <small class="d-block text-right mt-3">
        <a href="#">All updates</a>
        </small>
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