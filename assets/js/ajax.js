
    function hitungTotalGaji() {
      var input = document.getElementById("inputMataUang").value;
            var angkaTanpaPemisah = input.replace(/\./g, ''); // Hapus pemisah ribuan
            if (!isNaN(gaji) && !isNaN(percentjkk)) {
            var persentase = (parseFloat(angkaTanpaPemisah) * 0.10); // Hitung 10% dari angka
            // Tampilkan hasil perhitungan persentase
            var hasil = new Intl.NumberFormat({
                style: 'currency',
                currency: 'IDR'
            }).format(persentase);
            document.getElementById("hasilPersentase").textContent = hasil;
        }
        }
            var persentase = (parseFloat(angkaTanpaPemisah) * 0.10); // Hitung 10% dari angka

            

        
 