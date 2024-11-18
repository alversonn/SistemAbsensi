@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@vite('resources/assets/js/html5-qrcode.min.js')
@vite('resources/assets/js/scan.js')
@endsection

@section('content')
<div class="row">
  <div class="col-xxl-12 mb-6 order-0">
    <div class="card">
      <div class="d-flex justify-content-center row">
        <div class="col-sm-12">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-center flex-column">
              <h5 class="card-title text-primary mb-3">Scan untuk memulai sesi!</h5>
              <div id="reader" class="w-50"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
