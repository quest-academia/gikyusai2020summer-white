<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <!-- 「レシピ」一覧、表示、投稿、修正ページ用のスタイルシート -->
  <link href="{{ asset('css/recipes.css') }}" rel="stylesheet">
  <!-- 「作ってみた」表示、投稿、修正ページ用のスタイルシート -->
  <link href="{{ asset('css/challenges.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    @include('layouts.header')

    @include('layouts.search')

    @include('layouts.ranking')

    @if (session()->has("status"))
    <div class="col-sm-12">
      <div class="alert alert-info" role="alert">
        {{ session('status') }}
      </div>
    </div>
    @endif

    @include('layouts.errors')

    <main>
      @yield('content')
    </main>

    @include('layouts.footer')

  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>