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
                <h3 class="panel-title">edit - <strong>{{ $city->name }}</strong></h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" disabled placeholder="{{ $city->getName()}}" value="{{ $city->getName()}}">
                  </div>
                  <div class="form-group">
                    <label>Name in Latin</label>
                    <input type="text" class="form-control" disabled placeholder="{{ $city->getNameTranslit()}}" value="{{ $city->getNameTranslit()}}">
                  </div>
                  <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
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
