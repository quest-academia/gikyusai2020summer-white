<!-- アワード -->
<!-- ! データ -->
<nav class="navbar navbar-expand navbar-light bg-white">
  <ul class="navbar-nav justify-content-around w-100">
    <li class="nav-item">
      <h5 class="font-weight-bold mt-2 text-nowrap">いいねランキング</h5>
    </li>
    <li class="nav-item">
      <img src="{{ asset('img/king1.png') }}" width="10%" alt="">
      <a href="{{ route('challenges.show', ['id' => $rankings[0]->id]) }}">1位：{{ $rankings[0]->user->name }}さんの{{ $rankings[0]->recipe->name }}</a>
    </li>
    <li class="nav-item d-none d-sm-block">
      <img src="{{ asset('img/king2.png') }}" width="10%" alt="">
      <a href="{{ route('challenges.show', ['id' => $rankings[1]->id]) }}">2位：{{ $rankings[1]->user->name }}さんの{{ $rankings[1]->recipe->name }}</a>
    </li>
    <li class="nav-item d-none d-sm-block">
      <img src="{{ asset('img/king3.png') }}" width="10%" alt="">
      <a href="{{ route('challenges.show', ['id' => $rankings[2]->id]) }}">3位：{{ $rankings[2]->user->name }}さんの{{ $rankings[2]->recipe->name }}</a>
    </li>
  </ul>
</nav>