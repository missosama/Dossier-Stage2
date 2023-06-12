<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Job</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('postJobs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" placeholder="Enter job name" id="name" name="name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" id="description" name="description"
                                placeholder="Enter job description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="number" class="form-control" id="salary" name="salary" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
