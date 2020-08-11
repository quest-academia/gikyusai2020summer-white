@extends('layouts.user')

@section('content')
<div class="container background-color">
  <div class="row">
      <h2>MYページ</h2>
  </div>
</div>
        ​
<div class="container">
  <div class="row">

    <div class="col-sm-3">
      <div class="everyone_resipe">
        <p class="padding-top text-center">登録情報</p>
        <p>〇〇△△</p>
        <p><a href="＃">ユーザーネームを変更する</a></p>
        <p><a href="＃">パスワードを変更する</a></p>
        <p><a href="＃">メールアドレスを変更する</a></p>
        <p>いいねの合計</p>
        <p  class="inline">53</p>
        <p class="inline padding_left2">いいね<img src="{{ asset('img/favorite.png') }}" width="30" height="30"alt=""></p>
      </div>
    </div>

    <div class="repsipe_details col-sm-9">
      <ul>
        <li>〇〇△△が投稿したリスト</li>
      </ul>
      <div class="wrapper">
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
      </div>
      <div class="wrapper">
        <ul>
          <li><h3>作ってみた投稿</h3></li>
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
      </div>
      <div class="wrapper">
        <ul>
          <li><h3>いいね</h3></li>
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
      </div>
    </div>
  </div>
</div>
@endsection