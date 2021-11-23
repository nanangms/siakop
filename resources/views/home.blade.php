@extends('layouts.app')

@section('title')
Home
@endsection
@section('header')

@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div id="container"></div>
          </div>

          <div class="col-md-6">
            <div id="container2"></div>
          </div>
        </div>
        <hr>
        
        
      </div>
    </div>
  </section>

</div>



@endsection
@section('footer')

@stop