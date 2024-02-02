@extends('layouts.app')
@section('content')
    <h1 class="text-xl">Welcome, <span class="font-bold">{{ auth()->user()->name }}</span></h1>
@endsection