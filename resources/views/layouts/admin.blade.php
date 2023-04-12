
<!doctype html>
<html lang="en">
<head>
	<meta name="csrf-token" content="P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl">
	<meta name="app-url" content="//demo.activeitzone.com/ecommerce/">
	<meta name="file-base-url" content="//demo.activeitzone.com/ecommerce/public/">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="icon" href="/uploads/icon.png">
	<title>HUB-PLUS</title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- aiz core css -->
	<link rel="stylesheet" href="/css/vendors.css">
    <link rel="stylesheet" href="/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/aiz-core.css') }}">
    <script src="/js/app.js"></script>

    <style>
        body {
            font-size: 12px;
        }
    </style>
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

</head>
<body class="">
    @yield('content')
    @include('aiz-uploader');
</body>
</html>
