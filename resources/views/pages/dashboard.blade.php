@extends('layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Anda Login Sebagai {{ Auth::user()->role }}</h1>
<h4>Dashboard</h4>
@endsection