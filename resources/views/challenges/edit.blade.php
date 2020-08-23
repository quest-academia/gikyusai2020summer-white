@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center" >
      <div class="edit card col-md-10 m-4 rounded">
        <div class="card-body col-md-10 mx-auto my-3">

          <h2 class="mb-5 text-center" style="font-weight: bold;">作ってみた投稿の修正画面</h2>

          <form method="post" action="{{route('challenges.update',['challenge_id'=>$challenge->id])}}" enctype="multipart/form-data">
            @csrf
            <div id="form-group my-5">
              <label for="comment" style="font-weight: bold;">■ コメント <span class="badge badge-danger">必須</span></label>
              <textarea id="comment" name="impression" class="form-control" cols="10" rows="10">{{ $challenge->impression }}</textarea>
            </div>

            <div class="form-group my-5">
              <div>
                <p class="text-left" style="font-weight: bold;">■ 現在の画像</p>
                <img class="mb-3 img-fluid" src="/storage/challenges_img/{{ $challenge->img }}" alt="NO IMAGE" style="width: 20%;">
              </div>
              <label for="file1" style="font-weight: bold;">必要であれば画像を変更してください</label>
              <input type="file" id="file" class="form-control-file" name="challenge_img">
            </div>

            <div class="text-center my-5">
              <button type="submit" class="btn btn-lg create_button" style="width: 300px;">修正内容の送信</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

