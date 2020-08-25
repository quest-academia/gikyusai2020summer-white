@extends('layouts.app')

@section('content')
<div class="container">
  <!-- ここからレシピ詳細とみんなの作ってみた -->
  <div class="row mt-4">

  <!-- ここからレシピ詳細 -->
    <div class="col-sm-8">
      <div class="recipe_details mb-5 p-5">
        <!-- レシピ名 -->
        <p class="recipe_title">{{ $recipe->name }}</p>

        <!-- レシピ画像 -->
        <div class="text-center">
          <img class="recipe_detail_image mb-5" src="/storage/recipes_img/{{ $recipe->img }}">
        </div>

        <!-- レシピの分類など -->
        <div class="text-center mb-5 d-flex justify-content-around align-items-center">
          <!-- 所要時間 -->
          <div>
            @if($recipe->time == 1)
              <img class="cooking_time_icon img-fluid" src="/img/time001.png" alt="調理時間">
            @elseif( $recipe->time == 2)
              <img class="cooking_time_icon img-fluid" src="/img/time002.png" alt="調理時間">
            @elseif( $recipe->time == 3)
              <img class="cooking_time_icon img-fluid" src="/img/time003.png" alt="調理時間">
            @elseif( $recipe->time == 4)
              <img class="cooking_time_icon img-fluid" src="/img/time004.png" alt="調理時間">
            @endif
          </div>

          <div>
            <!-- 合うお酒 -->
            @if($recipe->liqueur == 1)
              <img class="cooking_time_icon img-fluid" src="/img/asset64.png" alt="合うお酒">
            @elseif( $recipe->liqueur == 2)
              <img class="cooking_time_icon img-fluid" src="/img/asset65.png" alt="合うお酒">
            @elseif( $recipe->liqueur == 3)
              <img class="cooking_time_icon img-fluid" src="/img/asset66.png" alt="合うお酒">
            @elseif( $recipe->liqueur == 4)
              <img class="cooking_time_icon img-fluid" src="/img/asset67.png" alt="合うお酒">
            @elseif( $recipe->liqueur == 5)
              <p style="font-size: 18px; font-weight: bold; padding-top: 10px">その他</p>
            @endif
          </div>

          <div>
            <!-- 投稿ボタン -->
            <button type="button" class="create_button" onclick="location.href='{{ route('challenges.create', ['recipe_id' => $recipe->id]) }}'">作ってみた投稿</button>
          </div>
        </div>

        <!-- 材料 -->
        <div class="ingredients">
          <p class="content_bar mb-4">材料</p>
          <div>
          <table class="material_content table table-borderless">
            @foreach($recipe->ingredients as $ingredient)
              <tr>
                <th>{{ $ingredient->name }}</th>
                <th class="text-right">{{ $ingredient->quantity }}</th>
              </tr>
              @endforeach
            </table>
          </div>
        </div>

        <!-- 作り方 -->
        <div>
          <p class="content_bar mb-4">つくり方</p>

          <div class="process_content align-items-center mt-4 pb-2">
            <table class="table table-borderless">
              <?php $i=1; ?>
              @foreach($recipe->processes as $process)
                <tr>
                  <td class="text-center" style="width: 15%;">
                    <img src="/img/<?=$i ?>.png" alt="<?=$i ?>" class="process_img img-fluid">
                  </td>
                  <td class="text-left" style="width: 60%;">
                    {{ $process->procedure }}
                  </td>
                  <td class="text-center" style="width: 25%;">
                    <img class="process_detail_image"  src="/storage/processes_img/{{ $process->img }}">
                  </td>
                </tr>
                <?php $i++ ?>
              @endforeach
            </table>
			<a href="{{ route('recipes.edit', ['id' => $recipe->id]) }}">編集</a>
          </div>
        </div>
      </div>
    </div>
  <!-- ここまでレシピ詳細 -->

  <!-- ここから右側の「みんなの作ってみた」 -->
    <div class="col-sm-4">
      <div class="everyone_recipe text-center pt-5">
        <h4 class="mb-3">みんなの作ってみた</h4>
        @if(count($recipe->challenges)>0)
          @foreach($recipe->challenges as $challenge)
            <div>
              <a href="{{ route('challenges.show', ['id' => $challenge->id]) }}"><img class="other_image img-fluid" src="/storage/challenges_img/{{ $challenge->img }}" alt="アスパラのベーコン巻き"></a>
              <p><a href="{{ route('challenges.show', ['id' => $challenge->id]) }}">{{ $challenge->user->name }}</a></p>
            </div>
          @endforeach
        @else
        <div>
          <p>現在投稿されているものはありません。
          </p>
        </div>
        @endif
      </div>
    </div>
  </div>
  <!-- row終わり。ここまでレシピ詳細とみんなの作ってみた -->

  <div class="row">
    <div class="col-sm-12 mb-4 pt-2">
      <button onclick="location.href='{{ route('challenges.create', ['recipe_id' => $recipe->id]) }}'" class="btn btn-lg btn-info mx-auto d-block"style="width: 90%; color: #fff;">「作ってみた」の投稿はこちら</button>
    </div>
  </div>
</div>
@endsection
