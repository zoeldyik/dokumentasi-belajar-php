<?php
session_start();

if (isset($_POST["submit"])) {
    $to      = 'zoeldyik@gmail.com';
    $subject = 'dari web https://zoeldyik.000webhostapp.com/';
    $pengirim = $_POST["pengirim"];
    $isipesan = $_POST["pesan"];
    $headers = 'From:' . $pengirim;

    $message = "dikirim oleh" . $pengirim . "\n\n" . $isipesan;
    mail($to, $subject, $message, $headers);

    $_SESSION["mailsent"] = true;
    header("location: index.php");
}