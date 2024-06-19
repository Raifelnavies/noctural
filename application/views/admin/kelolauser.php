<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" style="white-space: nowrap;">ID</th>
                            <th scope="col" style="white-space: nowrap;">Name</th>
                            <th scope="col" style="white-space: nowrap;">Email</th>
                            <th scope="col" style="white-space: nowrap;">Phone Number</th>
                            <th scope="col" style="white-space: nowrap;">Number Of Ticket</th>
                            <th scope="col" style="white-space: nowrap;">Ticket Category</th>
                            <th scope="col" style="white-space: nowrap;">Price</th>
                            <th scope="col" style="white-space: nowrap;">Tanggal Konser</th>
                            <th scope="col" style="white-space: nowrap;">Metode Pembayaran</th>
                            <th scope="col" style="white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)) : ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td style="white-space: nowrap;"><?php echo $user->id; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->nama; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->email; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->NomerTelpon; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->NumberOfTicket; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->TicketCategory; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->price; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->TanggalKonser; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $user->Payment; ?></td>
                                    <td style="white-space: nowrap;">
                                    <a href="<?php echo base_url('kelolauser/show_tiket/' . $user->id); ?>" class="btn btn-success btn-sm">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">No data found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
