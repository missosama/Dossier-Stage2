<div class="modal fade" id="fileModal{{ $candidate->id }}" tabindex="-1" role="dialog" aria-labelledby="fileModal{{ $candidate->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModal{{ $candidate->id }}Label">{{ $candidate->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/pdf_files/' . $candidate->cv_file) }}" type="application/pdf" width="100%" height="600px">
            </div>
        </div>
    </div>
</div>
