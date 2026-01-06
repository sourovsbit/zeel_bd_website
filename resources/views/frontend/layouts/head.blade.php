<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $company->meta_description }}">
    <meta name="keywords" content="{{ $company->meta_tag }}">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('meta')

    <title>{{ $company->pinterest }}</title>

    <!-- Favicon -->
    @php
    $pathicon = public_path().'/backend/CompanyProfile/CompanyProfileIcon/'.$company->icon;
    @endphp
    @if(file_exists($pathicon))
    <link rel="icon" href="{{ asset('backend/CompanyProfile/CompanyProfileIcon') }}/{{ $company->icon }}" type="image/x-icon">
    @endif

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('') }}frontend/css/style.css" type="text/css">
</head>
