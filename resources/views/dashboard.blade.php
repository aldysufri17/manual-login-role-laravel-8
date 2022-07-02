@extends('template')
@section('content')
<div class="mt-5">
    <h1>Hello {{auth()->user()->name}}</h1>
</div>
@endsection
