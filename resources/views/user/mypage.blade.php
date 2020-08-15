@extends('layouts.user')

@section('content')
<div class="container background-color">
  <div class="row">
    <h2>{{ Auth::user()->name }}さんのマイページ</h2>
  </div>
</div>

<div class="container">
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
        <p class="inline">合計：{{ $followersCounts }}</p>
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
      <ul>
        <li><h2>{{ Auth::user()->name }}さんが投稿・イイねしたリスト</h2></li>
      </ul>
      <!-- <div class="wrapper">
        <ul>
          <li><h3>投稿したレシピ</h3></li>
        </ul>
        <ul>
          <li class="inline">
            <img class="img-width" src="img/3416847_s.jpg" alt="" width="250" height="250">
          </li>
          <li class="inline">
            アスパラベーコン巻き〇〇△△
            <span class="padding_left2"><button type="submit">修正</button></span>
          </li>
        </ul>
        <ul>
          <a href="#" class="btn btn-outline-primary">投稿リスト一覧</a>
        </ul>
      </div> -->
      <div class="wrapper">
        <ul>
          <li><h3>自分の作ってみた投稿</h3></li>
        </ul>
        @if(count($challenges)>0)
          @foreach ($challenges as $challenge)
          <ul>
            <li class="inline">
              <img class="img-width" src="/storage/challenges_img/{{ $challenge->img }}" alt="" width="250" height="250">
            </li>
            <li class="inline">
              {{ $challenge->recipe->name }}
              <span class="padding_left2">
                <button onclick="location.href='{{ route('challenges.edit', ['id' => $challenge->id]) }}'">修正</button>
              </span>
            </li>
          </ul>
          @endforeach
          <!-- <ul>
            <a href="#" class="btn btn-outline-primary">投稿リスト一覧</a>
          </ul> -->
        @else
          <ul>現在、投稿された内容はありません。</ul>
        @endif
      </div>
      <div class="wrapper">
        <ul>
          <li><h3>自分がイイねした一覧</h3></li>
        </ul>
        @if(count($myFavors)>0)
          @foreach ($myFavors as $myFavor)
          <ul>
            <li class="inline">
              <img class="img-width" src="/storage/challenges_img/{{ $myFavor->img }}" alt="" width="250" height="250">
            </li>
            <li class="inline">
              <!-- アスパラベーコン巻き〇〇△△ -->
              {{ $myFavor->user->name }}さんの{{ $myFavor->recipe->name }}
              <!-- <span class="padding_left2"><button type="submit">修正</button></span> -->
            </li>
          </ul>
          @endforeach
          <!-- <ul>
            <a href="#" class="btn btn-outline-primary">投稿リスト一覧</a>
          </ul> -->
        @else
          <ul>現在、イイねしてるものはありません。</ul>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection