<?= $AppKop; ?>

<div style='padding: 0 1cm; font-family: \"Inter\", sans-serif; color: #333; line-height: 1.6;'>
    <div style='text-align: right; margin-bottom: 30px; font-size: 0.9rem;'>
        Subang, <?= tgl_indo(date('Y-m-d')) ?>
    </div>

    <div style='margin-bottom: 25px;'>
        <p style='margin: 0; font-weight: 700;'>Perihal: Pemberitahuan Kata Sandi Baru</p>
    </div>

    <p>Halo, <strong><?= $data['Nama'] ?></strong></p>
    <p>Sesuai dengan permintaan reset kata sandi atau pendaftaran akun baru Anda pada sistem kami, berikut adalah detail kredensial login Anda yang baru:</p>

    <div style='background: #f8f9fa; border-left: 4px solid #1a1a1a; padding: 20px; margin: 25px 0; border-radius: 4px;'>
        <table style='width: 100%; font-size: 0.95rem; border-collapse: collapse;'>
            <tr>
                <td style='width: 120px; padding: 5px 0; color: #666;'>Username</td>
                <td style='padding: 5px 0; color: #666;'>:</td>
                <td style='font-weight: 700;'><?= $data['Username'] ?></td>
            </tr>
            <tr>
                <td style='padding: 5px 0; color: #666;'>Password Baru</td>
                <td style='padding: 5px 0; color: #666;'>:</td>
                <td style='font-weight: 700; color: #d63384; font-family: monospace; font-size: 1.1rem;'><?= $pas ?></td>
            </tr>
        </table>
    </div>

    <div style='background: #fff4f4; border: 1px solid #f5c2c7; padding: 15px; border-radius: 8px; margin-bottom: 25px;'>
        <p style='margin: 0; font-size: 0.85rem; color: #842029;'>
            <strong>Penting:</strong> Demi keamanan akun Anda, segera ganti kata sandi sementara ini setelah Anda berhasil login pertama kali. Jangan membagikan informasi ini kepada siapapun.
        </p>
    </div>

    <p>Jika Anda tidak merasa melakukan permintaan ini, silakan hubungi tim IT Support kami segera.</p>

    <div style='margin-top: 50px;'>
        <p style='margin: 0;'>Hormat kami,</p>
        <p style='margin: 0; font-weight: 800; text-transform: uppercase; margin-top: 5px;'>Admin Sistem IT</p>
        <div style='margin-top: 10px; color: #999; font-size: 0.75rem;'>E-Generated Letter - No Signature Required</div>
    </div>
</div>