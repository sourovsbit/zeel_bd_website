@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>

    <!-- Navbar End -->
    
    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0" style="background-image: url({{ asset('') }}assets/img/banner.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-dark mb-3 animated slideInDown"> Write a Review</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Review Start -->
    <div class="container-xxl">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="container mt-5 mb-5">
                <div class="review-container">
                    <h2 class="review-title">Write a Review</h2>
                    <form action="{{url('sendReview')}}" method="POST" id="review-data">
                        @csrf
                        <div class="mt-3">
                            <input class="form-control" name="name" id="name" placeholder="Write your name" type="text">
                        </div>
                        <div class="mt-3">
                            <select class="form-select" name="service_id" id="service_id">
                                <option value="">@lang('common.select_one')</option>
                                @if('services')
                                @foreach ($services as $s)
                                <option @if(old('service_id') == $s->id) selected @endif value="{{ $s->id }}">
                                    {{ $s->service_name }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mt-3">
                            <textarea class="form-control review-textarea" name="review" placeholder="Write your review here..."></textarea>
                        </div>
                        <div class="form-group col-lg-12 text-center pt-3">
                            <button type="submit" class="btn btn-success" id="submit">Send Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Review End -->

    @push('footer_scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function () {

// Handle form submission
$('#review-data').on('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Remove error highlights when typing
    $('#review-data input, #review-data textarea').on('keyup', function () {
        $(this).removeClass('is-invalid');
    });

    let name = $('#name').val().trim();
    let service_id = $('#service_id').val().trim();
    let review = $('#review').val().trim();

    // Validate required fields
    if (name === "") {
        $('#name').addClass('is-invalid');
        return;
    }
    if (service_id === "") {
        $('#service_id').addClass('is-invalid');
        return;
    }
    if (review === "") {
        $('#review').addClass('is-invalid');
        return;
    }

    // AJAX Request without loading spinner
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Fetch CSRF dynamically
        },
        url: '/sendReview', // Laravel route
        type: 'POST',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,

        success: function (response) {
            if (response == 1) {
                toastr.success("Review sent successfully!");
                $('#review-data')[0].reset(); // Reset form after success
            } else {
                toastr.error("Review submission failed. Please try again.");
            }
        },

        error: function (xhr) {
            toastr.error("An error occurred. Please try again later.");
            console.error(xhr.responseText); // Log errors for debugging
        }
    });
});

});


    </script>

    @endpush
    <!-- Main Content End -->
@endsection