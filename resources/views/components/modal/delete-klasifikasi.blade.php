<div class="modal fade" id="delete-klasifikasi-modal" tabindex="-1" aria-labelledby="delete-klasifikasiLabel" aria-hidden="true">
    <form id="delete-klasifikasi-form" method="POST" class="modal-dialog modal-dialog-centered">
        @csrf
        @method('DELETE')
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="delete-klasifikasiLabel">Hapus Klasifikasi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Data dihapus tidak dapat dikembalikan.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger text-white">Hapus</button>
        </div>
        </div>
    </form>
</div>
