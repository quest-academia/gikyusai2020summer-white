<!-- アワード -->
<!-- ! データ -->
<div class="rankings d-flex justify-content-around align-items-center p-2 bg-white">
  <div class="mr-3">
    <h5 class="font-weight-bold text-nowrap mb-0">いいねランキング</h5>
  </div>
  <div class="nav-item mr-sm-3">
    <img src="{{ asset('img/king1.png') }}" width="10%" alt="">
    1位：
    @if(count($rankings) == null)
      −-
    @else
      <a href="{{ route('challenges.show', ['id' => $rankings[0]->id]) }}">{{ $rankings[0]->user->name }}さんの{{ $rankings[0]->recipe->name }}</a>
    @endif
  </div>
  <div class="nav-item d-none d-sm-block mr-3">
    <img src="{{ asset('img/king2.png') }}" width="10%" alt="">
    2位：
    @if(count($rankings) < 2)
      --
    @else
      <a href="{{ route('challenges.show', ['id' => $rankings[1]->id]) }}">{{ $rankings[1]->user->name }}さんの{{ $rankings[1]->recipe->name }}</a>
    @endif
  </div>
  <div class="nav-item d-none d-sm-block mr-3">
    <img src="{{ asset('img/king3.png') }}" width="10%" alt="">
    3位：
    @if(count($rankings) < 3)
      --
    @else
      <a href="{{ route('challenges.show', ['id' => $rankings[2]->id]) }}">{{ $rankings[2]->user->name }}さんの{{ $rankings[2]->recipe->name }}</a>
    @endif
  </div>
</div>
