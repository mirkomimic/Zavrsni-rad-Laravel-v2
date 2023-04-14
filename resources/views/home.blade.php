@extends('layouts.app')
@section('content')
@include('partials.header')
<div class="cont">
  <main class="min-vh-100">

    @if ($errors->any())
      <div class="alert alert-danger mt-5">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <section id="alert_section" class="position-relative p-3">
      @if(session()->has('msg'))
        <div class="alert alert-success col-md-3 m-auto position-absolute top-50 start-50 translate-middle" id="alert" role="alert">
          <strong>
              {{ session()->get('msg') }}
          </strong>
        </div>
      @endif      
    </section> 

    @include('partials.restaurants')
    @include('partials.orders')
  </main>
</div>
@include('partials.footer')
    
@endsection