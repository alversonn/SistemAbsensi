import { Html5QrcodeScanner } from 'html5-qrcode';

// Inisiasi html5QRCodeScanner
let html5QRCodeScanner = new Html5QrcodeScanner('reader', {
  fps: 10,
  qrbox: {
    width: 250,
    height: 250
  }
});

// Function yang dieksekusi ketika scanner berhasil membaca QR Code
function onScanSuccess(decodedText, decodedResult) {
  console.log('Decoded text:', decodedText);
  console.log('Decoded result:', decodedResult);

  // Route Laravel untuk menerima data
  const url = '/api/absensi'; // Ganti dengan route Laravel Anda

  // Membuat objek FormData untuk mengirimkan data seperti form biasa
  let formData = new FormData();
  formData.append('scannedData', decodedText); // Data QR Code yang dikirim

  // Kirim data ke server menggunakan Fetch API dengan FormData
  fetch(url, {
    method: 'POST',
    body: formData // Form data dikirim langsung
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(result => {
      console.log('Response from server:', result);

      // Redirect jika server memberikan URL untuk diarahkan
      if (result.redirect_url) {
        location.href = result.redirect_url;
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });

  // Membersihkan scanner setelah QR dibaca
  html5QRCodeScanner.clear();
}

// Render scanner QR Code
html5QRCodeScanner.render(onScanSuccess);
