@extends('layouts.admin')
@include('layouts.admin-side-bar-menu')
@include('layouts.admin-top-bar')
@include('admin-dashboard')

@section('content')

	<div class="aiz-main-wrapper">
        @yield('admin-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('admin-top-bar')
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">






                    @yield('admin-dashboard')





				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy;  v6.5.0</p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    

	<script src="https://demo.activeitzone.com/ecommerce/public/assets/js/vendors.js" ></script>
	<script src="https://demo.activeitzone.com/ecommerce/public/assets/js/aiz-core.js" ></script>

    <script type="text/javascript">
    AIZ.plugins.chart('#pie-1',{
        type: 'doughnut',
        data: {
            labels: [
                'Total published products',
                'Total physical products',
                'Total digital products'
            ],
            datasets: [
                {
                    data: [
                        <?php echo $published_products->count(); ?>,
                        <?php echo $published_products->where('is_digital', 0)->count(); ?>,
                        <?php echo $published_products->where('is_digital', 1)->count(); ?>
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#pie-2',{
        type: 'doughnut',
        data: {
            labels: [
                'Total stores',
                'Total warehoused stores',
                'Total offsite stores'
            ],
            datasets: [
                {
                    data: [
                        <?php echo $stores->count(); ?>,
                        <?php echo $stores->where('warehoused', 1)->count(); ?>,
                        <?php echo $stores->where('warehoused', 0)->count(); ?>
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Montserrat',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });
    AIZ.plugins.chart('#graph-1',{
        type: 'bar',
        data: {
            labels: [
                                'Women Clothing &amp; Fashion',
                                'Men Clothing &amp; Fashion',
                                'Computer &amp; Accessories',
                                'Automobile &amp; Motorcycle',
                                'Kids &amp; toy',
                                'Sports &amp; outdoor',
                                'Jewelry &amp; Watches',
                                'Cellphones &amp; Tabs',
                                'Beauty, Health &amp; Hair',
                                'Home Improvement &amp; Tools',
                                'Home decoration &amp; Appliance',
                                'Toy',
                                'Software',
                            ],
            datasets: [{
                label: 'Number of sale',
                data: [
                    19,46,13,1,5,10,5,7,1,0,0,0,2,
                ],
                backgroundColor: [
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                    ],
                borderColor: [
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                    ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
    AIZ.plugins.chart('#graph-2',{
        type: 'bar',
        data: {
            labels: [
                                'Women Clothing &amp; Fashion',
                                'Men Clothing &amp; Fashion',
                                'Computer &amp; Accessories',
                                'Automobile &amp; Motorcycle',
                                'Kids &amp; toy',
                                'Sports &amp; outdoor',
                                'Jewelry &amp; Watches',
                                'Cellphones &amp; Tabs',
                                'Beauty, Health &amp; Hair',
                                'Home Improvement &amp; Tools',
                                'Home decoration &amp; Appliance',
                                'Toy',
                                'Software',
                            ],
            datasets: [{
                label: 'Number of Stock',
                data: [
                    227965,54486,35230,6559,27029,990,3496,33997,5000,2500,0,30,-2,
                ],
                backgroundColor: [
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                    ],
                borderColor: [
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                    ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
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
                    $.post('https://demo.activeitzone.com/ecommerce/language',{_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl', locale:locale}, function(data){
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
    @endsection