@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.regionDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Regions</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Regions...">
                      </div>
                </div>
                <br>
                <table id="tableRegion" class="table table-striped table-hover">
                      <tr>
                        <th>Region's City</th>
                        <th>Region title</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                      </tr>
                      @foreach($regions as $region)
                      <tr>
                        <td>{{ $region->city->getName() }}</td>
                        <td>{{ $region->getRegionTitle() }}</td>
                        <td>
                          @if($region->getStatus() == 'on')
                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                          @else
                          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          @endif
                        </td>
                        <td>{{ $region->created_at->toDayDateTimeString() }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('region.show', $region)}}">Show</a> 
                            <a class="btn btn-warning" href="{{ route('region.edit', $region)}}">edit</a>
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')?deleteRegion({{ $region->getId()}}):'';">Delete</button>
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
    @component('components.regionModal',['cities'=>$cities])
    @endcomponent

@endsection

@section('script')
<script>
function deleteRegion(id){
    var dataString = 'id=' + id;
    var url = "{{ route('region.deleteRegion') }}";
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
            $("#tableRegion").load(" #tableRegion");
        }
    });
}
</script>

@endsection
