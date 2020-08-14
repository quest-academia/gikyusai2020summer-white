@extends('layouts.user')

@section('content')
現在のお名前：{{ Auth::user()->name }}

<form method="POST" action="{{ route('rename.post') }}">
  @csrf

  <div class="form-group">
    <div class="text-left">
      <label for="name">新しいお名前をご入力ください。</label>
      <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="サイトで表示したいお名前をご入力ください。"/>

      @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6 offset-md-4">
        <button type="submit">登録する</button>
    </div>
  </div>

</form>

<button onclick="location.href='{{ route('mypage') }}'">マイページに戻る</button>
@endsection