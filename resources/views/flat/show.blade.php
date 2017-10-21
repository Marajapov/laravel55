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
                <h3 class="panel-title">edit - <strong>{{ $flat->getName() }}</strong></h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                <label>Name</label>
                <span class="form-control">{{ $flat->getName() }}</span>
                </div>
                <!-- phone numbers -->
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="+996 558 210 420">
                </div>
                <div class="form-group">
                    <label>Phone 2</label>
                    <input type="text" name="phone2" class="form-control" placeholder="+996 778 210 420">
                </div>
                <div class="form-group">
                    <label>Phone 3</label>
                    <input type="text" name="phone3" class="form-control" placeholder="+996 708 210 420">
                </div>
                <!-- prices -->
                <div class="form-group">
                    <label>Price 24 hours (sutki)</label>
                    <input type="text" name="price24" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Price 1 hour</label>
                    <input type="text" name="price_hour" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Price 12 hours (night)</label>
                    <input type="text" name="price_night" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Price per month</label>
                    <input type="text" name="price_month" class="form-control" >
                </div>

                <div class="form-group">
                <label>Street</label>
                 <input type="text" name="street" class="form-control" placeholder="Chui 128">
                </div>
                <div class="form-group">
                <label>Main image</label>
                 <input type="file" name="main_img" class="form-control">
                </div>
                <div class="form-group">
                <label>Description</label>
                    <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
                <!-- inventories-->
                <label for="inventories">Inventories</label>
                <div class="checkbox">
                    @foreach($inventories as $inv)
                    
                    <label>
                    <input type="checkbox" value="{{$inv->id}}"
                      @foreach($flatInventories as $fInv)
                        @if($fInv->inventory_id == $inv->id)
                        checked="checked"; break;
                        @endif
                      @endforeach
                     name="inventories[]">{{$inv->getName()}}</label>
                    @endforeach
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
