@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.galleryDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">edit - <strong>{{ $gallery->getName() }}</strong></h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" disabled placeholder="{{ $gallery->getName() }}" value="{{ $gallery->getName() }}">
                  </div>

                  <div class="form-group">
                    <label>Description</label><br/>
                    <textarea name="description" rows="8" cols="80" disabled>{{ $gallery->getDescription() }}</textarea>
                  </div>
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    @component('components.galleryModal',['flat_id'=>$gallery->flat_id])
    @endcomponent

@endsection
