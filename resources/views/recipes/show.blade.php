@extends('layouts.app')

@section('content')
    <div class="serch_area">
      <form class="row align-items-center">
        <input type="text" class="search_form form-control col-3 offset-4 rounded-5 mt-1">
        <span class="ml-3">
          <button type="button" class="search_button mt-1 py-2">検索</button>
        </span>
      </form>
    </div>
    @if (session()->has("status"))
      <div class="col-sm-12 mt-3">
        <div class="alert alert-info" role="alert">
          {{ session('status') }}
        </div>
      </div>
    @endif
    <div class="container">
      <div class="row mt-4">
        <div class="col-sm-8">
          <div class="repsipe_details mb-5">
              <p class="resipe_title  pt-4 mt-3 ">
              {{ $recipe->name }}</p>
              <div class="text-center">
                <img class="resipe_detail_image mb-5" 
              src="/storage/recipes_img/{{ $recipe->img }}">
              </div>
              <div class="text-center mb-5">
                @if($recipe->time == 1 )
                    <span>
                      <img class="cooking_time_icon" src="/img/time001.png" alt="調理時間">
                    </span>
                @elseif( $recipe->time == 2 )
                    <span>
                      <img class="cooking_time_icon" src="/img/time002.png" alt="調理時間">
                    </span>
                @elseif( $recipe->time == 3 )
                    <span>
                      <img class="cooking_time_icon" src="/img/time003.png" alt="調理時間">
                    </span>
                @elseif( $recipe->time == 4 )
                    <span>
                      <img class="cooking_time_icon" src="/img/time004.png" alt="調理時間">
                    </span>
                @endif
                @if($recipe->liqueur == 1 )
                    <span>
                      <img class="cooking_time_icon" src="/img/asset64.png" alt="合うお酒">
                    </span>
                @elseif( $recipe->liqueur == 2 )
                    <span>
                      <img class="cooking_time_icon" src="/img/asset65.png" alt="合うお酒">
                    </span>
                @elseif( $recipe->liqueur == 3 )
                    <span>
                      <img class="cooking_time_icon" src="/img/asset66.png" alt="合うお酒">
                    </span>
                @elseif( $recipe->liqueur == 4 )
                    <span>
                      <img class="cooking_time_icon" src="/img/asset67.png" alt="合うお酒">
                    </span>
                <!-- @elseif( $recipe->liqueur == 5 ) -->
                    <!-- <span> -->
                      <!-- <img class="cooking_time_icon" src="/img/アセット 67.png" alt="合うお酒"> -->
                    <!-- </span> -->
                @endif
                    <span>
                      <button type="button" class="create_button mt-1 py-2">投稿</button>
                    </span>
              </div>
              <div class="mb-5">
                  <p class="content_bar">材料</p>
                    <div>
                    <!-- mt-4 pb-sm-2 d-flex justify-content-between -->
                        @foreach($ingredients as $ingredient)  
                        <table class="material_content mt-3 pb-1 ">
                          <tr>
                            <th>{{ $ingredient->name }} </th>
                            <th>{{ $ingredient->quantity }}</th>
                            <br>
                          </tr>
                        </table>
                        @endforeach
                    </div>
                  </div>
                  <div class="mb-5">
                    <p class="content_bar">つくり方</p>
                    <div class="process_content align-items-center mt-4 pb-2 ">
                      <?php $i=1; ?>
                      @foreach($processes as $process) 
                      <table>
                        <tr>
                          <td class="process_img mr-4">
                            <td>{{ <?=$i ?> }}</td> 
                            <td>{{ $process->procedure }}</td>
                            <td>
                                <img class="process_detail_image"  src="/storage/processes_img/{{ $process->img }}">
                            </td>
                            <br>
                            <br>
                          </td>  
                        </tr>
                      </table>
                      <?php $i++ ?>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="everyone_resipe text-center pt-5">
                  <p>みんなの作ってみた</p>
                  <img class="other_image" src="img/3416847_s.jpg" alt="アスパラのベーコン巻き">
                  <p>投稿者名</p>
                  <img class="other_image" src="img/3416847_s.jpg" alt="アスパラのベーコン巻き">
                  <p>投稿者名</p>
                  <img class="other_image" src="img/3416847_s.jpg" alt="アスパラのベーコン巻き">
                  <p>投稿者名</p>
                </div>
              </div>
            </div>
          <!-- </div>
        </div> -->
      </div>    
      <div class="row">
        <div class="col-sm-12">
        <button onclick="location.href='{{ route('challenges.create', ['recipe_id' => $recipe->id]) }}'" class="btn btn-lg btn-info" style="width: 100%; color: #fff;">「作ってみた」の投稿はこちら</button>       
        </div>
      </div>
    </div>
  </div>
@endsection
