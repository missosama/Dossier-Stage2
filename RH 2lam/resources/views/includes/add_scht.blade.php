<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Schedule Training</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('schT.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="start_date">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="form-group">
                            <label for="time_in">Time In</label>
                            <input type="time" class="form-control" id="time_in" name="time_in" required>
                        </div>
                        <div class="form-group">
                            <label for="time_out">Time Out</label>
                            <input type="time" class="form-control" id="time_out" name="time_out" required>
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
