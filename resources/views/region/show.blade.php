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
                <h3 class="panel-title">edit - <strong>{{ $region->getRegionTitle() }}</strong></h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label>Region's city</label>
                    <input type="text" class="form-control" disabled placeholder="{{ $region->getCity()}}" value="{{ $region->getCity()}}">
                  </div>
                  <div class="form-group">
                    <label>Region title</label>
                    <input type="text" class="form-control" disabled placeholder="{{ $region->getRegionTitle()}}" value="{{ $region->getRegionTitle()}}">
                  </div>
                  <div class="form-group">
                  <label>Status</label> :
                    @if($region->getStatus() == 'on')
                      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                      @else
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    @endif
                  </div>
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    @component('components.regionModal',['cities'=>$cities])
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
