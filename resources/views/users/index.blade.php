@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet"
    href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
<link rel="stylesheet"
    href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}">
<style>
    .icon-lg {
        font-size: 2.8rem;
    }
</style>
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script src="{{ asset('assets/js/forms-selects.js') }}"></script>
<script src="{{ asset('assets/js/extended-ui-perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mt-4">
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="../../assets/img/avatars/14.png" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{$users->name}}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-calendar"></i> {{$users->created_at}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="../../assets/img/avatars/15.png"
                                height="100" width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2">Violet Mendoza</h4>
                                <span class="badge bg-label-secondary mt-1">Author</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-checkbox ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">1.23k</p>
                                <small>Total Post</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class="ti ti-briefcase ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">568</p>
                                <small>Total Community</small>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 small text-uppercase text-muted">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Email:</span>
                                <span>{{$users->email}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Status:</span>
                                <span class="badge bg-label-success">Active</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Role:</span>
                                <span>{{$users->role}}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                                data-bs-toggle="modal">Edit</a>
                            <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>

        <div class="col-xl-8 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
            
                    <form id="formChangePassword" action="{{ url('/change-password/{id}') }}" method="POST">
                        @csrf
                        <div class="alert alert-warning" role="alert">
                            <h5 class="alert-heading mb-2">Ensure that these requirements are met</h5>
                            <span>Minimum 8 characters long, uppercase & symbol</span>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="newPassword" name="newPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="confirmPassword"
                                        id="confirmPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Connected Communities -->
            <div class="card mb-4">
                <h5 class="card-header pb-1">Connected Communities</h5>
                <div class="card-body">
                    <p class="mb-4">Display content from your connected accounts on your site</p>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/google.png" alt="google" class="me-3"
                                height="38" />
                        </div>
                        <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                                <h6 class="mb-0">Google</h6>
                                <small class="text-muted">Calendar and contacts</small>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <div class="form-check form-switch">
                                    <input class="form-check-input float-end" type="checkbox" checked />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/github.png" alt="github" class="me-3"
                                height="38" />
                        </div>
                        <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                                <h6 class="mb-0">Github</h6>
                                <small class="text-muted">Manage your Git repositories</small>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <div class="form-check form-switch">
                                    <input class="form-check-input float-end" type="checkbox" checked />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/asana.png" alt="asana" class="me-3"
                                height="38" />
                        </div>
                        <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                                <h6 class="mb-0">Asana</h6>
                                <small class="text-muted">Communication</small>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <div class="form-check form-switch">
                                    <input class="form-check-input float-end" type="checkbox" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Connected Communities -->
        </div>
    </div>
</div>
@endsection