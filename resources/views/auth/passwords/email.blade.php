@extends('layouts.user')

@section('content')
<div class="wrapper">
  <div class="container">
    <div class="row mb-3 text-center">
      <div class="offset-md-3 col-sm-6">
            <h3>パスワードをリセットする</h3>

                <div class="form-group">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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
        
                                <button type="submit">パスワードをリセットする</button>
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
