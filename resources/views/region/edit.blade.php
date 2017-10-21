@extends('layouts.app')
@section('content')
    @component('components.regionDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">edit - {{ $region->city->getName() }}</h3>
              </div>
              <div class="panel-body">
                <form action="{{ route('region.updateRegion', $region) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label>Region's city</label>
                    <select name="city_id" class="form-control">
                      @foreach($cities as $city)
                      <option @if($city['id'] == $region->city_id) selected @endif value="{{ $city['id'] }}">{{$city['name']}}</option>                     
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Region title</label>
                    <input type="text" name="region_title" class="form-control" value="{{ $region->getRegionTitle()}}">
                  </div>
                  <div class="form-group">
                    <label>Publish</label>
                    <input type="checkbox" name="status" @if($region->getStatus()=='on') checked @endif>
                  </div>
                  <input type="submit" class="btn btn-default" value="Update">
                  </div>
                </form>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

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
