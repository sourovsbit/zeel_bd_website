@extends('frontend.layouts.master')

@section('content')
    @include('frontend.layouts.navbar')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Photo Gallery</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <style>
        .modal-img {
            width: 100% !important;
            height: auto !important;
        }
        #mainImage {
            width: 500px !important;
            height: 250px !important;
            display: block;
            margin: auto;
        }
    </style>

    <!-- Our Gallery Start -->
    <div class="container-xxl">
        <div class="container gallery">
            <div class="row">
                @if($data)
                    @php $count = 0; @endphp
                    @foreach($data as $d)
                    <div class="col-lg-3 col-md-6 col-sm-12 {{ $count >= 8 ? 'd-none extra-gallery' : '' }}">
                        <div class="gallery-item">
                            <img
                                src="{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}"
                                style="cursor: pointer;"
                                onclick="openImageModal('{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}', '{{ $d->title }}')"
                                data-toggle="modal"
                                data-target="#imageModal">
                            <p>{{ $d->title }}</p>
                        </div>
                    </div>
                    @php $count++; @endphp
                    @endforeach

                    <div class="col-lg-12">
                        <div class="loading-more text-center mt-4">
                            <i class="icon_loading"></i>
                            <a href="javascript:void(0);" id="loadMoreGallery">Loading More</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Our Gallery End -->

    <!-- Lightbox Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-transparent border-0 position-relative">

                <button type="button" class="close position-absolute"
                        style="top: 10px; right: 15px; color: #fff; font-size: 2rem; z-index: 1051;"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body text-center p-0">
                    <img id="modalImage" class="modal-img mx-auto d-block mb-2" alt="Gallery Image">
                    <h5 id="modalTitle" class="text-white"></h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Image Click Script -->
    <script>
        $(document).ready(function() {
            $("#loadMoreGallery").click(function() {
                $(".extra-gallery.d-none").slice(0, 8).removeClass("d-none").hide().fadeIn(400);
                if ($(".extra-gallery.d-none").length === 0) {
                    $("#loadMoreGallery").fadeOut();
                }
            });
        });

        function openImageModal(imageSrc, title) {
            $('#modalImage').attr('src', imageSrc);
            $('#modalTitle').text(title);
        }
    </script>

@endsection
