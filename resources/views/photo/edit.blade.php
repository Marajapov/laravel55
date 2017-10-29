@extends('layouts.app')
@section('content')
    @component('components.galleryDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">edit - {{ $gallery->getName() }}</h3>
              </div>
              <div class="panel-body">
                <form action="{{ route('updateGallery', $gallery) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required value="{{ $gallery->getName()}}">
                  </div>
                  <div class="form-group">
                    <label>Description</label><br/>
                    <textarea name="description" rows="8" cols="80">{{ $gallery->getDescription() }}</textarea>
                  </div>
                  <input type="submit" class="btn btn-default" value="Update">
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </form>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    @component('components.galleryModal',['flat_id'=>$gallery->flat_id])
    @endcomponent

@endsection

@section('script')

@endsection
