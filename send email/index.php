<?php session_start(); ?>
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

    <style>
    body {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background: #642B73;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to top, #C6426E, #642B73);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to top, #C6426E, #642B73);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .card {
        background: rgba(0, 0, 0, 0);
    }

    .card .form-group,
    #exampleInputEmail1 {
        font-size: 12px;
    }
    </style>
</head>

<body>

    <!--- 2. modal hanya akan tampil setelah pesan terkirim dengan mengecek $_SESSION -->
    <?php if (isset($_SESSION["mailsent"])) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body text-center">
                    Pesan terkirim
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- hapus session -->
    <?php unset($_SESSION["mailsent"]); ?>
    <?php endif; ?>



    <div class="card w-25 p-3 rounded position-relative">
        <form action="send.php" method="post" class="d-flex flex-column justify-content-center" id="form">
            <div class="form-group">
                <label for="exampleInputEmail1" class="text-warning">Email Kamu</label>
                <input type="email" name="pengirim" class="form-control px-3" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <textarea name="pesan" id="pesan" class="w-100 py-2 px-3" rows="8" placeholder="Tulis pesanmu"
                    required></textarea>
            </div>
            <button id="kirim" type="submit" class="btn btn-warning btn-sm ml-auto" name="submit">kirim</button>
        </form>
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

    <script>
    //  1. menampilkan modal bootstrap secara default
    // yang kemudian hanya akan di tampilkan dengan keadaan tertentu melalui php
    $('document').ready(function() {
        $('#modal').modal('show');
    })
    </script>
</body>

</html>