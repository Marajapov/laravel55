<!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="gallery_id" value="{{ $gallery_id }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                 <label>Images</label>
                 <input type="file" name="photos[]" class="form-control" multiple>
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
