<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-header">
            <h5 class="modal-title"><b>Add New Candidat</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>


            <div class="modal-body">


                <div class="card-body text-left">

                    <form method="POST" action="{{ route('candidates.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name </label>
                            <input type="text" class="form-control" placeholder="Enter a Employee name [hyphen accepted]" id="name" name="name"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>


                            <input type="email" class="form-control" id="email" name="email">

                        </div>


                        <div class="form-group">
                            <label for="age" class="col-sm-3 control-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age">
                        </div>

                        <div class="form-group">
                                <label for="file" class="col-sm-3 control-label">Cv</label>
                                <input type="file" class="form-control" id="Cv" name="file"  required>
                        <div class="form-group">

                        <div class="mb-3">
                                <label for="job_id" class="form-label">Job</label>
                                <select name="job_id" class="form-select" id="job_id">
                                    @foreach($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
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
                        </div>
                    </form>

                </div>
            </div>


        </div>

    </div>
</div>
</div>
