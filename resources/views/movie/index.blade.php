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
            @foreach($movies as $key => $movie)
            <div class="d-flex align-items-center p-1 my-3 text-white bg-secondary rounded shadow-sm">
                <div class="col-6 text-center bg-info">
                    <p>WIN<br/>ペッカ攻城</p>
                    <div class="row p-1">
                        <div class="col-2 d-flex align-items-center">
                        <a href="{{$movie->getDeckCopyUrl('winner')}}"><img height="35" src="https://cdn.statsroyale.com/images/copy.png"></a>
                        </div>
                        <div class="col-10">
                            @foreach($movie->getCardKeyListFromDeck('winner') as $card)
                            <img height="40" src="https://raw.githubusercontent.com/RoyaleAPI/cr-api-assets/master/cards-75/{{$card}}.png" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-6 text-center bg-danger">
                    <p>LOSE<br/>ペッカ攻城</p>
                    <div class="row p-1">
                        <div class="col-2 d-flex align-items-center">
                            <a href="{{$movie->getDeckCopyUrl('loser')}}"><img height="35" src="https://cdn.statsroyale.com/images/copy.png"></a>
                        </div>
                        <div class="col-10">
                            @foreach($movie->getCardKeyListFromDeck('loser') as $card)
                            <img height="40" src="https://raw.githubusercontent.com/RoyaleAPI/cr-api-assets/master/cards-75/{{$card}}.png" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ratio ratio-16x9">
                        @include('parts.embed_movie', ['url' => $movie['movie_url']])
                    </div>
                </div>
            </div>               
            @endforeach
            <small class="d-block text-right mt-3">
            <a href="#">All updates</a>
            </small>
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