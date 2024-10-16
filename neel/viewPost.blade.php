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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-chat.css') }}" />
    <style>
        .comment {
            padding: 10px;
            border-top: 1px solid #e0e0e0;
            margin-top: 5px;
        }

        .comment .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comment .comment-text {
            background-color: #f5f5f5;
            padding: 8px;
            border-radius: 10px;
            margin-bottom: 2px;
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
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>
    <script src="{{ asset('assets/js/app-chat.js') }}"></script>
@endsection

@section('content')

<div class="col-md-6 col-xl-4">
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-l me-2">
                    <span class="avatar-initial rounded-circle bg-info">pi</span>
                </div>
                <!-- User Info -->
                <div>
                    <h5 class="card-title mb-0">Post Title</h5>
                    <div>
                        <a href="#" class="community-link mt-1">Community Name</a>
                    </div>
                </div>
            </div>
            
            <p class="card-text mt-3">
                This is a wider card with supporting text below as a natural lead-in to additional content. This
                content is a little bit longer.
            </p>

            <small class="text-muted">Last updated 3 mins ago</small>
            <img class="card-img-bottom mb-3" src="../../assets/img/elements/1.jpg" alt="Card image cap" />
            <div class="mb-4 col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="text-start btn rounded-pill btn-icon btn-primary">
                            <span class="ti ti-star"></span>
                        </button>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn rounded-pill btn-secondary">
                            <i class="ti ti-message"></i> Comment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Example Comments Section -->
            <div class="comments">
                <div class="comment d-flex">
                    <img class="avatar" src="../../assets/img/avatars/1.png" alt="User Avatar" />
                    <div>
                        <div class="comment-text">This is an amazing post! Great job!</div>
                        <small class="text-muted">User1 - 5 mins ago</small>
                    </div>
                </div>

                <div class="comment d-flex">
                    <img class="avatar" src="../../assets/img/avatars/2.png" alt="User Avatar" />
                    <div>
                        <div class="comment-text">I love the content you've shared here!</div>
                        <small class="text-muted">User2 - 10 mins ago</small>
                    </div>
                </div>

                <div class="comment d-flex">
                    <img class="avatar" src="../../assets/img/avatars/3.png" alt="User Avatar" />
                    <div>
                        <div class="comment-text">Keep it up, looking forward to more posts like this.</div>
                        <small class="text-muted">User3 - 15 mins ago</small>
                    </div>
                </div>
            </div>

            <div class="chat-history-footer shadow-sm">
                <form class="form-send-message d-flex justify-content-between align-items-center">
                  <input
                    class="form-control message-input border-0 me-3 shadow-none"
                    placeholder="Type your message here" />
                  <div class="message-actions d-flex align-items-center">
                    <label for="attach-doc" class="form-label mb-0">
                      <i class="ti ti-photo ti-sm cursor-pointer mx-3"></i>
                      <input type="file" id="attach-doc" hidden />
                    </label>
                    <button class="btn btn-primary d-flex send-msg-btn">
                      <i class="ti ti-send me-md-1 me-0"></i>
                    </button>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>

@endsection

