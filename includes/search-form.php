

<form class="d-flex" action="search-results.php" method="get">
    <input class="form-control me-2" <?php
    if(isset($_GET['search']))
    {
        echo 'value="'.$_GET['search'].'"';
    } ?>
           type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
