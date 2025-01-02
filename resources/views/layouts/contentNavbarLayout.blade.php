@extends('layouts/commonMaster' )

@php
/* Display elements */
$contentNavbar = true;
$containerNav = ($containerNav ?? 'container-xxl');
$isNavbar = ($isNavbar ?? true);
$isMenu = ($isMenu ?? true);
$isFlex = ($isFlex ?? false);
$isFooter = ($isFooter ?? true);

/* HTML Classes */
$navbarDetached = 'navbar-detached';

/* Content classes */
$container = ($container ?? 'container-xxl');

@endphp

@section('layoutContent')
<div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }}">
  <div class="layout-container">

    @if ($isMenu)
    @include('layouts/sections/menu/verticalMenu')
    @endif


    <!-- Layout page -->
    <div class="layout-page">
      <!-- BEGIN: Navbar-->
      @if ($isNavbar)
      @include('layouts/sections/navbar/navbar')
      @endif
      <!-- END: Navbar-->


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        @if ($isFlex)
        <div class="{{$container}} d-flex align-items-stretch flex-grow-1 p-0">
          @else
          <div class="{{$container}} flex-grow-1 container-p-y">
            @endif

            @yield('content')
            <div class="offcanvas offcanvas-end" tabindex="-1" id="editSidebar" aria-labelledby="editSidebarLabel">
              <div class="offcanvas-header">
                <h5 id="editSidebarLabel">Edit Data Siswa</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <form id="editForm">
                  <div class="mb-3">
                    <label for="edit-nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="edit-nisn" name="nisn" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="edit-nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="edit-nama" name="nama">
                  </div>
                  <div class="mb-3">
                    <label for="edit-status" class="form-label">Status</label>
                    <select class="form-select" id="edit-status" name="status">
                      <option value="Alpha">Alpha</option>
                      <option value="Hadir">Hadir</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
                </form>
              </div>
            </div>


          </div>
          <!-- / Content -->

          <!-- Footer -->
          @if ($isFooter)
          @include('layouts/sections/footer/footer')
          @endif
          <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    @if ($isMenu)
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    @endif
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  @endsection
