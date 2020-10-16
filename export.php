<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

// get Users
$query = "SELECT id, email FROM emaildata order by id desc";
if (!$result = mysqli_query($db, $query)) {
    exit(mysqli_error($db));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Emaildata.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'Email'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>