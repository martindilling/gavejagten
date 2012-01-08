<?php
$error = "error=Forespørgslen blev ikke gennemført.\nDer opstod en fejl i databasen.";

if ($_POST['username'] && $_POST['useremail'] && $_POST['userphone'] && $_POST['userimage']  ) {
    $name=$_POST['username'];
    $phone=$_POST['userphone'];
    $email=$_POST['useremail'];
    $img_link=$_POST['userimage'];
    $db = mysqli_connect('mysql.1freehosting.com', 'u567725773_appu', 'u567725773_appp', 'u567725773_appn') or die($error);
    
    $query = "
        INSERT INTO
            gj_users
        SET
            name='$name',
            phone='$phone',
            email='$email',
            img_link='$img_link'";
    $result = mysqli_query($db, $query) or die($error);
    
    print "success=1&userid=".mysqli_insert_id($db);
    mysqli_close($db);
}
?>