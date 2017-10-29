@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.photoDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Photos of "{{ $gallery->getName() }}"<a href="{{ url()->previous() }}" class="pull-right">Back</a></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter ...">
                      </div>
                </div>
                <br>
                <table id="table" class="table table-striped table-hover">
                      <tr>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                      @foreach($photos as $photo)
                      <tr>
                        <td>
                          <img src="{{ asset('photos/main_img_tiny')}}/{{ $photo->getImage() }}" width="100" alt="{{ $photo->getImage() }}" class="img-responsive">
                        </td>
                        <td>
                            <a class="btn btn-default" href="{{ route('photo.show', $photo)}}">Show</a>
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')?deleteItem({{ $photo->getId()}}):'';">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                </table>
              </div>
            </div>

        </div>
      </div>
    </section>

    <!-- Modals -->
    @component('components.photoModal',['gallery_id'=>$gallery->getId()])
    @endcomponent

@endsection

@section('script')
<script>
  function deleteItem(id)
  {
      var dataString = 'id=' + id;
      var url = "{{ route('photo.delete') }}";
      $.ajaxSetup({
          headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
      });
      $.ajax
      ({
          type: "POST",
          url: url,
          data: dataString,
          cache: false,
          success: function (data) {
              $("#table").load(" #table");
          }
      });
  }
</script>

@endsection
