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

<div class="container col-md-6">
    <!--creat post in  view post section-->
    <div class="container col-md-6">
        <!-- Create Post in View Post Section -->
        <div class="col-md-12 card p-3">
            <div class="row align-items-center">
                <!-- Avatar Section -->
                <div class="col-md-2 d-flex justify-content-center">
                    <div class="avatar avatar-l" style="width: 50px; height: 50px;">
                        <span class="avatar-initial rounded-circle bg-info d-flex justify-content-center align-items-center" style="width: 100%; height: 100%; font-size: 18px;">
                            pi
                        </span>
                    </div>
                </div>
                <!-- Input Field Section with Modal Trigger -->
                <div class="col-md-10">
                    <input
                      type="text"
                      class="form-control"
                      id="defaultFormControlInput"
                      placeholder="Share post"
                      aria-describedby="defaultFormControlHelp"
                      data-bs-toggle="modal"
                      data-bs-target="#editPostModal"
                      readonly>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editPostModalLabel">Create a Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Content of the modal (e.g., a form to create a post) -->
            <textarea class="form-control" rows="5" placeholder="Write something..."></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Post</button>
          </div>
        </div>
      </div>
    </div>
    
    
    
    

    
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
                        <button type="button" class="btn rounded-pill btn-secondary" onclick="openComment()">
                            <i class="ti ti-message"></i> Comment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Example Comments Section -->
            <div id="commentSection" class="comments fade-out" style="display: none;">
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
                    <button class="btn btn-primary d-flex send-msg-btn">
                      <i class="ti ti-send me-md-1 me-0"></i>
                    </button>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>

<script>
    function openComment() {
        const commentSection = document.getElementById("commentSection");
        const commentForm = document.getElementById("commentForm");

        // Toggle visibility
        if (commentSection.style.display === "none") {
            commentSection.style.display = "block";
            commentForm.style.display = "block";
        } else {
            commentSection.style.display = "none";
            commentForm.style.display = "none";
        }
    }
</script>


@endsection