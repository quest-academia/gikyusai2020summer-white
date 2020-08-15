<div class="header">
  <!-- ここからロゴ部分 -->
  <div class="logo">
    <div class="site-logo">
      <h1>
        <a href="{{ url('/') }}"><img class="width-height" src="{{ asset('img/oTosHi.png') }}" width="150" height="50" alt="otoshiロゴ"></a>
      </h1>
    </div>
  </div>
  <!-- ここまでロゴ部分 -->
  <!-- ここから右のナビゲーション -->
  <div class="navigation">
    <nav class="menu-navigation">
      <ul>
      <!-- ここからログイン／ログアウト、各ページへのリンク、会員登録ボタン -->
        @guest
          <li><a href="{{ route('login') }}">ログイン</a></li>
          @if(Route::has('register'))
            <li><a href="{{ route('register') }}">会員登録</a></li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/') }}">{{ __('トップページ') }}</a>
              <a class="dropdown-item" href="{{ route('mypage') }}">{{ __('マイページ') }}</a>
              <a class="dropdown-item" href="#">{{ __('レシピ一覧') }}</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  {{ __('ログアウト') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      <!-- ここまでログイン／ログアウト、各ページへのリンク、会員登録ボタン -->
      </ul>
    </nav>
  </div>
  <!-- ここまで右のナビゲーション -->
</div>