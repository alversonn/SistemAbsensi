@php
$width = $width ?? '100'; // Default lebar logo, ubah nilainya sesuai kebutuhan
$height = $height ?? 'auto'; // Tinggi logo, gunakan 'auto' agar proporsional
@endphp

<img
  src="{{ asset('assets/img/logo/smp.png') }}"
  width="{{ $width }}"
  height="{{ $height }}"
  alt="Logo SMP"
  style="display: block; max-width: 100%; height: auto;" />
