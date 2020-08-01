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