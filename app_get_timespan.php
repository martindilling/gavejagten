<?php
if ($_POST['id_event'] ) {
    $db = mysqli_connect('mysql.1freehosting.com', 'u567725773_appu', 'u567725773_appp', 'u567725773_appn') or die('connect error');
    $id_event=$_POST['id_event'];
    
    $query = "
            SELECT start_time, end_time
            FROM gj_events
            WHERE id_event LIKE '$id_event'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_object($result);
    $start_time=$row->start_time;
    $end_time=$row->end_time;
    print "datumA=".$start_time."&datumB=".$end_time;    
    mysqli_close($db);
}
?>
