@extends('layouts/layoutMaster')

@section('title', 'Create Post')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
@endsection

@section('page-style')
<!-- Page Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@endsection

@section('page-script')

@endsection

@section('content')

<div class="content-wrapper">
  <!-- Header -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-2 p-3">
        <h5 class="card-header text-center">Create a Commmunity</h5>
        <div class="card-body">
          <form>
            <!-- Community Name -->
            <div class="mb-3">
              <label for="postTitle" class="form-label">Community Name</label>
              <input type="text" class="form-control" id="postTitle" placeholder="What's on your mind?" />
            </div>
            
            <!-- Community Description -->
            <div class="mb-3">
              <label class="form-label" for="postDescription">Community Description</label>
              <textarea id="postDescription" class="form-control" rows="4" maxlength="255" placeholder="Share your thoughts..."></textarea>
              <small class="text-muted">Max 255 characters.</small>
            </div>
            
            <!-- File Upload -->
            <div class="mb-3">
              <label for="fileUpload" class="form-label">Upload Media</label>
              <div class="file-upload-container">
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupFile01"><i class="bx bx-upload"></i></label>
                  <input type="file" class="form-control" id="inputGroupFile01" />
                </div>
                <img id="filePreview" class="file-preview" style="display: none;" alt="File Preview" />
              </div>
              <small class="text-muted">Supported formats: jpg, png, gif.</small>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-3 d-flex justify-content-between">
              <button type="reset" class="btn btn-outline-secondary">Clear</button>
              <button type="submit" class="btn btn-success">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
