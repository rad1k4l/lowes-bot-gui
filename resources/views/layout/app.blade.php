<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">

@yield("view_meta_tags")
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <link rel="apple-touch-icon" href="/user/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="/user/image/x-icon" href="/user/images/favicon/favicon-32x32.png">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/user/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendors/animate-css/animate.css">
    <link rel="stylesheet" type="text/css" href="/user/vendors/chartist-js/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendors/chartist-js/chartist-plugin-tooltip.css">
    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .debug {
            border-style: groove;
            border-color: red;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/user/css/themes/style.css">
    <link rel="stylesheet" type="text/css" href="/user/css/pages/user-profile-page.css">
    <link rel="stylesheet" type="text/css" href="/user/css/pages/dashboard-modern.css">
    <!-- END: Page Level CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/user/css/custom/custom.css">
    <!-- END: Custom CSS-->
</head>

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

@include("layout.header")
@include('layout.sidenav')


@yield("content")

@include("layout.footer")

</body>
</html>
