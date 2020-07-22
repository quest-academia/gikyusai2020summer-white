@extends('layouts.app')

@section('content')
<div id="app" class="container pt-4">
	<top v-bind:challenge-id="@json(Auth::user()->id)"></top>
</div>
@endsection
