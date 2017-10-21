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
                <h3 class="panel-title">Gallery</h3>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      @foreach($galleries as $gallery)
                      <tr>
                        <td>{{ $gallery->getName() }}</td>
                        <td>{{ $gallery->getDescription() }}</td>
                        <td>{{ $gallery->created_at->toDayDateTimeString() }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('gallery.show', $gallery)}}">Show</a>
                            <a class="btn btn-warning" href="{{ route('gallery.edit', $gallery)}}">edit</a>
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')?deleteItem({{ $gallery->getId()}}):'';">Delete</button>
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
    @component('components.galleryModal')
    @endcomponent

@endsection

@section('script')
<script>
  function deleteItem(id)
  {
      var dataString = 'id=' + id;
      var url = "{{ route('gallery.delete') }}";
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
