@extends('layouts.challenges')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center" >
      <div class="edit card col-md-10 rounded">
        <div class="card-body col-md-10 my-3">
          <h3 class="mb-5">作ってみた投稿<span class="editbutton ml-4">修正</span></h3>

          <form method="post" action="{{route('challenges.update',['recipe_id'=>$recipe_id,'challenge_id'=>$challenge->id])}}" enctype="multipart/form-data">
            @csrf
            <div id="form-group my-5">
              <label for="comment">コメント <span class="badge badge-danger">必須</span></label>
              <!-- <button class="needbtn ml-4">必須</button> -->
              <textarea id="comment" name="impression" class="form-control" cols="10" rows="10">{{ $challenge->impression }}</textarea>
            </div>

            <div class="form-group my-5">
              <div>
                <p>現在の画像</p>
                <img class="mb-3 img-fluid" src="/storage/challenges_img/{{ $challenge->img }}" alt="NO IMAGE" style="width: 20%;">
              </div>
              <label for="file1">必要であれば画像を変更してください</label>
              <!-- <button class="needbtn ml-4">必須</button> -->
              <input type="file" id="file" class="form-control-file" name="challenge_img">
            </div>

            <div class="text-center my-5">
              <button type="submit">送信</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

