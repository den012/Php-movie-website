<?php
$conn = db_connect();
$review_data = array(
    'show_review_form' => false
);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS reviews(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_id bigint(20) UNSIGNED NOT NULL,
    full_name tinytext NOT NULL,
    email varchar(100) NOT NULL, 
    review TEXT NOT NULL
)";

if(mysqli_query($conn, $sql)){
    $sql_all_reviews = "SELECT full_name, email, review FROM reviews WHERE movie_id = ". $_GET['movie_id'];
    $reviews_list = mysqli_query($conn, $sql_all_reviews);

    $review_data['show_review_form'] = true;

    $review_data['count'] = mysqli_num_rows($reviews_list);

    if($review_data['count']>0){
        $review_data['list'] = mysqli_fetch_all($reviews_list, MYSQLI_ASSOC);
        $review_emails = array_column($review_data['list'],'email');
    }

    if(isset($_POST['reviews_form'])){
        if(isset($review_emails) && in_array($_POST['email'], $review_emails)){
            $review_data['alert'] = 'danger';
            $review_data['message'] = 'Se pare ca ai  lasat deja un review pentru acest film. Nu poti sa lasi mai multe review-uri pentru acelasi film';
        }
        else{
            $movie_id = mysqli_real_escape_string($conn, $_GET['movie_id']);
            $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $review = mysqli_real_escape_string($conn, $_POST['review']);

            $sql = "INSERT INTO reviews( movie_id, full_name, email, review)
            VALUES('".$movie_id ."', '".$full_name ."', '".$email ."', 
            '". $review ."')";

            if(mysqli_query($conn, $sql)){
                //daca review a fost adaugat in baza de date cu succes
                $review_data['show_review_form'] = false;
                $review_data['alert'] = 'success';
                $review_data['message'] = 'Formularul a fost trimist cu succes';

                $review_data['list'][] = array(
                    'full_name' => $_POST['full_name'],
                    'email' => $_POST['email'],
                    'review' => $_POST['review']
                );
                #$review['count']++;
            }
            else{
                $review_data['alert'] = 'danger';
                $review_data['message'] = 'A aparut o eroare. Review-ul nu a putut fi adaugat. Imi pare rau!';
            }
        }
    }
}
?>

<?php if(isset($review_data['message']) && isset($review_data['alert'])){ ?>
<div class="alert my-3 alert-<?php echo $review_data['alert']; ?>" role="alert">
    <?php echo $review_data['message']; ?>
</div>
<?php } ?>


<?php if($review_data['show_review_form'] == true){ ?>

    <div class="my-3 p-3 bg-light" style="border-radius: 5px;">
        <div class="mb-3 pb-3 border-bottom">
            <strong><?php
                if($review_data['count']>0)
                {
                    echo 'Lasa un review pentru acest film!';
                }
                else{
                    echo 'Fii primul care lasa un review pentru acest film!';
                }
            ?></strong>
        </div>

        <form action="" method="POST">

            <div class="mb-3">
                <label for="full_name">Full Name</label><br>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label><br>
                <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="review">Review</label><br>
                <textarea class="form-control" id="review" name="review" required><?php if(isset($_POST['review'])) echo $_POST['review']; ?></textarea>
            </div>

            <div class="mb-3">
                <input type="checkbox" id="acceptance" name="acceptance" value="acceptance" required>
                <label for="acceptance">Accept termenii de procesare a datelor cu caracter persoanal</label><br>
            </div>

            <input type="submit" class="btn btn-primary" name="reviews_form" value="Trimite">

        </form>
    </div>

<?php } ?>



