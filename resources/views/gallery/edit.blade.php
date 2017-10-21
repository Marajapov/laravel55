@extends('layouts.app')
@section('content')
    @component('components.inventoryDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">edit - {{ $inventory->getName() }}</h3>
              </div>
              <div class="panel-body">
                <form action="{{ route('inventory.updateInventory', $inventory) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required value="{{ $inventory->getName()}}">
                  </div>
                  
                  <div class="form-group">
                    <label>Old Image</label>
                    <img class="img-responsive" src='{{asset("inventories/")}}/{{$inventory->img}}' alt="{{ $inventory->getName()}}">
                  </div>

                  <div class="form-group">
                    <label>New Image</label>
                    <input type="file" name="img" class="form-control">
                  </div>
                  <input type="submit" class="btn btn-default" value="Update">
                </form>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    @component('components.inventoryModal')
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
