<?php require_once('includes/functions.php'); ?>
<?php $logo = "<strong>DB</strong>" ?>
<!--navbar -->
<?php
    $nav = array(
        array(
            'title' => 'Home',
            'link' => 'index.php'
        ),
        array(
            'title' => 'Movies',
            'link' => 'movies.php',
        ),
        array(
            'title' => 'Genres',
            'link' => 'genres.php'
        ),
        array(
            'title' => 'Favorites',
            'link' => 'favorites.php'
        ),
        array(
            'title' => 'Contact',
            'link' => 'contact.php'
        )
    );
    $curentFile = basename($_SERVER['SCRIPT_FILENAME']);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $logo ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    foreach($nav as $navItem)
                    { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($curentFile == $navItem['link']){echo 'active strong';}?>" aria-current="page" href="<?php echo $navItem['link'];?>"><?php echo $navItem['title'];?></a>
                        </li>
                  <?php  } ?>
            </ul>

            <?php require_once('includes/search-form.php');?>

        </div>
    </div>
</nav>

<?php
$movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
$genres = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['genres'];
?>
