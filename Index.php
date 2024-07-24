<?php

    $park_hotel=$_GET['parkhotel'];
     $vote_hotel=$_GET['votehotel'];

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

foreach($hotels as $hotel){
    if($hotel['parking'] == true){
        $hotelpark[]=$hotel;
    }
};

foreach($hotels as $hotel){
    if($hotel['vote']>$vote_hotel){
        $hotelvote[]=$hotel;
    }
};

foreach($hotelpark as $hotel){
    if($hotel['vote']>$vote_hotel){
        $hotel_vote_park[]=$hotel;
    }
};

var_dump($hotelpark);
var_dump($hotelvote);
var_dump($hotel_vote_park);
 var_dump($park_hotel);
var_dump($vote_hotel);    
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>Table php</title>

</head>

<body>


    <div class="container m-4 p-4">

        <form class="row gy-2 gx-3 align-items-center">
            <div class="col-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="park" name='parkhotel'>
                    <label class="form-check-label" for="park">
                        Parcheggio
                    </label>
                </div>
            </div>
            <div class="col-auto">
                <label class="visually-hidden" for="vote">Preference</label>
                <select class="form-select" id="vote" name='votehotel'>
                    <option value="0" selected>Choose...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <table class="table">
            <thead>


                <tr>
                    <?php foreach($hotels[0] as $key=>$value):?>
                    <th scope="col"><?php echo $key?></th>
                    <?php endforeach;?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($park_hotel&&$vote_hotel!=0) {
                    foreach($hotel_vote_park as $hotel){
                        echo '<tr>';
                echo '<th scope="row">' . $hotel['name'] . '</th>';
                echo '<td>' . $hotel['description'] . '</td>';
                echo '<td>' . ($hotel['parking'] ? 'Si' : 'No') . '</td>';
                echo '<td>' . $hotel['vote'] . '</td>';
                echo '<td>' . $hotel['distance_to_center'] . '</td>';
                echo '</tr>';
                    }
                }
                elseif ($park_hotel) {
                    foreach($hotelpark as $hotel){
                   echo '<tr>';
                echo '<th scope="row">' . $hotel['name'] . '</th>';
                echo '<td>' . $hotel['description'] . '</td>';
                echo '<td>' . ($hotel['parking'] ? 'Si' : 'No') . '</td>';
                echo '<td>' . $hotel['vote'] . '</td>';
                echo '<td>' . $hotel['distance_to_center'] . '</td>';
                echo '</tr>';
                }
            }elseif($vote_hotel!=0){
                foreach( $hotelvote as $hotel){
                 echo '<tr>';
                echo '<th scope="row">' . $hotel['name'] . '</th>';
                echo '<td>' . $hotel['description'] . '</td>';
                echo '<td>' . ($hotel['parking'] ? 'Si' : 'No') . '</td>';
                echo '<td>' . $hotel['vote'] . '</td>';
                echo '<td>' . $hotel['distance_to_center'] . '</td>';
                echo '</tr>';}
                }else{
                foreach($hotels as $hotel){
                  echo '<tr>';
                echo '<th scope="row">' . $hotel['name'] . '</th>';
                echo '<td>' . $hotel['description'] . '</td>';
                echo '<td>' . ($hotel['parking'] ? 'Si' : 'No') . '</td>';
                echo '<td>' . $hotel['vote'] . '</td>';
                echo '<td>' . $hotel['distance_to_center'] . '</td>';
                echo '</tr>';
                }} ;
                ?>
            </tbody>


        </table>
    </div>
</body>

</html>