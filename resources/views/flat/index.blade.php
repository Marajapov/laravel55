@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.flatDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Flats</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Flats...">
                      </div>
                </div>
                <br>
                <table id="tableFlat" class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Street</th>
                        <th>Main image</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      @foreach($flats as $flat)
                      <tr>
                        <td>{{ $flat->getName() }}</td>
                        <td>{{ $flat->getPhone() }}</td>
                        <td>{{ $flat->getStreet() }}</td>
                        <td><img src='{{asset("flats/main_img_tiny/")}}/{{$flat->main_img}}' width="100" class="img-responsive"></td>
                        <td>{{ $flat->created_at->toDayDateTimeString() }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('flat.show', $flat)}}">Show</a>
                            <a class="btn btn-warning" href="{{ route('flat.edit', $flat)}}">Edit</a>
                            <a class="btn btn-info" href="{{ route('galleryIndex', $flat)}}">Galleries</a>
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')?deleteFlat({{ $flat->getId()}}):'';">Delete</button>
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
    @component('components.flatModal',[
      'cities'=>$cities,
      'regions'=>$regions,
      'inventories'=>$inventories
      ])
    @endcomponent

@endsection

@section('script')
<script>
function deleteFlat(id){
    var dataString = 'id=' + id;
    var url = "{{ route('flat.deleteFlat') }}";
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
            $("#tableFlat").load(" #tableFlat");
        }
    });
}

$('#cities').on('change', function(e){
//  var dataString = 'id=' + id;
    var city_id = e.target.value;
    var dataString = 'id=' +city_id;
    var url = "{{ route('flat.ajax-regions') }}";
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
           $('#regions').empty();
            $.each(data, function(index, regionObj){
              $('#regions').append('<option value="' + regionObj.id + '">' + regionObj.region_title + '</option>');
            });

        }
    });




  //console.log(e);
  //var city_id = e.target.value;

  //ajax
  //$.get('/flat/ajax-regions?city_id='+ city_id, function(data){
    //success data
    //console.log(data);

    //$('#regions').empty();
    //$.each(data, function(index, regionObj){
      //$('#regions').append('<option value="' + regionObj.id + '">' + regionObj.region_title + '</option>');
    //});
  //});

});
</script>

@endsection
