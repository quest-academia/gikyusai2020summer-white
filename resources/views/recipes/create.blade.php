@extends('layouts.app')

@section('content')
  <div class="main">
    <div class="ml-2">
      <div class="ranking row pt-3">
        <p class="ranking-title d-inline col-3">いいね獲得ランキング</p>
        <div class="col-3">
          <img src="img/king1.png" width="40px" alt="ランク1">
          <p class="d-inline">○○△△</p>
        </div>
        <div class="col-3">
          <img src="img/king2.png" width="40px" alt="ランク1">
          <p class="d-inline">○○△△</p>
        </div>
        <div class="col-3">
          <img src="img/king3.png" width="40px" alt="ランク1">
          <p class="d-inline">○○△△</p>
        </div>
      </div>
    </div>
    <hr>

	@if (session()->has("status"))
		<div class="col-sm-12">
			<div class="alert alert-info" role="alert">
				{{ session('status') }}
			</div>
		</div>
	@endif

	@if ($errors->count())
        <div class="col-sm-12">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-header"><i class="fa fa-ban"></i> エラー</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
					@endforeach
                </ul>
            </div>
        </div>
	@endif

	<form method="post" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="container">
		  <div class="row">
			<div class="col-md-11 offset-md-1">
			  <h4>レシピの投稿</h4>
			</div>

			<div class="col-md-4 offset-md-1">
			  <label for="name">料理名 <span class="badge badge-danger">必須</span></label>
			</div>
			<div class="col-md-7">
			</div>
			<div class="col-md-4 offset-md-1">
			  <input type="text" name="name" value="{{ old('name') }}" placeholder="例　チンジャーロース">
			  <label for="name"><span class=>　　</span></label>
			</div>

			<div class="col-md-7">
			</div>

			<div class="col-md-11 offset-md-1">
			  <div class="form-group">
				<label for="time">調理時間 <span class="badge badge-danger">必須</span></label>
				<div>
				  <label class="radio">
					<input type="radio" name="time" value="1" checked>秒　
				  </label>
				  <label class="radio">
					<input type="radio" name="time" value="2">3分　
				  </label>
				  <label class="radio">
					<input type="radio" name="time" value="3">5分　
				  </label>
				  <label class="radio">
					<input type="radio" name="time" value="4">10分　
				  </label>
				</div>
			  </div>
			</div>

			<div class="col-md-11 offset-md-1">
			  <div class="form-group">
				<label for="liqueur">合うお酒 <span class="badge badge-danger">必須</span></label>
				<div>
				  <label class="radio">
					<input type="radio" name="liqueur" value="1" checked>ビール
				  </label>
				  <label class="radio">
					<input type="radio" name="liqueur" value="2">焼酎
				  </label>
				  <label class="radio">
					<input type="radio" name="liqueur" value="3">ワイン
				  </label>
				  <label class="radio">
					<input type="radio" name="liqueur" value="4">カクテル
				  </label>
				  <label class="radio"></label>
					<input type="radio" name="liqueur" value="5">その他
				  </label>
				</div>
			  </div>
			</div>

			<div class="col-md-4 offset-md-1">
			  <label for="invention">新発見おつまみ名</label>
			</div>
			<div class="col-md-7">
			</div>
			<div class="col-md-4 offset-md-1">
			  <input type="text" name="invention" value="{{ old('invention') }}" placeholder="△△と◯◯で××に!?">
			  <label for="invention"><span class=>　　</span></label>
			</div>


			<div class="col-md-11 offset-md-1">
			  <label for="name">材料と分類 <span class="badge badge-danger">必須</span></label>
			</div>

			<div class="col-md-3 offset-md-1">
			  <label for="count">1.　</label>
			  <input type="text" placeholder="例　ピーマン">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="例　3個">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">2.　</label>
			  <input type="text" placeholder="">
			</div>

			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">3.　</label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">4.　</label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">5.　</label>
			  <input type="text" placeholder="">　
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">6.　</label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">7.　</label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">8.　</label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">9.　</label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-3 offset-md-1">
			  <label for="count">10.　 </label>
			  <input type="text" placeholder="">
			</div>
			<div class="col-md-8">
			  <input type="text" placeholder="">
			</div>

			<div class="col-md-11 offset-md-1">
			  <label for="textarea1">書ききれない場合はこちらに記入してください</label>
			</div>
			<div class="col-md-11 offset-md-1">
			  <textarea id="textarea1" rows="5" cols="55"></textarea>
			</div>

			<div class="col-md-6 offset-md-1">
			  <label for="name">料理の作り方 <span class="badge badge-danger">必須</span></label>
			</div>
			<div class="col-md-5">
			  <p>※写真は必須ではありません</p>
			</div>

			
			<div class="col-md-6 offset-md-1">
			  <label for="count">1.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">2.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">3.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">4.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">5.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">6.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">7.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">8.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">9.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>
			<div class="col-md-6 offset-md-1">
			  <label for="count">10.　</label>
			  <input type="text" size="52" name=" text1">
			</div>
			<div class="col-md-5">
			  <label for="filename">
				<span class="browse_btn">ファイルを選択</span><input type="file" size="16" id="filename">
			  </label>
			</div>

			<div class="col-md-11 offset-md-1">
			  <label for="textarea1">書ききれない場合はこちらに記入してください</label>
			</div>
			<div class="col-md-11 offset-md-1">
			  <textarea id="textarea1" rows="5" cols="55"></textarea>
			</div>

			<div class="col-md-11 offset-md-1">
			  <label for="name">料理の完成写真 <span class="badge badge-danger">必須</span></label>
			</div>

			<div class="col-md-11 offset-md-1">
			  <label for="recipes_img">
				<span class="browse_btn">ファイルを選択</span><input type="file" name="recipes_img" size="16" id="filename">
			  </label>
			</div>

			<div class="col-md-11 offset-md-1">
			  <label for="name">お名前 <span class="badge badge-danger">必須</span></label>
			</div>
			<div class="col-md-11 offset-md-1">
			  <input type="text" placeholder="例　山田　太郎">
			  <label for="name"><span class=""></span></label>
			</div>
		  </div>
		</div>
		<div class="parent">
		  <button type="submit">送信する</button>
		</div>
	</form>
  </div>
@endsection
