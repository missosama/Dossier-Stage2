<div class="modal fade" id="edit{{ $res->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Resource</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('ressources.update', $res->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $res->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File Link</label>
                        <input type="text" class="form-control" id="file" name="file" value="{{ $res->file }}" required>
                    </div>
                    <div class="form-group">
                        <label for="schedule_id">Schedule Training</label>
                        <select class="form-control" id="scht_id" name="scht_id" required>
                            @foreach($schedules as $schedule)
                                <option value="{{ $schedule->id }}" @if($res->schedule_id == $schedule->id) selected @endif>{{ $schedule->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
