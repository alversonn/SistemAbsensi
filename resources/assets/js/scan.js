// inisiasi html5QRCodeScanner
import { Html5QrcodeScanner } from 'html5-qrcode';
let html5QRCodeScanner = new Html5QrcodeScanner(
  // target id dengan nama reader, lalu sertakan juga
  // pengaturan untuk qrbox (tinggi, lebar, dll)
  'reader',
  {
    fps: 10,
    qrbox: {
      width: 250,
      height: 250
    }
  }
);

// function yang dieksekusi ketika scanner berhasil
// membaca suatu QR Code
function onScanSuccess(decodedText, decodedResult) {
  // redirect ke link hasil scan
  // window.location.href = decodedResult.decodedText;

  console.log(decodedText + ' ' + decodedResult);

  // membersihkan scan area ketika sudah menjalankan
  // action diatas
  html5QRCodeScanner.clear();
}

// render qr code scannernya
html5QRCodeScanner.render(onScanSuccess);
