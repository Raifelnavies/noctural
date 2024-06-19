<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nocturnal Fest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/noctural/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- Link Google Fonts -->
</head>

<body class="bgcs">
    <div class="containercs">
        <header>
            <h1 class="text-white fw-bold">Nocturnal Fest</h1>
            <nav>
                <ul>
                    <li class="">
                        <a href="http://localhost/noctural/" class="">Home</a>
                    </li>
                    <li class="active open">
                        <a href="http://localhost/noctural/lineup" class="active">Lineup</a>
                    </li>
                    <li class="">
                        <a href="http://localhost/noctural/information" class="">Information</a>
                    </li>
                    <li class="">
                        <a href="http://localhost/noctural/about" class="">About Us</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <section class="lineup">
        <h2 class="fw-bold mb-5">LINE UP</h2>
        <div class="artists mb-3">
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/artist1.jpg" data-name="Ethan" data-desc="Ethan adalah seorang penyanyi berbakat dengan suara yang khas dan karisma yang memikat. Ia mulai terkenal setelah merilis single debutnya yang langsung meroket di tangga lagu. Ethan dikenal karena kemampuan vokalnya yang luar biasa dan penampilan panggungnya yang penuh energi. Musiknya sering kali menggabungkan unsur-unsur pop, R&B, dan soul, menciptakan lagu-lagu yang emosional dan mudah diingat.">
                <img src="http://localhost/noctural/assets/images/artist1.jpg" alt="Artist 1">
                <p>Ethan</p>
            </div>
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/9195.jpg" data-name="Alessia">
                <img src="http://localhost/noctural/assets/images/9195.jpg" alt="Artist 2">
                <p>Alessia</p>
            </div>
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/artist3.jpg" data-name="Vivian">
                <img src="http://localhost/noctural/assets/images/artist3.jpg" alt="Artist 3">
                <p>Vivian</p>
            </div>
        </div>
        <div class="artists mb-3">
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/17471.jpg" data-name="Ronan">
                <img src="http://localhost/noctural/assets/images/17471.jpg" alt="Artist 4">
                <p>Ronan</p>
            </div>
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/artist5.jpg" data-name="Elira">
                <img src="http://localhost/noctural/assets/images/artist5.jpg" alt="Artist 5">
                <p>Elira</p>
            </div>
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/artist6.jpg" data-name="Ivy">
                <img src="http://localhost/noctural/assets/images/artist6.jpg" alt="Artist 6">
                <p>Ivy</p>
            </div>
        </div>
        <div class="artists">
            <div class="artist" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-img="http://localhost/noctural/assets/images/artist7.jpg" data-name="Jasper">
                <img src="http://localhost/noctural/assets/images/artist7.jpg" alt="Artist 7">
                <p>Jasper</p>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImg" src="" alt="Artist Image" class="img-fluid mb-3" width="200px">
                        <p id="modalText" class="text-dark mb-2"></p>
                        <p id="modalDesc" class="text-dark"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Nocturnal Fest. All rights reserved.</p>
    </footer>

    <!-- script buat model lineup -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        document.querySelectorAll('.artist').forEach(function(artist) {
            artist.addEventListener('click', function() {
                var imgSrc = this.getAttribute('data-img');
                var name = this.getAttribute('data-name');
                var deskripsi = this.getAttribute('data-desc');
                document.getElementById('modalImg').src = imgSrc;
                document.getElementById('modalText').textContent = name;
                document.getElementById('modalDesc').textContent = deskripsi;
                document.getElementById('staticBackdropLabel').textContent = name;
            });
        });
    </script>
</body>
</html>
