@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    @include('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Dashboard </h1>
    </section>

    <section class="content container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
    </section>
  </div>
@endsection
