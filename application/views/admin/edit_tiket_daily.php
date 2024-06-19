<div class="container-fluid">
    <?php if ($this->session->flashdata('pesandaily')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('pesandaily'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Tiket Daily Pass</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('kelolatiket/update_tiket_daily'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $ticket->id; ?>">
                <div class="mb-3 row">
                    <label for="kategori" class="col-form-label">Tiket Kategori</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" value="<?php echo $ticket->ticketKategori; ?>">
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-form-label">Harga</label>
                    <input type="number" name="price" class="form-control" id="price" value="<?php echo $ticket->price; ?>">
                </div>
                <div class="mb-3 row">
                    <label for="stok" class="col-form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" id="stok" value="<?php echo $ticket->stok; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
