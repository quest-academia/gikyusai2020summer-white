@extends('layouts.user')
  
@section('content')
<div class="wrapper">
  <div class="container">
    <div class="row mb-3 text-center">
      <div class="offset-md-3 col-sm-6 transparent">
        <h3 class="blue">ログイン</h3>
        <form method="POST" action="{{ route('login') }}">
         @csrf

        <div class="form-group">
            <div class="text-left">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emailHelp" placeholder="ご登録のメールアドレスをご入力ください。"/>

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
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="パスワードをご入力ください。"/>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            　  @enderror
            </div>
        </div>
        <button type="submit">ログイン</button>

        <div  class="text-center"><a class="login" href="/register">新規ログイン</a></div>
        <div class="text-center"><a class="" href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a></div>
        </form>

　    </div>
    </div>
  </div>
</div>
@endsection
