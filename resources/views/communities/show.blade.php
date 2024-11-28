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
                            <img class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                                src="{{ asset($community->avatar) }}" alt="Community image">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ $community->name }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item d-flex gap-1">
                                            <i class="ti ti-calendar"></i>
                                            {{ $community->created_at->format('d M Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-2 mt-md-0 d-flex gap-2">
                                    <a href="" class="btn btn-primary rounded-2">Follow</a>
                                    <a href="{{ route('create-community-post', ['community' => $community->id]) }}" class="btn btn-secondary rounded-2">+ Create Post</a>
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
                <!-- Community Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                            <div class="d-flex align-items-start me-4 mt-3 gap-2">
                                <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-checkbox ti-sm"></i></span>
                                <div>
                                    <p class="mb-0 fw-medium">1.23k</p>
                                    <small>Total Posts</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mt-3 gap-2">
                                <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-users ti-sm"></i></span>
                                <div>
                                    <p class="mb-0 fw-medium">568</p>
                                    <small>Total Members</small>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-4 small text-uppercase text-muted">Community Details</h5>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-2 pt-1">
                                    <span class="fw-medium me-1">Email:</span>
                                    <span>contact@community.com</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-medium me-1">Status:</span>
                                    <span class="badge bg-label-success">Active</span>
                                </li>
                                {{-- <li class="mb-2 pt-1">
                                    <span class="fw-medium me-1">Category:</span>
                                    <span>Technology</span>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Community Card -->
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Posts Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Posts</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            {{-- @foreach ($community->posts as $post)
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ $post->user->avatar ? asset($post->user->avatar) : asset('assets/img/avatars/default-avatar.png') }}" alt="User Avatar" class="rounded-circle">
                                    </div>
                                    <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <h6 class="mb-0">{{ $post->user->name }}</h6>
                                            <p class="mb-0 opacity-75">{{ $post->text }}</p>
                                            @if ($post->media)
                                                <img class="card-img-bottom mt-2" src="{{ asset($post->media) }}" alt="Post image">
                                            @endif
                                        </div>
                                        <small class="opacity-50 text-nowrap">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </a>
                            @endforeach --}}
                            @foreach ($community->posts as $post)
                            <div class="mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-l me-2">
                                            <span class="avatar-initial rounded-circle bg-info">pi</span>
                                        </div>
                                        <!-- User Info -->
                                        <div>
                                            <h5 class="card-title mb-0">{{ $post->text }}</h5>
                                        </div>
                                    </div>
                        
                                    <p class="card-text mt-3">
                                        {{ $post->desc }}
                                    </p>
                        
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                    @if ($post->media)
                                    {{-- <img class="card-img-bottom mb-3" src="{{ asset('public/' . $post->media) }}" alt="Post image"> --}}
                                    <img class="card-img-bottom mb-3" src="{{ asset($post->media) }}" alt="Post image">
                        
                                    @else
                                    @endif
                                    <div class="mb-4 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" id="likeBtn-{{ $post->id }}"
                                                    class="text-start btn rounded-pill btn-icon btn-primary"
                                                    onclick="likeFeature('{{ $post->id }}',this.id)">
                                                    @if ($post->userHasLiked)
                                                    <i class="fa-solid fa-star"></i>
                                                    @else
                                                    <i class="fa-regular fa-star"></i>
                                                    @endif
                                                </button>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a type="button" class="btn rounded-pill btn-secondary"
                                                    href="{{ route('viewSinglePost', $post->id) }}">
                                                    <i class="ti ti-message"></i> Comment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
