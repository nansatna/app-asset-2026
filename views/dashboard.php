<?php 
        //untuk logout
        if($pg=='logout'){
            session_destroy();
            header('Location:index.php');
        } 
    
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $AppName ?></title>
    <link rel="icon" type="image/png" href="<?= $logoico ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <?php include('dashboard/sidebar.php') ?>

    <div class="main-content">
        
        <?php include('dashboard/header.php') ?>

        <div class="p-4 p-lg-5">
            
        <?php
        
            if($pg=='' && $fl==''){
                include('pages/beranda.php');
            }else if($pg=='' && $fl=='kpegawai'){
                include('pages/kpegawai.php');
            }else{
                include('pages/'.$pg.'/'.$fl.'.php');
            }
        ?>
       

        </div> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <?= showAlert(); ?>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/qr-code.js"></script>
    <script src="assets/js/aksi.js"></script>
</body>
</html>