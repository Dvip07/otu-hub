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
<meta name="csrf-token" content="{{ csrf_token() }}">
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

<div class="container col-md-8">
    <!--creat post in  view post section-->


    <!-- Post Section -->
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-l me-2">
                    <span class="avatar-initial rounded-circle bg-info">pi</span>
                </div>
                <!-- User Info -->
                <div>
                    <h5 class="card-title mb-0">{{ $post->text }}</h5>
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
            @if ($post->media)
            <img class="card-img-bottom mb-3" src="{{ asset('storage/' . $post->media) }}" alt="Post image">
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

<script>
    // Toggle visibility
    if (commentSection.style.display === "none") {
        commentSection.style.display = "block";
        commentForm.style.display = "block";
    } else {
        commentSection.style.display = "none";
        commentForm.style.display = "none";
    }

    function likeFeature(postId, btnid) {
        $.ajax({
            url: "{{ route('like.post') }}",
            type: 'POST',
            data: {
                post_id: postId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status === 'liked') {
                    $('#' + btnid + ' i').removeClass('fa-regular fa-star').addClass('fa-solid fa-star');
                } else if (response.status === 'already_liked') {
                    $('#' + btnid + ' i').removeClass('fa-solid fa-star').addClass('fa-regular fa-star');
                } else if (response.status === '500') {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
</script>


@endsection