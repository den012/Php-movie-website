<?php
    echo '
    <div class="col-sm-4" id="'.$movie['id'].'">
        <div class="card" style="height: 820px;">
            <img class="card-img-top" src="'.$movie['posterUrl'].'" onerror="this.src=`img/TBA.jpg`"  alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">'.$movie['title'].'</h5>
                <p class="card-text">'.custom_echo($movie['plot'],100).'</p>
                <a href="movie.php?movie_id='.$movie['id'].'" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
    ';
?>