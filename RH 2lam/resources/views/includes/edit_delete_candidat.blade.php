<div class="modal fade" id="edit{{ $candidate->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Candidate</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('candidates.update', $candidate->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter an Employee name [hyphen accepted]" id="name" name="name" value="{{ old('name', $candidate->name) }}" required />
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $candidate->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-3 control-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $candidate->age) }}">
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-sm-3 control-label">Cv</label>
                            <input type="file" class="form-control" id="Cv" name="file" required>
                        </div>
                        <div class="form-group">
                            <label for="job_id" class="form-label">Job</label>
                            <select name="job_id" class="form-select" id="job_id">
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}" {{ old('job_id', $candidate->job_id) == $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                            <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="delete{{ $candidate->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="candidat_id">Delete Candidat</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('candidates.destroy', $candidate->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_candidat_id">{{ $candidate->name }}</h2>
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
            var candidatId = $(this).data('candidat-id');
            $('.del_candidat_id').text(candidatId);
        });
    });
</script>
