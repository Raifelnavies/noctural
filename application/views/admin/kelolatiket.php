<div class="container-fluid">

    <!-- DataTales 3 Days Pass -->
    <?php if ($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tables 3 Day Pass</h6>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Menambahkan tiket
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" style="white-space: nowrap;">ID</th>
                            <th scope="col" style="white-space: nowrap;">Kategori</th>
                            <th scope="col" style="white-space: nowrap;">Harga</th>
                            <th scope="col" style="white-space: nowrap;">Stock</th>
                            <th scope="col" style="white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $t) : ?>
                            <tr>
                                <td><?php echo $t->id; ?></td>
                                <td><?php echo $t->ticketKategori; ?></td>
                                <td>Rp. <?php echo $t->price; ?></td>
                                <td><?php echo $t->stok; ?></td>
                                <td style="white-space: nowrap;">
                                    <a href="<?php echo base_url('kelolatiket/edit_tiket_3day/' . $t->id); ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="<?php echo base_url('kelolatiket/delete_tiket_3day/' . $t->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Daily Pass -->
    <?php if ($this->session->flashdata('pesandaily')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('pesandaily'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tables Daily Pass</h6>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropdaily">
                Menambahkan tiket
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" style="white-space: nowrap;">ID</th>
                            <th scope="col" style="white-space: nowrap;">Kategori</th>
                            <th scope="col" style="white-space: nowrap;">Harga</th>
                            <th scope="col" style="white-space: nowrap;">Stock</th>
                            <th scope="col" style="white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ticket as $t) : ?>
                            <tr>
                                <td><?php echo $t->id; ?></td>
                                <td><?php echo $t->ticketKategori; ?></td>
                                <td>Rp. <?php echo $t->price; ?></td>
                                <td><?php echo $t->stok; ?></td>
                                <td style="white-space: nowrap;">
                                    <a href="<?php echo base_url('kelolatiket/edit_tiket_daily/' . $t->id); ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="<?php echo base_url('kelolatiket/delete_tiket_daily/' . $t->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 Day Pass -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Menambahkan Tiket 3 Daily Pass</h5>
            </div>
            <div class="modal-body p-4">
                <form action="<?php echo base_url('kelolatiket/add_tiket_3day'); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="tiketkateogir" class="col-form-label">Tiket Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="tiketkateogir">
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" id="stok">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Daily Pass -->
<div class="modal fade" id="staticBackdropdaily" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Menambahkan Tiket Daily Pass</h5>
            </div>
            <div class="modal-body p-4">
                <form action="<?php echo base_url('kelolatiket/add_tiket_daily'); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="tiketkateogir" class="col-form-label">Tiket Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="tiketkateogir">
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" id="stok">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>