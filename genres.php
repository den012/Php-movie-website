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

<?php require("includes/header.php"); ?>

<div class="container my-5">
        <div class="row">
            <h1>Genres</h1>
        </div>
        </style>
        <div class="row">
            <?php
                foreach($genres as $genre){
                    echo '
                        <div class="col-xl-3 col-md-6 my-3">
                            <a href="movies.php?genre='.$genre['name'].'" style="text-decoration: none;">
                                <div class="genre" style="background-color: '.$genre['color'].';">
                                    <h3>'.$genre['name'].'</h3>
                                </div>
                            </a>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
    <div class="container-fluid">
        
    </div>

<?php require("includes/footer.php"); ?>


</body>
</html>