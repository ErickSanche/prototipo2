<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top "style="background-color: #FFB6C1;">
                    <a class="navbar-brand" href="#">BIENVENIDO</a>
                    <a class="navbar-brand" style="left:80%" href="login">Iniciar Sesion</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

<center>
    <body>

        <div class="container" >
            <div class="row">
        <?php
        for ($i=1; $i <= 9 ; $i++) {
            echo "<div class='card' style='width: 18rem; style='border-collapse: separate; border-spacing: 10px;''>
            <img src='../img/$i.jpg' class='card-img-top' alt=''>
            <div class='card-body'>
            <h5 class='card-title'>Paquete $i</h5>
            <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <p class='card-text'>$5000.</p>
        </div>
        </div>";
        }
        ?>
        </div>
    </body>
</center>

   
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>
