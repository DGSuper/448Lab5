<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "d746g521", "aabu3Xee", "d746g521");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
echo '<h2 align="center"> Users </h2>';
echo '<table align="center">';
echo '<tr>';
echo '<td align="center">User Names</td>';
echo '</tr>';
$query = "SELECT user_id FROM Users WHERE user_id != ''";
if($result = $mysqli-> query($query)){
    while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo'<td align="center"> '. $row["user_id"] .'</td>';
        echo '</tr>';
    }
}
else{
    echo '<td> No Users in Database </td>';
}
echo '</table>';
/* close connection */
$mysqli->close();
?>
