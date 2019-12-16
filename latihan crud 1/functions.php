<?php

$link = mysqli_connect("localhost", "root", "", "crud");
if (!$link) {
    echo mysqli_error($link);
}

// hapus logic
if (isset($_GET["hapus"])) {

    $target_hapus = $_GET["hapus"];
    $hapus = mysqli_query($link, "DELETE FROM alamat WHERE id=$target_hapus");
    if (!$hapus) {
        echo mysqli_error($link);
    }

    header("Location: index.php");
}
// ---------------------------------------------------------------


// logic edit data
// set variabel dengan nilai string kosong agar tidak tercetak apapunn di halaman
$id = "";
$nama = "";
$kota = "";
// variabel untuk manipulasi element form jika bernilai true maka element update akan tampil
$update = false;

if (isset($_GET["edit"])) {
    $target_edit = $_GET["edit"];

    // lakukan query
    $edit = mysqli_query($link, "SELECT * FROM alamat WHERE id=$target_edit");
    if (!$edit) {
        echo mysqli_error($link);
    }

    $row = mysqli_fetch_assoc($edit);
    // tangkap hasil dari $row untuk di masukan ke dalam form di halaman crud5.php
    // melalui properti value pada form
    $id = $row["id"];
    $nama = $row["nama"];
    $kota = $row["kota"];
    // var_dump($row);
    // die;

    // munculkan form update
    $update = true;
}


// logic tambah data
if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $kota = $_POST["kota"];
    $tambah = mysqli_query($link, "INSERT INTO alamat (nama,kota) VALUES('$nama','$kota')");
    if (!$tambah) {
        echo mysqli_error($link);
    }
}


// logic update
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kota = $_POST["kota"];

    $update = mysqli_query($link, "UPDATE alamat SET nama='$nama',kota='$kota' WHERE id=$id");
    if (!$update) {
        echo mysqli_error($link);
    }
    // sembunyikan form update
    $update = false;
}