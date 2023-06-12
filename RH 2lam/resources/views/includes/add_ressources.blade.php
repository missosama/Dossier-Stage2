<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Ressource</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('ressources.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter ressource name" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Link</label>
                            <input type="text" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="form-group">
                            <label for="schedule_id">Schedule Training</label>
                            <select class="form-control" id="schT_id" name="schT_id" required>
                                <option value="">Select Schedule Training</option>
                                @foreach($schedules as $schedule)
                                <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                @endforeach
                            </select>
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
