<?php
    function button($var="",$val="",$warna="",$icon="",$attbr="")
    {
        return <<<button
            <button type="submit" name="$var" value="$val" class="btn btn-$warna fw-bold shadow-sm" style="border:none; white-space: nowrap;" $attbr>
                <i data-lucide="$icon" style="width:18px" class="me-1"></i> $val
            </button>
        button;
    }

    function buttonhref($link="",$val="",$warna="",$icon="",$attbr="")
    {
        return <<<buttonhref
            <a href="$link" class="btn btn-$warna fw-bold py-2 shadow-sm" style="border:none;" $attbr>
                <i data-lucide="$icon" style="width:18px" class="me-1"></i> $val
            </a>
        buttonhref;
    }


    function AksiDropdown($li=[])
    {
        //0=jenis, 1=link, 2=icon, 3=Judul, 4=warna, 5=onclick
        $Arli = "";
        $hasil = "";
        foreach($li as $Arli)
        {
            switch($Arli[0])
            {
                case "hapus":
                    $hasil .= <<<a
                        <li>
                            <a href="#" class="dropdown-item small text-{$Arli[4]} bg-{$Arli[4]} bg-opacity-10"
                            data-bs-toggle="modal" 
                            data-bs-target="#modalHapus" 
                            onclick="{$Arli[5]}">
                                <i data-lucide="{$Arli[2]}" style="width: 16px;"></i> {$Arli[3]}
                            </a>
                        </li>
                    a;
                break;
                case "qr":
                    $hasil .= <<<a
                        <li>
                            <a href="#" class="dropdown-item small text-{$Arli[4]} bg-{$Arli[4]} bg-opacity-10"
                            data-bs-toggle="modal" 
                            data-bs-target="#modalCetakQR" 
                            onclick="{$Arli[5]}">
                                <i data-lucide="{$Arli[2]}" style="width: 16px;"></i> {$Arli[3]}
                            </a>
                        </li>
                    a;
                break;
                case "print":
                    $hasil .=<<<a
                        <li>
                            <a href="#" class="dropdown-item small" onclick="{$Arli[5]}">
                                <i data-lucide="{$Arli[2]}" style="width: 16px;"></i> {$Arli[3]}
                            </a>
                        </li>
                    a;
                break;
                case "hr":
                    $hasil.=<<<a
                        <li><hr class="dropdown-divider my-1"></li>
                    a;
                break;
                case "disabled":
                    $hasil.=<<<a
                        <li><a href="{$Arli[1]}" class="dropdown-item small pe-none"><i data-lucide="{$Arli[2]}" style="width: 16px;" tabindex="-1" aria-disabled="true"></i> {$Arli[3]}</a></li>
                    a;
                break;
                default :
                    $hasil .= <<<a
                        <li><a href="{$Arli[1]}" class="dropdown-item small"><i data-lucide="{$Arli[2]}" style="width: 16px;"></i> {$Arli[3]}</a></li>
                    a;
                break;
            }
        }
        
        return <<<aksi
            <div class="dropdown">
                <button class="btn btn-sm btn-light border shadow-sm" type="button" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'>
                    <i data-lucide="more-horizontal" style="width:16px"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="z-index: 9999;">
                    $hasil
                </ul>
            </div>
        aksi;
    }

    function PageHeader($Judul="",$JudulDeskripsi="",$Tambahan=""){
        echo <<<PageHeader
            <div class="row align-items-center mb-4 g-3">
                <div class="col-md-6">
                    <h4 class="fw-bold text-dark mb-0" style="letter-spacing: -0.5px;">$Judul</h4>
                    <p class="text-secondary small mb-0 mt-1">$JudulDeskripsi</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-2 justify-content-md-end">
                        $Tambahan
                    </div>
                </div>
            </div>
        PageHeader;
    }

    function PageContentTabel($th="",$tr="",$ketnum="",$li="")
    {
        echo <<<PageContent
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: #fff;">
                <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                        <table class="table table-premium mb-0 align-middle" style="border-collapse: collapse; white-space: nowrap;">
                
                            <thead class="bg-white border-bottom sticky-top" style="z-index: 10;">
                                <tr>
                                    $th
                                </tr>
                            </thead>

                            <tbody class="border-top-0">
                                
                                    $tr
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top py-3 px-4">
                     <div class="d-flex justify-content-between align-items-center">
                        $ketnum
                        <nav>
                            <ul class="pagination pagination-sm mb-0 gap-1">
                                $li
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        PageContent;
    }

    function PageContentForm($Konten)
    {
        echo <<<PageContent
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: #fff;">
                <div class="card-body p-4">
                    $Konten
                </div>
            </div>
        PageContent;
    }


    function modalHapus()
    {
        echo <<<m
            <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                        
                        <div class="modal-body text-center p-4">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger rounded-circle" style="width: 64px; height: 64px;">
                                    <i data-lucide="alert-triangle" style="width: 32px; height: 32px;"></i>
                                </div>
                            </div>

                            <h6 class="fw-bold text-dark mb-1">Yakin Data dihapus?</h6>
                            <p class="text-muted small mb-4">
                                Tindakan ini tidak dapat dibatalkan. Data akan hilang permanen dari sistem
                            </p>

                            <div class="d-grid gap-2">
                                <a href="#" id="btnLinkHapus" class="btn btn-danger fw-bold py-2 rounded-3 shadow-sm">
                                    Ya
                                </a>
                                
                                <button type="button" class="btn btn-light text-secondary fw-bold py-2 rounded-3" data-bs-dismiss="modal">
                                    Batal
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        m;
    }

    function modalQRCode()
    {
        echo <<<qr
            <div class="modal fade" id="modalCetakQR" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                        <div class="modal-header border-0 pb-0">
                            <h6 class="modal-title fw-bold">Cetak QR Code</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body text-center" id="areaCetak">
                            <div class="p-4 border border-2 rounded-3 mb-2 d-inline-block bg-white" style="border-style: dashed !important; border-color: #ccc;">
                                <div class="fw-bold text-uppercase small mb-3" style="letter-spacing: 1px;">INVENTARIS ASET</div>
                                
                                <div class="d-flex justify-content-center mb-2">
                                    <div id="qrcode"></div>
                                </div>
                                
                                <div class="mt-2">
                                    <span id="labelKode" class="d-block text-muted small" style="font-size: 0.75rem;"></span>
                                    <span id="labelNamaAset" class="d-block fw-bold text-dark" style="font-size: 0.85rem;"></span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer border-0 pt-0">
                            <button type="button" class="btn btn-primary w-100 rounded-3 fw-bold" onclick="printLabel()">
                                <i data-lucide="printer" class="me-1" style="width: 16px;"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        qr;
    }

    function dialogPrint()
    {
        echo <<<d
            <iframe id="frameCetak" name="frameCetak" style="display:none;"></iframe>
        d;
    }

    
    function inputPost($key, $default = '') {
        return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
    }

    function inputGet($key, $default = '') {
        return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
    }


    //Fungsi Alert
    function setAlert($Jenis = null, $Tambahan = null) {
        $daftar = [
            "LoginGagal"     => ["error", "Login Gagal", "Username atau Password salah!"],
            "LoginBerhasil"  => ["success", "Login berhasil", "Selamat Datang $Tambahan"],
            "SimpanBerhasil" => ["success", "Berhasil", "Data telah disimpan"],
            "SimpanGagal"    => ["error", "Gagal", "Data gagal disimpan"],
            "HapusBerhasil"  => ["success", "Terhapus", "Data berhasil dihapus"],
            "HapusGagal"     => ["warning", "Gagal Hapus", "Data tidak dapat dihapus"],
            "AktifBerhasil"     => ["success", "Berhasil", "Pengguna <b class=\"text-danger\">$Tambahan</b> telah diaktifkan, <br>kemudian lakukan reset password"],
            "NonAktifBerhasil"     => ["success", "Berhasil", "Pengguna <b class=\"text-danger\">$Tambahan</b> telah di non-aktifkan"],
        ];

        if (isset($daftar[$Jenis])) {
            // Simpan data array ke session
            $_SESSION['flash_alert'] = [
                'icon'  => $daftar[$Jenis][0],
                'title' => $daftar[$Jenis][1],
                'text'  => $daftar[$Jenis][2]
            ];
        }
    }

    //Menampilkan Alert
    function showAlert() {
        if (isset($_SESSION['flash_alert'])) {
            $data = $_SESSION['flash_alert'];
            $icon  = $data['icon'];
            $title = $data['title'];
            $text  = $data['text'];
            
            // Logika timer otomatis untuk sukses
            $timer = ($icon == 'success') ? "showConfirmButton: true," : "showConfirmButton: true, confirmButtonColor: '#3085d6',";

            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: '$icon',
                    title: '$title',
                    html: '$text',
                    $timer
                });
            </script>";

            // HAPUS SESSION SETELAH DITAMPILKAN
            unset($_SESSION['flash_alert']);
        }
    }

    //Alert Gagal
    function showAlert1($Jenis = null)
    {
        $daftar = [
            "SimpanGagal" => ["error", "Gagal!", "Data gagal disimpan"],
            "HapusGagal"  => ["warning", "Gagal Hapus", "Data tidak dapat dihapus"],
            "ResetBerhasil"  => ["success", "Berhasil", "Password telah diperbaharui"],
            "ResetGagal"     => ["warning", "Reset", "Password gagal diperbaharui"]

        ];

        // Cek apakah Jenis yang diminta ada di dalam daftar
        if (isset($daftar[$Jenis])) {
            // Ambil data dari sub-array berdasarkan kunci $Jenis
            $icon  = $daftar[$Jenis][0];
            $title = $daftar[$Jenis][1];
            $text  = $daftar[$Jenis][2];

            // Tentukan konfigurasi tombol/timer
            $config = ($icon == 'success') 
                    ? "showConfirmButton: true" 
                    : "showConfirmButton: true, confirmButtonColor: '#3085d6'";

            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: '$icon',
                        title: '$title',
                        text: '$text',
                        $config
                    });
                });
            </script>";
        }
    }

    function randomPassword($length = 10) {
        // Kumpulan karakter yang akan diacak
        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $shfl = str_shuffle($comb);
        $pwd  = substr($shfl, 0, $length);
        
        return $pwd;
    }   

    function AppKop($nama, $slogan, $alamat, $kontak, $logo_url) {
        return "
        <div style='display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 2px solid #f0f0f0; font-family: \"Inter\", sans-serif; color: #333;'>
            <div style='display: flex; align-items: center; gap: 20px;'>
                <div style='width: 60px; height: 60px; background: #f8f9fa; border-radius: 12px; display: flex; align-items: center; justify-content: center; overflow: hidden;'>
                    <img src='$logo_url' alt='Logo' style='width: 80%; height: auto;'>
                </div>
                <div>
                    <h1 style='margin: 0; font-size: 1.2rem; font-weight: 800; letter-spacing: -0.5px; color: #1a1a1a;'>$nama</h1>
                    <p style='margin: 0; font-size: 0.85rem; color: #6c757d; font-weight: 500;'>$slogan</p>
                </div>
            </div>

            <div style='text-align: right;'>
                <p style='margin: 0; font-size: 0.8rem; font-weight: 600; color: #1a1a1a;'>$alamat</p>
                <p style='margin: 4px 0 0 0; font-size: 0.75rem; color: #6c757d;'>$kontak</p>
            </div>
        </div>
        <div style='height: 4px; width: 100px; background: linear-gradient(90deg, #007bff, #6610f2) !important; margin-top: -2px; border-radius: 0 0 4px 4px;'></div>
        ";
    }


    function tgl_indo($tanggal) {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $pecahkan = explode('-', $tanggal);
        
        // $pecahkan[0] = Tahun, [1] = Bulan, [2] = Tanggal
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }


   function StatusPegawai($status, $kunci="") {
        if ($status == "1") {
            // Hijau Emerald - Modern & Clean
            $text = "Aktif";
            if($kunci != ""){
                $warna = "success";
                $icon = "check-circle-2";
            } else {
                $warna = "warning";
                $icon = "lock-keyhole";
            }
        } else {
            // Merah Rose - Elegant Muted
            $text = "Non-Aktif";
            $warna = "danger";
            $icon = "x-circle";
        }

        return "
            <span class='badge-soft bg-soft-$warna'>
                <i data-lucide='$icon' style='width: 14px; height: 14px; stroke-width: 3;'></i> $text
            </span>
        ";
    }


    function pageNumberShowing($counttotal="", $totalData="")
    {
        return <<<a
            <span class="text-muted small">Showing <strong>$counttotal</strong> of <strong>$totalData</strong> users</span>
        a;
    }

    function pageNumber($halamanAktif,$totalHalaman,$link)
    {
        
        $prevdisabled = ($halamanAktif <= 1) ? 'disabled' : '';
        $linkprev = $halamanAktif-1;
        $nextdisabled = ($halamanAktif >= $totalHalaman) ? 'disabled' : '';
        $linknext = $halamanAktif+1;
        for ($i = 1; $i <= $totalHalaman; $i++){
            if($halamanAktif == $i) {
                $halactive = "active";
                $warnatext = "bg-primary shadow-sm";
            } else {
                $halactive = "";
                $warnatext = "text-secondary";
            }

            $number .= "
                <li class='page-item $halactive'><a class='page-link border-0 $warnatext' href='?$link$i'>$i</a></li>
            ";
        }

        return <<<a
            <li class="page-item $prevdisabled"><a class="page-link border-0" href="?$link$linkprev">Prev</a></li>
            $number
            <li class="page-item $nextdisabled"><a class="page-link border-0" href="?$link$linknext">Next</a></li>
        a;
    }

?>
