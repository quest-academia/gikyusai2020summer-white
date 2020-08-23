@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center" >
      <div class="card col-md-10 m-4 rounded">
        <div class="card-body col-md-10 mx-auto my-3">

          <h2 class="mb-5 text-center" style="font-weight: bold;">作ってみた投稿</h2>

          <form method="post" action="{{route('challenges.store')}}" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name="recipe_id" value="{{$recipe->id}}">

            <div id="form-group my-5">
              <label for="comment" style="font-weight: bold;">■ コメント <span class="badge badge-danger">必須</span></label>
              <textarea id="comment" name="impression" class="form-control" cols="10" rows="10" placeholder="作ってみた感想などをお書きください。"></textarea>
            </div>

            <div class="form-group my-5">
              <label for="file" style="font-weight: bold;">■ この料理の完成写真 <span class="badge badge-danger">必須</span></label>
              <input type="file" id="file" name="challenge_img" class="form-control-file">
            </div>

            <div class="text-center my-5">
              <button type="submit" class="btn btn-lg create_button" style="width: 300px;">投稿内容の送信</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection