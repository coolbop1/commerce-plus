
<!doctype html>
<html lang="en">
<head>
	<meta name="csrf-token" content="qQmo9YcVdFUwnhQIqYfAFD6HgSLHz6bqWifKTNLS">
	<meta name="app-url" content="">
	<meta name="file-base-url" content="">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
    <link rel="icon" href="/uploads/icon.png">
	<title>Active eCommerce | Demo of Active eCommerce CMS</title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- aiz core css -->
	<link rel="stylesheet" href="/css/vendors.css">
    <link rel="stylesheet" href="/css/temp.css">
    <link rel="stylesheet" href="/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/aiz-seller.css') }}">
    <script src="/js/app.js"></script>

    <style>
        body {
            font-size: 12px;
        }
        #map{
            width: 100%;
            height: 250px;
        }
        #edit_map{
            width: 100%;
            height: 250px;
        }
        .pac-container{
            z-index: 100000;
        }

        .minimize {
            display: none;
        }

        .expand {
            display: block;
        }

        .rotate {
            -webkit-transform: rotate(+90deg);
            transform: rotate(+90deg);
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
    @yield('body')
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('assets/js/vendors.js') }}" ></script>
<script src="{{ asset('assets/js/aiz-core.js') }}" ></script>
<!-- delete Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">Are you sure to delete this?</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">Cancel</button>
                <a href="" id="delete-link" class="btn btn-primary mt-2 confirm-link">Delete</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
@include('aiz-uploader');
@if (isset($packages))
@include('payment-option-modal');
@endif
@if (isset($states))
    @include('confirm-order-modal')   
@endif


    <script type="text/javascript">
    AIZ.plugins.chart('#graph-1', {
        type: 'bar',
        data: {
            labels: [
                                ],
            datasets: [{
                label: 'Sales ($)',
                data: [
                                        ],

                backgroundColor: ['#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E',
                    '#2E294E'
                ],
                borderColor: ['#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E', '#2E294E',
                    '#2E294E'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#E0E0E0',
                        zeroLineColor: '#E0E0E0'
                    },
                    ticks: {
                        fontColor: "#AFAFAF",
                        fontFamily: 'Roboto',
                        fontSize: 10,
                        beginAtZero: true
                    },
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: "#AFAFAF",
                        fontFamily: 'Roboto',
                        fontSize: 10
                    },
                    barThickness: 7,
                    barPercentage: .5,
                    categoryPercentage: .5,
                }],
            },
            legend: {
                display: false
            }
        }
    });
</script>

<script type="text/javascript">
    

    if ($('#lang-change').length > 0) {
        $('#lang-change .dropdown-menu a').each(function() {
            $(this).on('click', function(e){
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('flag');
                $.post('https://demo.activeitzone.com/ecommerce/language',{_token:'qQmo9YcVdFUwnhQIqYfAFD6HgSLHz6bqWifKTNLS', locale:locale}, function(data){
                    location.reload();
                });

            });
        });
    }
    function menuSearch(){
        var filter, item;
        filter = $("#menu-search").val().toUpperCase();
        items = $("#main-menu").find("a");
        items = items.filter(function(i,item){
            if($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#'){
                return item;
            }
        });

        if(filter !== ''){
            $("#main-menu").addClass('d-none');
            $("#search-menu").html('')
            if(items.length > 0){
                for (i = 0; i < items.length; i++) {
                    const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
                    const link = $(items[i]).attr('href');
                        $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
                }
            }else{
                $("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">Nothing found</span></li>`);
            }
        }else{
            $("#main-menu").removeClass('d-none');
            $("#search-menu").html('')
        }
    }
</script>

</body>
</html>

