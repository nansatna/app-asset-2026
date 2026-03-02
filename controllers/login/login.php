<?php

    $user=$_POST['user']?? '';
    $pwd=$_POST['pwd'] ?? '';
    $tombol=$_POST['tombol'] ?? '';

    if($tombol)
    {
        
        $quser = selectData($koneksiku, 'pegawai', ['Username' => $user]);

        if(!empty($quser))
        {
            if(password_verify($pwd,$quser['Sandi']))
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

    // $user=$_POST['user']?? '';
    // $pwd=$_POST['pwd'] ?? '';
    // $tombol=$_POST['tombol'] ?? '';

    // if($tombol){
    //     $_SESSION['status']='OKE';
    //     header('Location:index.php'); 
        // $quser = selectData($koneksiku, 'pegawai', ['Username' => $user]);

        // if (!empty($quser)) 
        // {
        //     $userData = $quser[0];

        //     if (password_verify($pwd, $userData['Sandi'])) 
        //     {
        //         $_SESSION['status']='OKE';
        //         header('Location:index.php'); 
        //         exit;
        //     } 
        //     else 
        //     {
        //         $error_message = "Password yang Anda masukkan salah.";
        //     }
        // } 
        // else 
        // {
        //     $error_message = "Username tidak terdaftar.";
        // }

       
    // }
?>