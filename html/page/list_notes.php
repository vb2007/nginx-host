<?php
$noteDirectory2023 = '../asset/vazlatok/10/';
$noteDirectory2022 = '../asset/vazlatok/9/';

$notes2023 = scandir($noteDirectory2023);
$notes2023 = array_diff($notes2023, array('..', '.'));
$notes2022 = scandir($noteDirectory2022);
$notes2022 = array_diff($notes2022, array('..', '.'));

natsort($notes2023);
natsort($notes2022);

foreach ($notes2023 as $note) {
    echo '<li class="d-flex align-items-start mb-2">';
    echo '<a href="' . $noteDirectory2023 . $note . '">' . $note . '</a>';
    echo '</li>';
}

foreach ($notes2022 as $note) {
    echo '<li class="d-flex align-items-start mb-2">';
    echo '<a href="' . $noteDirectory2022 . $note . '">' . $note . '</a>';
    echo '</li>';
}
?>
