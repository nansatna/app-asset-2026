<?php
    $user = inputPost('user');
    $pwd = inputPost('pwd');
    $tombol = inputPost('tombol');

    if($tombol)
    {
        $QUser = selectData($koneksiku, 'pegawai', ['Username' => $user]);
        $DtUser = $QUser[0];

        if(!empty($QUser) && $QUser[0]['Username'] === $user)
        {
            if(password_verify($pwd,$DtUser['Sandi']))
            {
                $_SESSION['IdUser']=$DtUser['IdPegawai'];
                $_SESSION['Status']='OKE';
                setAlert("LoginBerhasil",$DtUser['Nama']);
                header('Location:index.php');
                exit();
            }
            else
            {
                setAlert("LoginGagal");
                header("Location: index.php");
                exit();
            }
            
        }
        else
        {
            setAlert("LoginGagal");
            header("Location: index.php");
            exit();
        }
    }
?>