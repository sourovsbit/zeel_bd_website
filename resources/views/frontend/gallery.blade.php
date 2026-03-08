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

    <!-- Gallery Section Start -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="row">
                @if($data)
                    @php $count = 0; @endphp
                    @foreach($data as $d)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 {{ $count >= 8 ? 'd-none extra-gallery' : '' }}">
                        <div class="gallery-card">
                            <div class="gallery-card__image">
                                <img src="{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}" alt="{{ $d->title }}">
                                <div class="gallery-card__overlay">
                                    <a href="javascript:void(0);" class="gallery-card__zoom" onclick="openImageModal('{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}', '{{ $d->title }}')">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="gallery-card__content">
                                <h5 class="gallery-card__title">{{ $d->title }}</h5>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                    @endforeach

                    <div class="col-lg-12">
                        <div class="load-more text-center mt-5">
                            <button id="loadMoreGallery" class="btn btn-outline-primary btn-lg">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Load More
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->

    <!-- Lightbox Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-transparent border-0 position-relative">
                <button type="button" class="close position-absolute" style="top: 10px; right: 15px; color: #fff; font-size: 2rem; z-index: 1051;" data-dismiss="modal" aria-label="Close">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#loadMoreGallery").click(function() {
                var btn = $(this);
                btn.prop('disabled', true);
                btn.find('.spinner-border').removeClass('d-none');

                setTimeout(function() {
                    $(".extra-gallery.d-none").slice(0, 8).removeClass("d-none").hide().fadeIn(400);
                    if ($(".extra-gallery.d-none").length === 0) {
                        btn.fadeOut();
                    } else {
                        btn.prop('disabled', false);
                        btn.find('.spinner-border').addClass('d-none');
                    }
                }, 300);
            });
        });

        function openImageModal(imageSrc, title) {
            $('#modalImage').attr('src', imageSrc);
            $('#modalTitle').text(title);
            $('#imageModal').modal('show');
        }
    </script>

    <style>
        .gallery-section {
            padding: 60px 0;
        }

        .gallery-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .gallery-card__image {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .gallery-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .gallery-card__image img {
            transform: scale(1.05);
        }

        .gallery-card__overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-card__overlay {
            opacity: 1;
        }

        .gallery-card__zoom {
            width: 45px;
            height: 45px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-size: 1.2rem;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }

        .gallery-card__zoom:hover {
            background: #007bff;
            color: #fff;
        }

        .gallery-card__content {
            padding: 15px;
            flex: 1;
        }

        .gallery-card__title {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 0;
            color: #333;
        }

        .btn-outline-primary {
            border-width: 2px;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s;
        }

        .btn-outline-primary:hover {
            background: #007bff;
            color: #fff;
        }

        .modal-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
@endsection
