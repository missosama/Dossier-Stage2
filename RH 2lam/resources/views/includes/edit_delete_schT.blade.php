<div class="modal fade" id="edit{{ $schedule->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Schedule Training</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('schT.update', $schedule->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="start_date" class="col-sm-3 control-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $schedule->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="col-sm-3 control-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $schedule->start_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-sm-3 control-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $schedule->end_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="time_in" class="col-sm-3 control-label">Time In</label>
                        <input type="time" class="form-control" id="time_in" name="time_in" value="{{ $schedule->time_in }}" required>
                    </div>
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>
                        <input type="time" class="form-control" id="time_out" name="time_out" value="{{ $schedule->time_out }}" required>
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
<div class="modal fade" id="delete{{ $schedule->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="schedule_id">Delete Schedule Training</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('schT.destroy', $schedule->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_schedule_id">{{ $schedule->name }}</h2>
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
            var scheduleId = $(this).data('schedule-id');
            $('.del_schedule_id').text(scheduleId);
        });
    });
</script>
