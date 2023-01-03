<?php
if (isset($_POST['update'])) {
    foreach($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $conn->query("UPDATE country SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}
?>