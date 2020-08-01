@extends('layouts.app')

@section('content')
  <div class="main">
    <div class="search_area">
      <div class="row align-items-center">
        <input type="text" class="search_form form-control col-sm-3 offset-4 rounded-5 mt-1">
        <span class="ml-3">
          <button type="button" class="search_button mt-1 py-2">検索</button>
        </span>
      </div>
    </div>

	@if (session()->has("status"))
		<div class="col-sm-12 mt-3">
			<div class="alert alert-info" role="alert">
				{{ session('status') }}
			</div>
		</div>
	@endif

    <div class="container">
      <div class="row mt-4">
        <div class="col-sm-8">
          <div class="repsipe_details text-center">
            <h2>{{ $recipe->name }}</h2>
            <img class="resipe_detail_image" src="/storage/recipes_img/{{ $recipe->img }}">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="everyone_resipe text-center">
            <p>みんなの作ってみた</p>
            <img class="other_image" src="img/3416847_s.jpg" alt="アスパラのベーコン巻き">
            <p>投稿者名</p>
            <img class="other_image" src="img/3416847_s.jpg" alt="アスパラのベーコン巻き">
            <p>投稿者名</p>
            <img class="other_image" src="img/3416847_s.jpg" alt="アスパラのベーコン巻き">
            <p>投稿者名</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <form method="get" action="{{ route('challenges.create') }}">
          <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
            <button type="submit" class="btn btn-lg btn-info" style="width: 100%; color: white;">自分の「作ってみた」を投稿する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
