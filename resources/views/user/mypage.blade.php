@extends('layouts.user')

@section('content')

  <div class="container">
    <div class="row">
      <p class="h2 mx-auto p-3 p-sm-4">{{ Auth::user()->name }}さんのマイページ</p>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <div class="everyone_recipe">
          <p class="pt-2 text-center font-weight-bold text-uppercase">登録情報</p>
          <p class="h5 p-2">{{ Auth::user()->name }}さん</p>
          <p>
          ユーザーネームを変更する
          <!-- モーダル 呼び出しボタン -->
          <button type="button" data-toggle="modal" data-target="#renameModal">変更はこちら</button>
          </p>
          <p class="pt-3">他の方にイイねされている数</p>
          <p class="inline">イイね<img src="{{ asset('img/favorite.png') }}" width="30" height="30"alt=""></p>
          <p class="inline">合計：{{ $followers }}</p>
        </div>
      </div>

    <!-- モーダルウィンドウの内容 -->
    <div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="renameModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="renameModalLabel">ユーザーネームを変更する</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('rename.post') }}">
              @csrf

              <div class="form-group">
                <div class="text-left">
                  <p>現在のお名前：{{ Auth::user()->name }}</p>

                  <label for="name">新しいお名前をご入力ください。</label>
                  <input type="text" id="name" class="form-control" name="name" required autocomplete="name" autofocus placeholder="サイトで表示したいお名前をご入力ください。"/>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 offset-md-3 d-flex">
                  <button type="button" class="btn-danger" data-dismiss="modal">閉じる</button>
                  <button type="submit" class="btn-primary">登録する</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="recipe_details col-sm-9 m-3 m-sm-0 mb-sm-4">
      <p class="h2 p-3 text-center">{{ Auth::user()->name }}さんが投稿したリスト</p>
      <div class="d-flex flex-wrap justify-content-center">
          @if(count($challenges)>0)
            @foreach ($challenges as $challenge)
              <div class="mb-3 p-2 text-center">
                <div>
                  <a href="{{route('challenges.show', ['id' => $challenge->id ])}}">
                    <img class="img-fluid" src="/storage/challenges_img/{{ $challenge->img }}" alt="">
                  </a>
                </div>
                <div class="pt-3">
                  <a href="{{route('challenges.show', ['id' => $challenge->id ])}}" style="text-decoration: none;">{{ $challenge->recipe->name }}</a>
                </div>

                <div class="d-flex aline-items-center mt-3">
                  <!-- 編集ボタン -->
                  <div class="mx-auto">
                    <button onclick="location.href='{{ route('challenges.edit', ['challenge_id' => $challenge->id]) }}'" class="btn btn-lg btn-success" style="width: 100px">修正</button>
                  </div>
                  <!-- 削除ボタン -->
                  <div class="mx-auto">
                    <form action="{{ route('challenges.delete', ['challenge_id' => $challenge->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-lg btn-danger" style="width: 100px">削除</button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <h4>現在、イイねしてるものはありません。</h4>
          @endif
      </div>

      <p class="h2 p-3">{{ Auth::user()->name }}さんがイイねしたリスト</p>
      <div class="d-flex flex-wrap justify-content-center">
          @if(count($myFavors)>0)
          @foreach ($myFavors as $myFavor)
        <div class="p-5 text-center">
            <div class="">
              <a href="{{route('challenges.show', ['id' => $myFavor->id ])}}"><img class="img-fluid" src="/storage/challenges_img/{{ $myFavor->img }}" alt=""></a>
            </div>
            <div class="pt-3"><a href="{{route('challenges.show', ['id' => $myFavor->id ])}}">{{ $myFavor->user->name }}さんの{{ $myFavor->recipe->name }}</a></div>
        </div>
          @endforeach
          @else
          <h4>現在、イイねしてるものはありません。</h4>
          @endif
      </div>
    </div>
  </div>
@endsection