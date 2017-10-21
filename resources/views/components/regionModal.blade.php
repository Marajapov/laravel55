<!-- Modals -->
    <!-- Add Page -->
    <div class="modal fade" id="addRegion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('region.store') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Region</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <label>Region's city</label>
                <select name="city_id" class="form-control">
                    @foreach($cities as $city)
                    <option value="{{ $city['id'] }}">{{$city['name']}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Region title</label>
                    <input type="text" name="region_title" class="form-control" placeholder="Region title">
                </div>
                <div class="form-group">
                <label>Publish</label>
                    <input type="checkbox" name="status">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
<!-- end modals -->