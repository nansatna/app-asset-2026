function konfirmasiHapus(urlHapus) {
    // Cari tombol "Ya, Hapus" di dalam modal
    var tombolKonfirmasi = document.getElementById('btnLinkHapus');
    
    // Ubah attribute href menjadi url yang dikirim dari tabel
    tombolKonfirmasi.setAttribute('href', urlHapus);
}

function konfirmasiBatal(urlHapus) {
    // Cari tombol "Ya, Hapus" di dalam modal
    var tombolKonfirmasi = document.getElementById('btnLinkBatal');
    
    // Ubah attribute href menjadi url yang dikirim dari tabel
    tombolKonfirmasi.setAttribute('href', urlHapus);
}


function cetakDariFile(link) {
    const frame = document.getElementById('frameCetak');
    let fileTujuan = 'cetak.php?' + link;

    // Arahkan iframe ke file yang dipilih
    frame.src = fileTujuan;

    // Picu print setelah file selesai loading
    frame.onload = function() {
        if (frame.src !== "about:blank") {
            frame.contentWindow.focus();
            frame.contentWindow.print();
        }
    };
}