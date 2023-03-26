
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="csrf-token" content="9paYpvwyIMyIYq11AaayieqkqNTNli05XLlc0kRP">
    <meta name="app-url" content="//demo.activeitzone.com/ecommerce/">
    <meta name="file-base-url" content="//demo.activeitzone.com/ecommerce/public/">

    <title>Active eCommerce | Demo of Active eCommerce CMS</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Demo of Active eCommerce CMS" />
    <meta name="keywords" content="">

    
            <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Active eCommerce CMS">
        <meta itemprop="description" content="Demo of Active eCommerce CMS">
        <meta itemprop="image" content="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="Active eCommerce CMS">
        <meta name="twitter:description" content="Demo of Active eCommerce CMS">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg">

        <!-- Open Graph data -->
        <meta property="og:title" content="Active eCommerce CMS" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://demo.activeitzone.com/ecommerce" />
        <meta property="og:image" content="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" />
        <meta property="og:description" content="Demo of Active eCommerce CMS" />
        <meta property="og:site_name" content="Active eCommerce CMS" />
        <meta property="fb:app_id" content="">
    
    <!-- Favicon -->
    <link rel="icon" href="/uploads/icon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/vendors.css">
        <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/aiz-core.css">
    <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/custom-style.css"> --}}
    <link rel="stylesheet" href="/css/vendors.css">
    <link rel="stylesheet" href="/assets/css/aiz-core-v2.css">
    <link rel="stylesheet" href="/assets/css/custom-style.css">


    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }
    </script>

    <style>
        :root{
            --blue: #3490f3;
            --gray: #9d9da6;
            --gray-dark: #8d8d8d;
            --secondary: #919199;
            --soft-secondary: rgba(145, 145, 153, 0.15);
            --success: #85b567;
            --soft-success: rgba(133, 181, 103, 0.15);
            --warning: #f3af3d;
            --soft-warning: rgba(243, 175, 61, 0.15);
            --light: #f5f5f5;
            --soft-light: #dfdfe6;
            --soft-white: #b5b5bf;
            --dark: #292933;
            --soft-dark: #1b1b28;
            --primary: #d00906;
            --hov-primary: #D43533;
            --soft-primary: rgba(208,9,6,0.15);
        }
        body{
            font-family: 'Public Sans', sans-serif;
            font-weight: 400;
        }
        
        .pagination .page-link,
        .page-item.disabled .page-link {
            min-width: 32px;
            min-height: 32px;
            line-height: 32px;
            text-align: center;
            padding: 0;
            border: 1px solid var(--soft-light);
            font-size: 0.875rem;
            border-radius: 0 !important;
            color: var(--dark);
        }
        .pagination .page-item {
            margin: 0 5px;
        }

        .aiz-carousel.coupon-slider .slick-track{
            margin-left: 0;
        }

        .form-control:focus {
            border-width: 2px !important;
        }
        .iti__flag-container {
            padding: 2px;
        }

        #map{
            width: 100%;
            height: 250px;
        }
        #edit_map{
            width: 100%;
            height: 250px;
        }

        .pac-container { z-index: 100000; }
    </style>


</head>
<body>
    @yield('content')
    
</body>
</html>
