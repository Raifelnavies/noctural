<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nocturnal Fest Ticket</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .ticket {
            background-color: #1a1a1a;
            border: 2px solid #fff;
            border-radius: 10px;
            width: 700px;
            max-width: 100%;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header h1 {
            margin: 0;
            font-size: 36px;
            color: #f00;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .ticket-body {
            display: flex;
            align-items: center;
        }

        .ticket-info {
            width: 50%;
        }

        .ticket-info .ticket-year {
            font-size: 48px;
            margin: 0;
        }

        .ticket-info .ticket-title {
            font-size: 24px;
            margin: 10px 0;
        }

        .ticket-info .ticket-names {
            font-size: 14px;
            margin: 0;
            color: #ccc;
        }

        .ticket-names1 {
            font-size: 14px;
            margin: 0;
            color: #aeaeae;
        }

        .ticket-barcode {
            width: 50%;
            text-align: right;
        }

        .ticket-details {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            height: 150px;
            margin-bottom: 10px;
        }

        .ticket-detail {
            margin: 0;
            font-size: 16px;
            text-align: center;
        }

        .ticket-detail strong {
            display: block;
            font-size: 15px;
            margin-bottom: 5px;
            color: #000;
        }

        .barcode {
            max-width: 100%;
            height: auto;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .home-button {
            padding: 10px 20px;
            background-color: #f00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .home-button a {
            text-decoration: none;
            color: white;
        }

        .home-button:hover {
            background-color: #d00;
        }

        .bold {
            color: black;
        }
    </style>
</head>

<body style="display: flex; flex-direction: column; align-items: center;">
    <div class="ticket" style="background-image: url(http://localhost/noctural/assets/images/bg-ticket.png); background-size: cover;">
        <div class="ticket-info">
            <p class="ticket-year"></p>
            <p class="ticket-title"></p>
            <p class="ticket-names"></p>
        </div>
        <div class="ticket-barcode">
            <div class="ticket-details" style="margin-right: 1px;">
                <p class="ticket-names1 bold"><strong>Kategori</strong></p>
                <p class="ticket-detail bold" style="margin-bottom: 20px;"><strong><?php echo $ticket->TicketCategory; ?></strong></p>

                <p class="ticket-names1 bold"><strong>Tanggal</strong></p>
                <p class="ticket-detail bold"><strong style="margin-bottom: 33px;"><?php echo $ticket->TanggalKonser; ?></strong></p>

                <p class="ticket-names1 bold"><strong>No Tiket</strong><br></p>
                <p class="ticket-detail bold"><strong><?php echo $ticket->price; ?></strong><br></p>
            </div>
        </div>
        <img src="http://localhost/noctural/assets/images/barcode.png" alt="Barcode" class="barcode" width="95px">
    </div>
    <div class="button-container">
        <button class="home-button">
            <a href="<?php echo base_url("kelolauser"); ?>">Kembali</a>
        </button>
        <button class="home-button" id="print-button" style="background-color: green; width: 100px;">Print</button>
    </div>

    <script>
        document.getElementById('print-button').addEventListener('click', function () {
            Swal.fire(
                'Tiket Selesai di Print',
                '',
                'success'
            );
        });
    </script>
</body>

</html>
