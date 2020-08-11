@extends('layouts.login_register')

@section('content')
<div class="wrapper">
  <div class="container">
    <div class="row mb-3 text-center">
      <div class="offset-md-3 col-sm-6">
        <h3>ユーザー登録する</h3>
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group">
            <div class="text-left">
              <label for="name">ユーザーネーム</label>
              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="サイトで表示したいお名前をご入力ください。"/>

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
              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emailHelp" placeholder="メールアドレスをご入力ください。"/>

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
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="8文字以上の半角英数字でご入力ください。"/>

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
              <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="確認のためパスワードを再度ご入力ください。"/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 offset-md-4">
                <button type="submit">登録する</button>
            </div>
          </div>

        </form>
    </div>
  </div>
</div>
@endsection