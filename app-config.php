<?php
    //konfigurasi zona waktu
    date_default_timezone_set('Asia/Jakarta');

    //konfigurasi database
    $koneksiku = connectDB();

    //konfigurasi aplikasi
    $logo = "assets/images/logo.png";
    $logoico="assets/images/logo-ico.ico";
    $logofull="assets/images/logo-full.png";
    $AppName = "Smart Asset Management System";
    $AppNameShort = "Asetra";
    $AppSlogan = "Control Your Assets, Empower Your Organization";
    $AppAlamat = "Jl. Bagus Yabin No. 6, Cigadung -Subang";
    $AppEmail = "smkpas_sbg@yahoo.com";
    $AppTelp = "(0260) 411778";

    //kop surat
    $AppKop = AppKop($AppNameShort, $AppSlogan, $AppAlamat, "$AppEmail | $AppTelp", "$logo");

?>