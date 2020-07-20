@extends('layouts.app')

@section('content')
<div id="app" class="container pt-4">
	<favorite v-bind:challenge-id="@json(Auth::user()->id)"></favorite>
</div>
@endsection
