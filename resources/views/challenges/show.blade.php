@extends('layouts.challenges')

@section('content')
<div class="container-fluid">
  <div class="row my-4 ml-3">
    <h4 class="whiteline font-weight-bold">みんなのつくってみた</h4>
  </div>

  <!-- 作ってみた下 -->
  <div class="row justify-content-around pb-5">

    <!-- 作ったメニュー -->
    <div class="col-10 col-md-7 firstborder">
      <div class="row text-center justify-content-center">
        <div class="col-10  col-md-10 h-75 mt-4">

          <!-- ! データ -->
          <h3>
            <span class="mr-5">{{$user->name}}の</span><span>{{ $recipe->name }}</span>
          </h3>

          <img class="mt-3" src="/storage/challenges_img/{{ $challenge->img }}" alt="NO IMAGE" style="width: 80%; height: 50%;">
          <p class="text-justify mt-4">
            <span class="comment">{{ $challenge->impression }}</span>
          </p>

          <div class="reaction text-right">
            <span>
              <img src="./img/good!.png" width="10%" height="10%">
            </span>
            <span style="font-size: 2em;" class="mx-2">
              ３
            </span>
            <span>
              <img src="./img/twitterシェア！.png" width="10%" height="10%">
            </span>
            <p class="text-left small font-weight-lighter">
              〇件のコメント▼
            </p>
          </div>
          <!-- ! Vue:slack風にしたい -->

        </div>
      </div>
    </div>

    <!-- 参考レシピ -->
    <!-- ! データ -->
    <div class="col-10 mt-5 col-md-3 h-75 secondborder">
      <!-- 中身 -->
      <div class="row justify-content-center">
        <div class="col-md-10 h-75 mt-4">
          <p>参考レシピ</p>
          <a href="{{ route('recipes.show', ['id' => $recipe->id])}}">
            <img class="card-img-top" src="/storage/recipes_img/{{ $recipe->img }}" alt="NO IMAGE" style="width: 100%; height: 60%;">
          </a>
          <a href="{{ route('recipes.show', ['id' => $recipe->id])}}">
            <p class="text-center mt-4">{{ $recipe->name }}</p>
          </a>
        </div>
      </div>
    </div>
  </div>

  @if(Auth::id() == $challenge->user_id)
  <div class="row">
    <!-- 編集ボタン -->
    <div class="col-5 mr-2">
    <button onclick="location.href='{{ route('challenges.edit', ['challenge_id' => $challenge->id]) }}'" class="btn btn-lg btn-info" style="width: 100%; color: #fff;">編集</button>
    </div>
    <!-- 削除ボタン -->
    <div class="col-5">
      <form action="{{ route('challenges.delete', ['challenge_id' => $challenge->id]) }}" method="POST">
        {{ csrf_field() }}
          <button type="submit" class="btn btn-lg btn-info" style="width: 100%; color: #fff;">削除</button>
      </form>
    </div>
  </div>
  @endif
</div>
@endsection