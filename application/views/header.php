<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noctural Fest</title>
    <link rel="stylesheet" href="http://localhost/noctural/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- Link Google Fonts -->
</head>

<body>


<div class="container">
        <header>
            <h1>Noctural Fest 2024</h1>
            <nav>
                <ul>
                    <!-- <li>
                        <a href="http://localhost/noctural/" class="active" id="Home" onclick="showHome()">Home</a>
                    </li> -->

                    <li class="<?php echo $this->uri->segment(1) == '' ? 'active open' : ''; ?>">
                        <a href="<?php echo base_url(''); ?>" class="<?php echo $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                            Home
                        </a>
                    </li>

                    <li class="<?php echo $this->uri->segment(1) == 'lineup' ? 'active open' : ''; ?>">
                        <a href="<?php echo base_url('lineup'); ?>" class="<?php echo $this->uri->segment(1) == 'lineup' ? 'active' : ''; ?>">
                            Lineup
                        </a>
                    </li>

                    <li class="<?php echo $this->uri->segment(1) == 'information' ? 'active open' : ''; ?>">
                        <a href="<?php echo base_url('information'); ?>" class="<?php echo $this->uri->segment(1) == 'information' ? 'active' : ''; ?>">
                            Information
                        </a>
                    </li>

                    <li class="<?php echo $this->uri->segment(1) == 'about' ? 'active open' : ''; ?>">
                        <a href="<?php echo base_url('about'); ?>" class="<?php echo $this->uri->segment(1) == 'about' ? 'active' : ''; ?>">
                            AboutUs
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
