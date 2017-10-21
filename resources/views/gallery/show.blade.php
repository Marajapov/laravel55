@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.inventoryDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">edit - <strong>{{ $inventory->name }}</strong></h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" disabled placeholder="{{ $inventory->name }}" value="{{ $inventory->name }}">
                  </div>
                 
                  <div class="form-group">
                    <label>Image</label>
                    <img class="img-responsive" alt="{{$inventory->getName()}}" src='{{asset("inventories/")}}/{{$inventory->img}}'>
                  </div>
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    @component('components.inventoryModal')
    @endcomponent

@endsection
