<?php

$error = "error=Forespørgslen blev ikke gennemført.\nDer opstod en fejl i databasen.";

if ($_POST['userid'] && $_POST['eventid'] && $_POST['qrcodes']) {
    $id_user = $_POST['userid'];
    $id_event = $_POST['eventid'];
    $qr_array = explode(",", $_POST['qrcodes']);

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

    //Hent sponsor data
    $query = "
            SELECT value, maxvalue
            FROM gj_join_events_sponsors
            WHERE qr_string LIKE '$qr_string'";
    $result = mysqli_query($db, $query) or die($error);
    $row = mysqli_fetch_object($result);
    $value = $row->value;
    $maxvalue = $row->maxvalue;

    // find antal gange qr-strengen optræder som delivered (id_status=3)
    $query = "
            SELECT id_status
            FROM gj_join_events_users
            WHERE qr_string LIKE '$qr_string'
            AND id_status=3";
    $result = mysqli_query($db, $query) or die($error);
    $numrows = mysqli_num_rows($result);

    for($a=0,$b=count($qr_array);$a<$b;$a++){

        //Hent sponsor data
        $query = "
            SELECT value, maxvalue
            FROM gj_join_events_sponsors
            WHERE qr_string LIKE '$qr_array[$a]'";
        $result = mysqli_query($db, $query) or die($error);
        $row = mysqli_fetch_object($result);
        $value = $row->value;
        $maxvalue = $row->maxvalue;

        // find antal gange qr-strengen optræder som delivered (id_status=3)
        $query = "
            SELECT id_status
            FROM gj_join_events_users
            WHERE qr_string LIKE '$qr_array[$a]'
            AND id_status=3";
        $result = mysqli_query($db, $query) or die($error);
        $numrows = mysqli_num_rows($result);


        if ((($numrows + $a) * $value) > $maxvalue) {
            $value = 0;
        }

        $query = "
                UPDATE gj_join_events_users
                SET id_status=3, date='$now_time', value='$value'
                WHERE id_user LIKE '$id_user'
                AND id_status=2";
        $result = mysqli_query($db, $query) or die($error);
    }
    print "success=1";

    mysqli_close($db);
}
?>