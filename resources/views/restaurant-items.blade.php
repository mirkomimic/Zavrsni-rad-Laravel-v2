@extends('layouts.app')
@section('content')
  @include('partials.header')
  <div class="cont">
    <main class="min-vh-100">  
      @include('partials.shop-items')
    </main>
  </div>
  @include('partials.footer')
@endsection