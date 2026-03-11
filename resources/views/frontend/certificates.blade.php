@extends('frontend.layouts.master')

@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar Start -->

    @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Certificates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Certificates Section Start -->
    <section class="certificates-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">Certificates</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @if (isset($data) && count($data) > 0)
                    @foreach ($data as $certificate)
                        <div class="col-lg-3 col-md-4 col-sm-6 p-3">
                            <div class="certificate-card text-center p-3 border rounded-3 shadow-sm h-100">
                                <img src="{{ asset('/backend/Certificates/CertificatesImage/' . $certificate->image) }}"
                                    alt="{{ $certificate->title }}" class="img-fluid mb-3 rounded-3"
                                    style="height: 200px; width: 100%; object-fit: cover; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                    onclick="showCertificateModal('{{ asset('/backend/Certificates/CertificatesImage/' . $certificate->image) }}', '{{ $certificate->title }}')">
                                <h5 class="fw-semibold">{{ $certificate->title }}</h5>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Certificate Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center p-0 position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <img id="modalImage" class="img-fluid rounded-3" alt="Certificate">
                    <h5 id="modalTitle" class="text-white mt-3"></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Certificates Section End -->
    <!-- Main Content End -->

    <script>
        function showCertificateModal(imageSrc, title) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').innerText = title;
        }
    </script>
@endsection
