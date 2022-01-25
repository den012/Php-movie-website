<?php 
    require("includes/header.php");


    $movies_filtered = array_filter($movies, 'find_movie_by_id');
    if(isset($movies_filtered) && $movies_filtered){
        $movie = reset($movies_filtered);
    }
?>
<?php
    $fav_movies_path = './assets/movie-favorites.json';
    $fav_movies_count = (array)json_decode(file_get_contents($fav_movies_path));
    //var_dump(array(json_decode($_COOKIE['id'])));
    if(isset($_COOKIE['favorite'])){
        $fav_movies = (array)json_decode($_COOKIE['favorite']);
    }else{
        $fav_movies = array();
    }
    if(isset($_POST['fav'])){
        if($_POST['fav'] === "1"){
            if(!in_array($movie['id'], $fav_movies)){
                $fav_movies[] = $movie['id'];
                setcookie('favorite', json_encode($fav_movies), time()+3600*24*365);

                if(array_key_exists($movie['id'], $fav_movies_count)){
                    $fav_movies_count[$movie['id']]++;
                }else{
                    $fav_movies_count[$movie['id']] = 1;
                }
                file_put_contents($fav_movies_path, json_encode($fav_movies_count));
            }  
        }else if($_POST['fav'] === "0"){
            if(array_search($movie['id'], $fav_movies) !== false){
                $key = array_search($movie['id'], $fav_movies);
                unset($fav_movies[$key]);
                setcookie('favorite', json_encode($fav_movies), time()+3600*24*365);
                if(array_key_exists($movie['id'], $fav_movies_count) && $fav_movies_count[$movie['id']]>0){
                    $fav_movies_count[$movie['id']]--;
                }
                file_put_contents($fav_movies_path, json_encode($fav_movies_count));
            }
        }
        header('Location: '. $_SERVER['REQUEST_URI']);
    }
?>

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


<div>
    <br><br>
    <div class="container">
        <span>
            <h1 class="d-flex flex-wrap justify-content-between"><?php echo $movie['title'] ?>
        </span>
        <form method="post">
            <input action="" type="hidden" name="fav" value="<?php if(!in_array($movie['id'], $fav_movies)){echo "1";}else{echo "0";} ?>" >
            <button class="position-relative btn <?php if(!in_array($movie['id'], $fav_movies)){echo 'btn-warning';}else{echo 'btn-secondary';} ?>" type="submit" >
                <?php if(!in_array($movie['id'], $fav_movies)){echo 'Adauga la favorite';}else{echo 'Sterge din favorite';} ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                        <?php if(isset($fav_movies_count[$movie['id']])){echo $fav_movies_count[$movie['id']];}else{echo 0;} ?>
                </span>
            </button>
        </form></h1>

        <div class="row">
        <div class="col-4">
            <div class="card">
                <img src="<?php echo $movie['posterUrl']; ?>">
            </div>
        </div>


        <div class="col-8">
            <div class="info">
                <?php if (check_old_movie($movie['year'])) { ?>
                    <h2>
                        <span class="badge bg-danger">Old movie: <?php echo check_old_movie($movie['year']); ?> years</span>
                    </h2>
                <?php } else { ?>
                    <h2><span class="badge bg-success">New movie</span></h2>
                <?php } ?>


                <p><?php echo $movie['plot']; ?>.</p>
                <p>Directed By: <strong><?php echo $movie['director']; ?></strong></p>
                <p>Runtime: <strong><?php echo runtime_prettier($movie['runtime']); ?></strong></p>
                <p>Genres: <strong> <?php $genres = implode(", ", $movie['genres']);
                        echo $genres; ?> </strong></p>
                <h5><strong>Cast:</strong></h5>
                <?php
                $names = explode(",", $movie['actors']);
                echo '<ul>';
                echo '<li>' . implode('</li><li>', $names) . '</li>';
                echo '</ul>';
                ?>
            </div>

                <?php include_once('./includes/movie-reviews.php'); ?>
                    
        </div>

        <!-- reviewuri -->
        <?php if(isset($review_data['count']) && $review_data['count']>0){ ?>
        <div class="h4 mt-4">
            Reviews
        </div>
        <?php foreach(array_reverse($review_data['list']) as $review){ ?>
            <div class="my-3 p-3 bg-light">
                <div class="fw-bold pb-3 mb-3 border-bottom">
                    Nume utilizator: <?php echo $review['full_name']; ?>
            </div>
            <strong>Review:</strong>
             <?php echo $review['review']; ?>
        </div>
        <?php } ?>
        <?php } ?>

        <!-- ... -->


    </div>
</div>

<?php
    require( "includes/footer.php");
?>