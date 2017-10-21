<!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('city.store') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add City</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <label>City Name</label>
                <input type="text" name="name" class="form-control" placeholder="Page Title" required>
                </div>
                <div class="form-group">
                <label>Name in Latin</label>
                <input type="text" name="name_translit" class="form-control" placeholder="Name in Latin">
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