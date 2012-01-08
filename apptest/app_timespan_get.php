<?php

$error = "error=Forespørgslen blev ikke gennemført.\nDer opstod en fejl i databasen.";

if ($_POST['id_event']) {

    $id_event = $_POST['id_event'];
    $db = mysqli_connect('mysql.1freehosting.com', 'u567725773_appu', 'u567725773_appp', 'u567725773_appn') or die($error);
    //$db->query="SET time_zone = '+2:00'";
    //Hent start,slut,nu -tid for eventen
    $query = "
            SELECT start_time, end_time, zone_time
            FROM gj_events
            WHERE id_event LIKE '$id_event'";
    $result = mysqli_query($db, $query) or die($error);
    $row = mysqli_fetch_object($result);
    $start_time = $row->start_time;
    $end_time = $row->end_time;
    date_default_timezone_set($row->zone_time);
    $now_time = date("Y-m-d H:i:s");

    //Find QRkoderne der er tilknyttet eventen
    $query = "
            SELECT qr_string
            FROM gj_join_events_sponsors
            WHERE id_event LIKE '$id_event'";
    $result = mysqli_query($db, $query) or die($error);
    $arr = array();
    while ($row = mysqli_fetch_object($result)) {
        $arr[] = $row->qr_string;
    }

    //Send Skidtet tilbage
    print "success=1&datumA=" . $start_time . "&datumB=" . $end_time . "&datumC=" . $now_time . "&codes=" . implode(",", $arr);
    mysqli_close($db);
}
?>