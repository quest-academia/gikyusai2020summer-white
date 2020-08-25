@extends('layouts.user')

@section('content')

  <div class="container">
    <div class="row">
      <h2>{{ Auth::user()->name }}さんのマイページ</h2>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="everyone_resipe">
          <p class="padding-top text-center">登録情報</p>
          <p>{{ Auth::user()->name }}さん</p>
          <p>
          ユーザーネームを変更する
          <!-- モーダル 呼び出しボタン -->
          <button type="button" data-toggle="modal" data-target="#renameModal">変更はこちら</button>
          </p>
          <p>他の方にイイねされている数</p>
          <p class="inline padding_left2">イイね<img src="{{ asset('img/favorite.png') }}" width="30" height="30"alt=""></p>
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

    <div class="repsipe_details col-sm-9">
  
      <h2>{{ Auth::user()->name }}さんが投稿・イイねしたリスト</h2>
    
      <div class="d-flex flex-wrap justify-content-center">
          @if(count($challenges)>0)
          @foreach ($challenges as $challenge)
        <div class="p-5 text-center">
            <div class="">
              <img class="img-fluid" src="/storage/challenges_img/{{ $challenge->img }}" alt="">
            </div>
            <div class="pt-3"><a href="{{route('challenges.show', ['id' => $challenge->id ])}}">{{ $challenge->recipe->name }}</a></div>
            <div class="d-flex">
              <button class=""><a href="{{ route('challenges.edit', ['challenge_id' => $challenge->id]) }}">修正</a></button>
              <form action="{{ route('challenges.delete', ['challenge_id' => $challenge->id]) }}" class="mt-2" method="POST">
              {{ csrf_field() }}
              <button type="submit">削除</button>
              </form>
            </div>
        </div>
          @endforeach
          @else
          <h4>現在、イイねしてるものはありません。</h4>
          @endif
      </div>
       
      <h2>{{ Auth::user()->name }}さんがイイねした一覧</h2>
      <div class="d-flex flex-wrap justify-content-center">
          @if(count($myFavors)>0)
          @foreach ($myFavors as $myFavor)
        <div class="p-5 text-center">
            <div class="">
              <img class="img-fluid" src="/storage/challenges_img/{{ $myFavor->img }}" alt="">
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