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

  // Buat form dinamis
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = '/api/return'; // Endpoint Laravel untuk menerima data
  form.style.display = 'none'; // Sembunyikan form agar tidak terlihat

  // Tambahkan input untuk data hasil scan QR
  const qrInput = document.createElement('input');
  qrInput.type = 'hidden';
  qrInput.name = 'qr_data'; // Nama field yang diterima oleh Laravel
  qrInput.value = decodedText; // Data hasil scan
  form.appendChild(qrInput);

  // Tambahkan form ke body dan submit
  document.body.appendChild(form);
  form.submit();

  // Membersihkan scanner setelah QR dibaca
  html5QRCodeScanner.clear();
}

// Render scanner QR Code
html5QRCodeScanner.render(onScanSuccess);
