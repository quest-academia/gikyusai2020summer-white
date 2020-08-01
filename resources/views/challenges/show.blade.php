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
          <img class="card-img-top" src="./img/3416847_s.jpg" alt="NO IMAGE" style="width: 100%; height: 60%;"  >
          <p class="text-center mt-4">〇〇〇</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection