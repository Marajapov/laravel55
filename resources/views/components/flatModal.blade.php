<!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addFlat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Flat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <label>City</label>
                {!! Form::select('city_id', $cities, null, ["class" => "form-control selectpicker", "id" => "cities", "title" => "-- Выберите --"]) !!}
                </div>

                <div class="form-group">
                <label>Region</label>
                {!! Form::select('region', $regions, null, ["class" => "form-control selectpicker", "id" => "regions", "title" => "-- Выберите --"]) !!}
                </div>

                <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Title" required>
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
                    @foreach($inventories as $inventory)
                    <label><input type="checkbox" value="{{$inventory->getId()}}" name="inventories[]">{{$inventory->getName()}}</label>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            </div>
        </div>
        </div>
<!-- end modals -->