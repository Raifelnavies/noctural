<?php include 'header.php'; ?>

<section class="main-banner">
    <img src="<?= base_url('assets/images/1_.png'); ?>" alt="Main Banner">
</section>

<section class="lineup">
    <h2>LINE UP</h2>
    <div class="artists">
        <div class="artist">
            <img src="<?= base_url('assets/images/artist1.jpg'); ?>" alt="Artist 1">
            <p>Ethan</p>
        </div>
        <div class="artist">
            <img src="<?= base_url('assets/images/9195.jpg'); ?>" alt="Artist 2">
            <p>Alessia</p>
        </div>
        <div class="artist">
            <img src="<?= base_url('assets/images/artist3.jpg'); ?>" alt="Artist 3">
            <p>Vivian</p>
        </div>
        <div class="artist">
            <img src="<?= base_url('assets/images/17471.jpg'); ?>" alt="Artist 4">
            <p>Ronan</p>
        </div>
        <div class="artist">
            <img src="<?= base_url('assets/images/artist5.jpg'); ?>" alt="Artist 5">
            <p>Elira</p>
        </div>
        <div class="artist">
            <img src="<?= base_url('assets/images/artist6.jpg'); ?>" alt="Artist 6">
            <p>Ivy</p>
        </div>
        <div class="artist">
            <img src="<?= base_url('assets/images/artist7.jpg'); ?>" alt="Artist 7">
            <p>Jasper</p>
        </div>
    </div>
</section>

<section class="promo">
    <h2>SPECIAL OFFER</h2>
    <div class="promo-content">
        <div class="promo-left">
            <img src="<?= base_url('assets/images/project_beanz.png'); ?>" alt="Promo Image 1">
        </div>
        <div class="promo-right">
            <img src="<?= base_url('assets/images/4.jpg'); ?>" alt="Promo Image 2">
            <a href="#tickets" class="btn">Book Now</a> <!-- Modified here -->
        </div>
    </div>
</section>


<section id="tickets" class="tickets">
    <h2>Buy Tickets Online</h2>
    <div class="ticket-switcher">
        <button id="daily-pass-btn" class="active" onclick="showDailyPass()">Daily Pass</button>
        <button id="three-day-pass-btn" onclick="showThreeDayPass()">3-Day Pass</button>
    </div>

    <!-- tiket daily pass -->
    <div id="daily-pass" class="ticket-content">
        <?php foreach ($ticket as $t) : ?>
            <div class="ticket">
                <p>Daily Pass</p>
                <h3><?php echo $t->ticketKategori; ?></h3>
                <p>Presale</p>
                <p>Start From IDR <?php echo $t->price; ?></p>
                <a href="<?php echo base_url('Buyticket') . '?kategori=' . urlencode($t->ticketKategori) . '&price=' . $t->price . '&Tanggal_konser=' . urlencode($t->Tanggal) .  '&ticket_id=' . $t->id; ?>" class="btn">Buy Tickets</a>
            </div>
        <?php endforeach; ?>
    </div>


    <!-- tiket 3 days pass -->
    <div id="three-day-pass" class="ticket-content" style="display:none;">
        <?php foreach ($tickets as $t) : ?>
            <div class="ticket">
                <p>3-Day Pass</p>
                <h3><?php echo $t->ticketKategori; ?></h3>
                <p>Presale</p>
                <p>Start From IDR <?php echo $t->price; ?></p>
                <a href="<?php echo base_url('Buytiket3day?kategori=' . urlencode($t->ticketKategori) . '&price=' . $t->price . '&Tanggal_konser=' . urlencode($t->Tanggal) . '&ticket_id=' . $t->id); ?>" class="btn">Buy Tickets</a>
            </div>
        <?php endforeach; ?>
    </div>


</section>
<script src="http://localhost/noctural/assets/js/tickets.js"></script>


<?php include 'footer.php'; ?>
