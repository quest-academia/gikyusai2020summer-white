@extends('layouts.challenges')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center" >
      <div class="card col-md-10 rounded">
        <div class="card-body col-md-10 my-3">

          <h3 class="mb-5">作ってみた投稿</h3>

          <form method="post" action="#" enctype="multipart/form-data">
          @csrf
            <div id="form-group my-5">
              <label for="comment">コメント <span class="badge badge-danger">必須</span></label>
              <!-- <button class="needbtn ml-4">必須</button> -->
              <textarea id="comment" class="form-control" cols="10" rows="10" placeholder="作ってみた感想などをお書きください。"></textarea>
            </div>

            <div class="form-group my-5">
              <label for="file">この料理の完成写真 <span class="badge badge-danger">必須</span></label>
              <!-- <button class="needbtn ml-4">必須</button> -->
              <input type="file" id="file" class="form-control-file">
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