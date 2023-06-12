<div class="modal fade" id="edit{{ $job->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Job</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body text-left">
            <form class="form-horizontal" method="POST" action="{{ route('postJobs.update', $job->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $job->name }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $job->description }}" required>
                </div>
                <div class="form-group">
                    <label for="salary" class="col-sm-3 control-label">Salary</label>
                    <input type="number" class="form-control" id="salary" name="salary"
                        value="{{ $job->salary }}" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                <i class="fa fa-close"></i> Close
            </button>
            <button type="submit" class="btn btn-success btn-flat" name="edit">
                <i class="fa fa-check-square-o"></i> Update
            </button>
            </form>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="delete{{ $job->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="postjob_id">Delete Post Job</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('postJobs.destroy', $job->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_postjob_id">{{ $job->name }}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close
                </button>
                <button type="submit" class="btn btn-danger btn-flat">
                    <i class="fa fa-trash"></i> Delete
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.delete-modal').on('click', function () {
            var postJobId = $(this).data('postjob-id');
            $('.del_postjob_id').text(postJobId);
        });
    });
</script>
