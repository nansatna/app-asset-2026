<?php
    error_reporting(0);
    session_start();
    
    if(empty($_SESSION['Status']) || $_SESSION['Status'] !== 'OKE'){
        header("location:index.php");
        exit();
    }

    include("cores/database.php");
    include("cores/component.php");
    include("app-config.php");

    $pg = inputGet('pg'); //page
    $fl = inputGet('fl'); //file
    $ak = inputGet('ak'); //aksi

    include("controllers/pages/$pg/$fl.php");
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $AppNameShort . " - " .$JdCetak ?></title>
        <link rel="icon" type="image/png" href="images/<?= $logoico ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @media print {
                @page {
                    size: A4;
                    margin: 0;
                }
                body {
                    margin: 0;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
            }

            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap');
        </style>
    </head>
    <body>
        <script>
            // Saat iframe dimuat, ubah judul halaman utama (parent)
            window.onload = function() {
                window.parent.document.title = "<?= $AppNameShort . " - " .$JdCetak ?>";
            };
        </script>

        <div style="margin-left:30px;margin-right:30px">
            <?php  
                include("cetak/pages/$pg/$fl.php");
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    </body>
</html>