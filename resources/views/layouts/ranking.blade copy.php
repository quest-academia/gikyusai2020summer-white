<!-- アワード -->
<!-- ! データ -->
<nav class="navbar navbar-expand navbar-light bg-white">
  <ul class="navbar-nav justify-content-around w-100">
    <li class="nav-item">
      <h5 class="font-weight-bold mt-2 text-nowrap">いいねランキング</h5>
    </li>
    <li class="nav-item">
      <img src="{{ asset('img/king1.png') }}" width="10%" alt="">
      1位：
      @if(count($rankings) == null)
        −-
      @else
        <a href="{{ route('challenges.show', ['id' => $rankings[0]->id]) }}">{{ $rankings[0]->user->name }}さんの{{ $rankings[0]->recipe->name }}</a>
      @endif
    </li>
    <li class="nav-item d-none d-sm-block">
      <img src="{{ asset('img/king2.png') }}" width="10%" alt="">
      2位：
      @if(count($rankings) < 2)
        --
      @else
        <a href="{{ route('challenges.show', ['id' => $rankings[1]->id]) }}">{{ $rankings[1]->user->name }}さんの{{ $rankings[1]->recipe->name }}</a>
      @endif
    </li>
    <li class="nav-item d-none d-sm-block">
      <img src="{{ asset('img/king3.png') }}" width="10%" alt="">
      3位：
      @if(count($rankings) < 3)
        --
      @else
        <a href="{{ route('challenges.show', ['id' => $rankings[2]->id]) }}">{{ $rankings[2]->user->name }}さんの{{ $rankings[2]->recipe->name }}</a>
      @endif
    </li>
  </ul>
</nav>