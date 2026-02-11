// Variabel global untuk menampung objek QR Code agar tidak double render
    var qrCodeObj = null;

    function generateQRCode(kode, nama) {
        // 1. Set Label Teks
        document.getElementById('labelKode').innerText = kode;
        document.getElementById('labelNamaAset').innerText = nama;

        // 2. Bersihkan QR Code lama (jika ada)
        var container = document.getElementById("qrcode");
        container.innerHTML = ""; 

        // 3. Buat QR Code Baru
        // Format: new QRCode(target_element, konfigurasi);
        qrCodeObj = new QRCode(container, {
            text: kode,           // Isi data QR Code (misal: ID Barang / URL)
            width: 128,           // Lebar (pixel)
            height: 128,          // Tinggi (pixel)
            colorDark : "#000000",// Warna Hitam
            colorLight : "#ffffff",// Warna Putih
            correctLevel : QRCode.CorrectLevel.H // Tingkat koreksi error (H = High)
        });
    }

    function printLabel() {
        var printContents = document.getElementById('areaCetak').innerHTML;
        var originalContents = document.body.innerHTML;

        // Tampilan saat Print
        document.body.innerHTML = `
            <div style="display:flex; justify-content:center; align-items:center; height:100vh; font-family: sans-serif;">
                <div style="text-align:center;">
                    ${printContents}
                </div>
            </div>
        `;

        window.print();

        // Kembalikan halaman normal
        document.body.innerHTML = originalContents;
        window.location.reload(); 
    }