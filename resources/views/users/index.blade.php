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
        <h5 class="card-header text-center">Create a Community</h5>
        <div class="card-body">
            <form method="post" action="{{ url('/posts') }}" enctype="multipart/form-data">
                @csrf
            <!-- Post Title -->
            <div class="mb-3">
              <label for="postTitle" class="form-label">Community Name</label>
              <input type="text" class="form-control" id="postTitle" name="text" placeholder="Make it Impressive!" />
            </div>
           
            <!-- File Upload -->
            <div class="mb-3">
              <label for="fileUpload" class="form-label">Upload Profile</label>
              <div class="file-upload-container">
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupFile01"><i class="bx bx-upload"></i></label>
                  <input type="file" class="form-control" id="inputGroupFile01" name="media" />
                </div>
                <img id="filePreview" class="file-preview" style="display: none;" alt="File Preview" />
              </div>
              <small class="text-muted">Supported formats: jpg, png, gif.</small>
            </div>

            <!-- URL Links -->
            <div class="mb-3">
              <label for="linkInput" class="form-label">External Links</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon14">https://example.com/</span>
                <input type="text" class="form-control" name="links" id="linkInput" placeholder="Add URL" aria-describedby="basic-addon14" />
              </div>
            </div>
              
            <!-- Submit Button -->
            <div class="mt-3 d-flex justify-content-between">
              <button type="reset" class="btn btn-outline-secondary">Clear</button>
              <button type="submit" class="btn btn-success">Lets go</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<<<<<<< Updated upstream
    <!--/ Header -->
=======
  </div>
>>>>>>> Stashed changes
</div>

@endsection