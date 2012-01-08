<?php

$error = "error=Forespørgslen blev ikke gennemført.\nDer opstod en fejl i databasen.";

if ($_POST['userid'] && $_POST['eventid'] && $_POST['qrcode']) {
    $id_user = $_POST['userid'];
    $id_event = $_POST['eventid'];
    $qr_string = $_POST['qrcode'];

    $db = mysqli_connect('mysql.1freehosting.com', 'u567725773_appu', 'u567725773_appp', 'u567725773_appn') or die($error);

    //Hent eventens tidzone
    $query = "
            SELECT zone_time
            FROM gj_events
            WHERE id_event LIKE '$id_event'";
    $result = mysqli_query($db, $query) or die($error);
    $row = mysqli_fetch_object($result);
    date_default_timezone_set($row->zone_time);
    $now_time = date("Y-m-d H:i:s");

    $query = "
            SELECT id_sponsor
            FROM gj_join_events_sponsors
            WHERE qr_string LIKE '$qr_string'";
    $result = mysqli_query($db, $query) or die($error);
    $row = mysqli_fetch_object($result);
    $id_sponsor = $row->id_sponsor;

    //opret scan som pending (id_status 2)
    $query = "
        INSERT INTO
            gj_join_events_users
        SET
            id_event='$id_event',
            id_user='$id_user',
            id_status=2,
            value=0,
            qr_string='$qr_string',
            date='$now_time'";
    $result = mysqli_query($db, $query) or die($error);

    //hent sponsor data
    $query = "
            SELECT name,img_link
            FROM gj_sponsors
            WHERE id_sponsor LIKE '$id_sponsor'";
    $result = mysqli_query($db, $query) or die($error);
    $row = mysqli_fetch_object($result);
    $name = $row->name;
    $img = $row->img_link;

    //send skidtet tilbage
    print "success=1&sponsor=$name&img=$img";

    mysqli_close($db);
}
?>
