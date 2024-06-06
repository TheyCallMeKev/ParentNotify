<?php
$db_path = 'C:\xampp\htdocs\FinalApplication\src\DB/TimeNet.db';

$start_time = '6:00:00';
$end_time = '8:00:00';
$max_late_time = '16:00:00';

$start_time = new DateTime($start_time);
$start_time = $start_time->format('H:i:s');

$end_time = new DateTime($end_time);
$end_time = $end_time->format('H:i:s');

$max_late_time = new DateTime($max_late_time);
$max_late_time = $max_late_time->format('H:i:s');

try {
    $connection = new SQLite3($db_path);

    if ($connection->lastErrorCode()!== 0) {
        throw new Exception($connection->lastErrorMsg());
    } 
} catch (Exception $e) {
    echo "Error: ". $e->getMessage();
    exit();
}

if ($connection) {
    $consult = $connection->prepare("SELECT punch_time FROM att_punches WHERE employee_id=? ORDER BY punch_time DESC");
    $consult->bindValue(1, $_SESSION['logged_in_ID'], SQLITE3_INTEGER);
    $result = $consult->execute();

    $result = $result->fetchArray();

    if ($result) {
        $entry_punch_time = $result['punch_time'];
        $entry_punch_time = new DateTime($entry_punch_time);
        $entry_punch_time = $entry_punch_time->format('H:i:s');

        if ($entry_punch_time >= $start_time && $entry_punch_time <= $end_time) {
            $circle_text = "<span class='info_circle_ontime'></span>";
        } elseif ($entry_punch_time > $end_time && $entry_punch_time <= $max_late_time) {
            $circle_text = "<span class='info_circle_late'></span>";
        } else {
            $circle_text = "<span class='info_circle_unknow'></span>";
        }

    } else {
        $circle_text = "<span class='info_circle_unknow'></span>";
        $entry_punch_time = "<span class='text_info'>No se encontraron registros.</span>";
    }
}

?>