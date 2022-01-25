<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blaga Denis</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">


</head>
<body>

<?php require('includes/header.php'); ?>

<div class="container">
    <section class="showcase">
        <video src="img/movies.mp4" muted loop autoplay></video>
        <div class="overlay"></div>
        <div class="text">
        <h2>Never Stop</h2> 
        <h3>Exploring The World</h3>
        <p>Whether it’s live-action or animated, there’s nothing like a movie that’s fun for the whole family -- kids, teens and grown-ups too!</p>
        </div>
    </section>
    <button type="button" class="btn btn-primary" onclick="window.location.href='movies.php'">Movies</button>
</div>

<?php require_once('includes/footer.php'); ?>

</body>
</html>
