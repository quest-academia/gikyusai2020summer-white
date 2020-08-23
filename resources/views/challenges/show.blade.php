@extends('layouts.app')

@section('content')
<div class="container-fluid pt-5 pl-5 pr-5">
  <div class="row mb-4">
    <h2 class="whiteline font-weight-bold mx-auto">みんなのつくってみた</h2>
  </div>

  <!-- 作ってみた下 -->
  <div class="row justify-content-around">

    <!-- 作ったメニュー -->
    <div class="col-md-8 mb-4 firstborder">
      <div class="row text-center justify-content-center">
        <div class="col-10 col-md-10 h-75 mt-4">

          <!-- ! データ -->
          <h3 class="challenge_title mt-2">
            <span style="font-weight: bold; color: #5d5d5d;">{{ $user->name }}さん</span>の
            <span style="font-weight: bold;">{{ $recipe->name }}</span>
          </h3>

          <img class="my-4" src="/storage/challenges_img/{{ $challenge->img }}" alt="NO IMAGE" style="width: 80%; height: 50%;">
          <p class="text-justify mt-4">
            <span class="comment">{{ $challenge->impression }}</span>
          </p>

          <div class="reaction text-right">
            <!-- Favoriteコンポーネントに渡しているもの -->
            <!-- 今見てるユーザーが良いねを押してるかどうか -->
            <!-- いいねの現在数   -->
            <!-- ログイン状態か -->
            <!-- チャレンジレシピのID -->
            <favorite :first-favorite="@json($challenge->isFavoritedBy(Auth::user()))" :first-count-favorites="@json($challenge->countFavorites())" :authorized="@json(Auth::check())" :challenge-id="@json($challenge->id)">
              </favorite>
              <p class="text-left small font-weight-lighter">
                〇件のコメント▼
              </p>
            </div>
            <!-- ! Vue:slack風にしたい -->

            <div class="d-flex justify-content-around mt-4 mb-4">
              @if(Auth::id() == $challenge->user_id)
                <!-- 編集ボタン -->
                <div>
                  <button onclick="location.href='{{ route('challenges.edit', ['challenge_id' => $challenge->id]) }}'" class="btn btn-lg btn-success" style="width: 100px">編集</button>
                </div>
                <!-- 削除ボタン -->
                <div>
                  <form action="{{ route('challenges.delete', ['challenge_id' => $challenge->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-lg btn-danger" style="width: 100px">削除</button>
                  </form>
                </div>
              @endif
            </div>
        </div>
      </div>
    </div>

    <!-- 参考レシピ -->
    <!-- ! データ -->
    <div class="col-md-3 h-75 mb-4 secondborder">
      <!-- 中身 -->
      <div class="row justify-content-center">
        <div class="col-md-10 h-75 mt-4">
          <h4 class="text-center">参考レシピ</h4>
          <a href="{{ route('recipes.show', ['id' => $recipe->id])}}">
            <img class="card-img-top mt-3" src="/storage/recipes_img/{{ $recipe->img }}" alt="NO IMAGE" style="width: 100%; height: 60%;">
          </a>
          <a href="{{ route('recipes.show', ['id' => $recipe->id])}}">
            <p class="text-center mt-4">{{ $recipe->name }}</p>
          </a>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection