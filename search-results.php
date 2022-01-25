<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blaga Denis</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">


</head>
<body>

<?php require("includes/header.php");
?>

<div class="container">
    <div class="row alert alert-warning mt-3 h4" role="alert">
        <h4 class="bi bi-exclamation-diamond">Search results for: <?php echo $_GET['search'] ?></h4>
    </div>
    <div class="row">
        <?php
        if(isset($_GET['search']))
        {
            if(strlen($_GET['search'])>=3)
            { 
                $moviez = array_filter($movies, function($var){
                    return is_numeric(strpos(strtolower($var['title']), strtolower($_GET['search'])));
                });
                foreach($moviez as $movieKey => $movie)
                {
                    require("includes/archive-movie.php");
                }
            }
            else
            {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                            <h4>Introdu minim 3 caractere</h4>
                        </div>";
            }
        }
        else
        {
            echo "Ai ajuns aici fara sa vrei!";
        }
        ?>
    </div>
</div>

<?php require_once("includes/search-form.php");?>


<?php require_once('includes/footer.php'); ?>
</body>
</html>