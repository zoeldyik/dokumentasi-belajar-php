<?Php
require("functions.php");
$result = mysqli_query($link, "SELECT * FROM alamat");

// logic cari
if (isset($_POST["cari"])) {

    $keyword = $_POST["keyword"];
    $result = mysqli_query($link, "SELECT * FROM alamat WHERE
        nama LIKE '%$keyword%' OR
        kota LIKE '%$keyword%'
    ");

    if (!$result) {
        echo mysqli_error($link);
    }
}

// var_dump($nama, $id, $kota);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!----------------------------------- search table -->
    <form action="" method="post" class="d-flex justify-content-end mr-2 my-2">
        <input type="text" name="keyword" class="px-2 py-2 mr-1" placeholder="cari disini..." autocomplete="off">
        <button type="submit" name="cari" class="btn btn-info">cari</button>
    </form>
    <!-- -------------------------------------------------- -->


    <table class="table text-center table-striped table-success table-bordered">
        <thead class="table-dark">
            <tr>
                <th>no</th>
                <th class="w-50">nama</th>
                <th>alamat</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <!---- variabel $i untuk mdi jadikan nomor urut  -->
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td class="text-left"><?= $row["nama"]; ?></td>
                <td><?= $row["kota"]; ?></td>
                <td>
                    <a name="edit" class="btn btn-warning" href="?edit=<?= $row["id"]; ?>" role="button">edit</a>
                    <a name="hapus" class="btn btn-danger" href="?hapus=<?= $row["id"]; ?>" role="button">hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endwhile; ?>
        </tbody>
    </table>


    <div class="container d-flex justify-content-center">
        <?php if ($update) : ?>
        <!-- update form  -->
        <div class="card bg-info w-25 p-3 text-white">
            <h3 class="text-center">edit data</h3>

            <!------ untuk menghilangkan paramater get di url yg berasal dari edit button
            action dalam form harus diisi walaupun nilainya sama jika tidak diisi -->
            <!-- referensi -->
            <!-- https://stackoverflow.com/questions/18687873/unset-getsomevariable-not-working -->
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group">
                    <label for="">nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $nama; ?>">
                </div>
                <div class="form-group">
                    <label for="">kota</label>
                    <input type="text" name="kota" id="nomor" class="form-control" value="<?= $kota; ?>">
                </div>
                <button type="submit" class="btn btn-warning" name="update">update data</button>
            </form>
        </div>

        <?php else : ?>

        <!-- tambah form -->
        <div class="card bg-primary w-25 p-3 text-white">
            <h3 class="text-center">tambah data</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="masukkan nama" required>
                </div>
                <div class="form-group">
                    <label for="">kota</label>
                    <input type="text" name="kota" id="nomor" class="form-control" placeholder="masukkan nama kota"
                        required>
                </div>
                <button type="submit" class="btn btn-success" name="tambah">tambah data</button>
            </form>
        </div>
        <?php endif; ?>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>