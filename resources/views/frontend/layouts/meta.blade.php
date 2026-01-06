@section('meta')

    <!-- SEO Meta Tags -->

    <meta property="og:title" content="{{ $company->meta_title }}">
    <meta property="og:description" content="{{ $company->meta_description }}">
    <meta property="og:image" content="https://jfjelectricity.com//backend/CompanyProfile/CompanyProfileIcon/1610936015.png">
    <meta property="og:url" content="https://jfjelectricity.com/">
    <meta property="og:type" content="website">
    <meta name="keywords" content="{{ $company->meta_tag }}">


@endsection
