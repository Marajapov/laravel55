@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    @component('components.inventoryDashboard')
    @endcomponent

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Inventory</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Inventory...">
                      </div>
                </div>
                <br>
                <table id="tableInventory" class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      @foreach($inventories as $inventory)
                      <tr>
                        <td>{{ $inventory->name }}</td>
                        <td><img class="img-responsive" src='{{asset("inventories/")}}/{{$inventory->img}}' alt="{{$inventory->getName() }}"></td>
                        <td>{{ $inventory->created_at->toDayDateTimeString() }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('inventory.show', $inventory)}}">Show</a> 
                            <a class="btn btn-warning" href="{{ route('inventory.edit', $inventory)}}">edit</a>
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')?deleteInventory({{ $inventory->getId()}}):'';">Delete</button>
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
    @component('components.inventoryModal',['inventories'=>$inventories])
    @endcomponent

@endsection

@section('script')
<script>
  function deleteInventory(id)
  {
      var dataString = 'id=' + id;
      var url = "{{ route('inventory.deleteInventory') }}";
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
              $("#tableInventory").load(" #tableInventory");
          }
      });
  }
</script>

@endsection
