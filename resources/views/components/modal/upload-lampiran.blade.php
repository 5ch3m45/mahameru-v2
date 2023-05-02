<div class="modal fade" id="upload-lampiran-modal" tabindex="-1" aria-labelledby="upload-lampiranLabel" aria-hidden="true">
    <form id="upload-lampiran-form" action="{{ route('arsip.lampiran.store', ['arsip' => $arsipID]) }}" method="POST" class="modal-dialog modal-dialog-centered" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="upload-lampiranLabel">Upload Lampiran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="">Pilih file</label>
            <input type="file" name="files[]" id="" class="form-control form-control-sm" multiple accept=".pdf,.png,.jpg,.jpeg">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success text-white">Upload</button>
        </div>
        </div>
    </form>
</div>
