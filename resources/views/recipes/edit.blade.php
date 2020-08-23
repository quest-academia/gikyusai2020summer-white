@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>レシピの編集</h3>
    </div>
  </div>

  <div class="row">
    <form method="post" action="{{ route('recipes.update', ['id' => $recipe->id]) }}" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="name">料理名 <span class="badge badge-danger">必須</span></label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $recipe->name) }}" placeholder="例　チンジャーロース">
      </div>

      <div class="d-flex form-group">
        <label for="time">調理時間 <span class="badge badge-danger">必須</span></label><br>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="time" id="time1" value="1" <?php echo $recipe->time == 1 ? "checked" : ""; ?>>
          <label class="form-check-label" for="time1">秒</label>
        </div>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="time" id="time2" value="2" <?php echo $recipe->time == 2 ? "checked" : ""; ?>>
          <label class="form-check-label" for="time2">3分</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="time" id="time3" value="3" <?php echo $recipe->time == 3 ? "checked" : ""; ?>>
          <label class="form-check-label" for="time3">5分</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="time" id="time4" value="4"  <?php echo $recipe->time == 4 ? "checked" : "";; ?>>
          <label class="form-check-label" for="time4">10分</label>
        </div>
      </div>

      <div class="d-flex form-group">
        <label for="liqueur">合うお酒 <span class="badge badge-danger">必須</span></label><br>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="liqueur" id="liqueur1" value="1" <?php echo $recipe->liqueur == 1 ? "checked" : ""; ?>>
          <label class="form-check-label" for="liqueur1">ビール</label>
        </div>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="liqueur" id="liqueur2" value="2" <?php echo $recipe->liqueur == 2 ? "checked" : ""; ?>>
          <label class="form-check-label" for="liqueur2">焼酎</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="liqueur" id="liqueur3" value="3" <?php echo $recipe->liqueur == 3 ? "checked" : ""; ?>>
          <label class="form-check-label" for="liqueur3">ワイン</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="liqueur" id="liqueur4" value="4" <?php echo $recipe->liqueur == 4 ? "checked" : ""; ?>>
          <label class="form-check-label" for="liqueur4">カクテル</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="liqueur" id="liqueur5" value="5" <?php echo $recipe->liqueur == 5 ? "checked" : ""; ?>>
          <label class="form-check-label" for="liqueur5">その他</label>
        </div>
      </div>

      <div class="form-group">
        <label for="invention">新発見おつまみ名</label>
        <input type="text" class="form-control" name="invention" value="{{ old('invention', $recipe->invention) }}" placeholder="例　△△と◯◯で××に!?">
      </div>

      <div class="form-group">
        <label>材料と分量 <span class="badge badge-danger">必須</span></label>
      </div>

	  @foreach($ingredients as $key => $ingredient)
      <div class="form-group container">
        <div class="row">
		  @php
		    $num = $key + 1;
		  @endphp
          <div class="col-sm-1">{{ $num }}</div>
          <div class="col-sm-9">
            <input type="text" id="count" name="ingredients[]" value="{{ old('ingredients.$key', $ingredient->name) }}" placeholder="例　ピーマン" style="width: 100%;">
          </div>
          <div class="col-sm-2">
            <input type="text" name="quantities[]" value="{{ old('quantities.$key', $ingredient->quantity) }}" placeholder="例　3個">
          </div>
        </div>
      </div>
	  @endforeach

	  @if($num < 10)
		@for($num += 1; $num <= 10; $num++)
		  <div class="form-group container">
			<div class="row">
			  <div class="col-sm-1">{{ $num }}</div>
			  <div class="col-sm-9">
			    @php
				  $i = $num - 1;
			    @endphp
				<input type="text" id="count" name="ingredients[]" value="{{ old('ingredients.$i') }}" placeholder="例　ピーマン" style="width: 100%;">
			  </div>
			  <div class="col-sm-2">
				<input type="text" name="quantities[]" placeholder="例　3個">
			  </div>
			</div>
		  </div>
		@endfor
	  @endif

      <div class="form-group">
        <label for="textarea1">書ききれない場合はこちらに記入してください</label>
        <textarea id="textarea1" rows="5" cols="100"></textarea>
      </div>

      <div class="form-group">
        <label>料理の作り方 <span class="badge badge-danger">必須</span></label>
      </div>

	  @foreach($processes as $key => $process)
      <div class="form-group container">
        <div class="row">
		  @php
		    $num = $key + 1;
		  @endphp
          <div class="col-sm-1">{{ $num }}</div>
          <div class="col-sm-7">
            <input type="text" size="52" name="processes[]" value="{{ old('processes.$key', $process->procedure) }}">
          </div>
          <div class="col-sm-4">
            <input type="file" name="processes_img[]" size="16">
          </div>
        </div>
      </div>
	  @endforeach

	  @if($num < 10)
		@for($num += 1; $num <= 10; $num++)
		  <div class="form-group container">
			<div class="row">
			  <div class="col-sm-1">{{ $num }}</div>
			  <div class="col-sm-7">
			    @php
				  $i = $num - 1;
			    @endphp
				<input type="text" size="52" name="processes[]" value="{{ old('processes.$i') }}">
			  </div>
			  <div class="col-sm-4">
				<input type="file" name="processes_img[]" size="16">
			  </div>
			</div>
		  </div>
	    @endfor
	  @endif

      <div class="form-group">
        <label for="textarea2">書ききれない場合はこちらに記入してください</label>
        <textarea id="textarea2" rows="5" cols="100"></textarea>
      </div>

      <div class="form-group">
        <label for="recipes_img">料理の完成写真 <span class="badge badge-danger">必須</span></label>
        <input type="file" name="recipes_img" size="16" id="filename">
      </div>

      <div class="parent">
        <button type="submit">送信する</button>
      </div>

    </form>

    <form method="post" action="{{ route('recipes.delete', ['id' => $recipe->id]) }}">
      @csrf
      <div class="my-3 parent">
        <button type="submit" style="background-color:red;">削除する</button>
      </div>
    </form>

  </div>
</div>
@endsection
