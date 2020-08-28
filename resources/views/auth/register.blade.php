@extends('layouts.user')

@section('content')
<div class="mx-auto my-4 p-5 bg-white text-center w-75" style="border-radius: 50px; font-size: 1.0rem;">
  <h3>ユーザー登録する</h3>
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
      <div class="text-left">
        <label for="name">ユーザーネーム</label>
        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>

        @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="form-group">
      <div class="text-left">
        <label for="email">メールアドレス</label>
        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emailHelp"/>

        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="form-group">
      <div class="text-left">
        <label for="password">パスワード</label>
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

        @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="form-group">
      <div class="text-left">
        <label for="password-confirm">パスワードの確認</label>
        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
      </div>
    </div>

    <div class="mt-5">
      <button type="submit" class="d-block py-3 w-50">登録する</button>
    </div>

  </form>
</div>
@endsection