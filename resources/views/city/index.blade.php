@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.headerDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Cities</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Cities...">
                      </div>
                </div>
                <br>
                <table id="tableCity" class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Name Translit</th>
                        <th>Created</th>
                        <th>Action</th>
                      </tr>
                      @foreach($cities as $city)
                      <tr>
                        <td>{{ $city->getName() }}</td>
                        <td>{{ $city->getNameTranslit() }}</td>
                        <td>{{ $city->created_at->toDayDateTimeString() }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('city.show', $city)}}">Show</a> 
                            <a class="btn btn-warning" href="{{ route('city.edit', $city)}}">edit</a>
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')?deleteCity({{ $city->getId()}}):'';">Delete</button>
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
    @component('components.cityModal')
    @endcomponent

@endsection

@section('script')
<script>
function deleteCity(id){
    var dataString = 'id=' + id;
    var url = "{{ route('city.deleteCity') }}";
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
            $("#tableCity").load(" #tableCity");
        }
    });
}
</script>

@endsection
