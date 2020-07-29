@extends('layouts.challenges')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center" >
      <div class="edit card col-md-10 rounded">
        <div class="card-body col-md-10 my-3">
          <h3 class="mb-5">作ってみた投稿<span class="editbutton ml-4">修正</span></h3>

          <form action="">
            <div id="form-group my-5">
              <label for="comment">コメント</label>
              <button class="needbtn ml-4">必須</button>
              <textarea id="comment" class="form-control" cols="10" rows="10">{{ $challenge->impression }}</textarea>
            </div>

            <div class="form-group my-5">
              <label for="file1">この料理の完成写真</label>
              <button class="needbtn ml-4">必須</button>
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