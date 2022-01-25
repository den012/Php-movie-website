<?php

date_default_timezone_set("Europe/Bucharest");

function runtime_prettier($time)
{
    if ($time >= 1) {
        $hours = intval($time / 60);
        $mins = $time % 60;

        if ($hours == 1) {
            $time = $hours . ' hour ';
        } elseif ($hours > 1) {
            $time = $hours . ' hours ';
        }
        if ($mins > 1) {
            $time = $time . $mins . ' minutes ';
        } elseif ($mins == 1) {
            $time = $time . $mins . ' minute ';
        }
        return $time;
    } else
        return 'TBA';
}

function check_old_movie($year)
{
    $age = date('Y') - $year;
    if ($age > 40) {
        return $age;
    } else {
        return false;
    }
}

function timeMessage()
{
    $hour = date('H');
    if(($hour >= 6) && ($hour < 12))
    {
        return "Good morning!!";
    }
    if(($hour >= 12) && ($hour < 18))
    {
        return "Good afternoon!!";
    }
    if(($hour >= 18) xor ($hour < 6))
    {
        return "Good evening!!";
    }
}


function find_movie_by_id($item)
{
    if (!isset($_GET['movie_id']))
    {
        return false;
    }
    if($item['id'] === intval($_GET['movie_id']))
    {
        return true;
    }
    else{
        return false;
    }
}

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    return $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    return $y;
  }
}

function find_movie_by_genre($item)
{
    foreach($item['genres'] as $genre)
    {
        if(!isset($_GET['genre']))
        {
            return false;
        }
        if($genre === $_GET['genre'])
        {
            return true;
        }
        else 
        {
            $i = 0;
        }
        if($i = 0)
            return false;
    }
}



function db_connect($host = "localhost", $username="php-user", $password="php-password", $dbname="php-proiect"){
    return mysqli_connect($host, $username, $password, $dbname);
}

?>