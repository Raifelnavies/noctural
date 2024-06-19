<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noctural Fest</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- Link Google Fonts -->
</head>

<body>
    <div class="container">
        <header>
            <h1>Noctural Fest</h1>
            <nav>
            </nav>
        </header>
        <form action="<?php echo base_url('Buytiket3day/buy_ticket3day'); ?>" method="post">
            <div class="row mb-3">
                <label for="inputFullName" class="col-sm-2 col-form-label">Full Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFullName" name="name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPhone" class="col-sm-2 col-form-label">Phone Number :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPhone" name="nomerTelpon" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputTicketCat" class="col-sm-2 col-form-label">Ticket Category :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTicketCat" name="TicketCategory" value="<?php echo isset($kategori) ? $kategori : ''; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPrice" class="col-sm-2 col-form-label">Price :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPrice" name="price" value="<?php echo isset($price) ? $price : ''; ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPaymentMethod" class="col-sm-2 col-form-label">Payment Method :</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="payment" required>
                        <option value="" selected>Pilih Metode Pembayaran</option>
                        <option value="Gopay">Gopay</option>
                        <option value="Bank">Bank</option>
                        <option value="Bitcoin">BTC</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger" type="button">
                    <a href="<?php echo base_url(''); ?>" class="<?php echo $this->uri->segment(1) == '' ? 'active' : ''; ?> nav-link">Back</a>
                </button>
                <button class="btn btn-primary me-md-2" type="submit">Submit</button>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
