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

<?php require_once('includes/header.php'); 
$movie_filtered = array_filter($movies, "find_movie_by_genre");
?>

<div class="container">
                <div class="row">
                <?php if(empty($movie_filtered) && $movie_filtered){?>
                    <h1><?php echo $_GET['genre'] ?> movies</h1>
                    <?php
                    foreach($movie_filtered as $movie){
                        foreach($movie['genres'] as $genre){
                        if($_GET['genre'] === $genre){?>
                            <?php require("includes/archive-movie.php");
                        }
                        }
                    }
                
                }else{
                ?>
                <h1>Movies</h1>
                <?php 
                    foreach ($movies as $movie) {
                        require("includes/archive-movie.php");
                    } 
                }?>
                </div>
                
            </div>


<?php require_once('includes/footer.php'); ?>

</body>
</html>
