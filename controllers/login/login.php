<?php
    // echo password_hash('1234', PASSWORD_DEFAULT);
    //$2y$10$b4ImlfzP1zEibaoy8P5gNulF1kIhrAGDJ970an16lLaiqf0L9rDZu
    $user=$_POST['user']?? '';
    $pwd=$_POST['pwd'] ?? '';
    $tombol=$_POST['tombol'] ?? '';

    if($tombol)
    {
        
        $quser = selectData($koneksiku, 'pegawai', ['Username' => $user]);

        if(!empty($quser))
        {
            if(password_verify($pwd,$quser[0]['Sandi']))
            {
                $_SESSION['status']='OKE';
                header('Location:index.php'); 
            }
            else
            {
                $pesan = "Maaf password anda salah";
            }
            
        }
        else
        {
            $pesan = "Maaf username tidak ditemukan";
        }

        
    }
?>