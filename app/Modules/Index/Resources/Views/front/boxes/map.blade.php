<section id="fitness-map">

    @if( (!empty($disable_nav) && !$disable_nav) || empty($disable_nav) )
        <div class="map-nav d-flex justify-content-center align-items-center flex-column">
            <h3 class="header-1">
                @lang('index::front.map_locations_title')
            </h3>
            <button type="button"
                    class="btn btn-primary primary-color d-block d-sm-none"
                    data-toggle="collapse"
                    data-target="#destinations-list"
                    aria-expanded="false"
                    aria-controls="destinations-list">
                {{--@lang('blog::front.locations_dropdown_trigger')--}}
                @lang('index::front.locations_trigger_btn')
                <i class="fas fa-angle-down"></i>
            </button>

            <div id="destinations-list" class="destinations d-sm-block collapse">
                <div class="inner-wrapper d-flex flex-wrap justify-content-center align-items-stretch">
                    @foreach($cities as $city)
                        <button type="button" class="btn btn-primary primary-color btn-location @if($city == 'София' || $city == 'гр. София' || $city == 'Sofia') active @endif " data-city="{{ $city }}">
                            {{ $city }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if( Route::currentRouteName() == 'fitnesses.view' )
        <div class="header-1">
            {{ $fitness->title }}
        </div>
    @endif


    <div id="map"></div>
</section>


@if( empty($fitnesses) )
    {{ $fitnesses = $fitnesses_cache }}
@endif

@push('scripts')
    <script>
        function initMap() {
            var coordinates =  @if( empty($single_fitness) ) {lat: 42.700438, lng: 23.320175 }, @else { lat: {{ $fitness->lat }}, lng: {{ $fitness->lng }} }, @endif
                map = new google.maps.Map(document.getElementById('map'), {
                    center: coordinates,
                    zoom: 14,
                    disableDefaultUI: true,
                    zoomControl: true,
                    fullscreenControl: true,
                    styles: [
                        {
                            "featureType": "water",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#d3d3d3"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "stylers": [
                                {
                                    "color": "#808080"
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#b3b3b3"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "weight": 1.8
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#d7d7d7"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ebebeb"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#a7a7a7"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#efefef"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#696969"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#737373"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#d6d6d6"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {},
                        {
                            "featureType": "poi",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#dadada"
                                }
                            ]
                        }
                    ]
                })@if( empty($single_fitness) ),@else;@endif
                @if(empty($single_fitness))
                    bounds = new google.maps.LatLngBounds(),
                    initialCity = [],
                    geocoder = new google.maps.Geocoder(),
                    prev_infowindow = false,
                    fitnessesArr = [
                        @foreach($fitnesses as $fitness)
                            @if(!empty($fitness->city))
                                {
                                    title: '{{ $fitness->title }}',
                                    id: {{ $fitness->id }},
                                    city: '{{ $fitness->city }}',
                                    address: '{{ $fitness->address }}',
                                    url: '{{ route('fitnesses.view', ['slug' => $fitness->slug]) }}',
                                    coordinates: new google.maps.LatLng({{ $fitness->lat }}, {{ $fitness->lng }})
                                }@if(!$loop->last),@endif
                            @endif
                        @endforeach
                    ],
                    citiesArr = [
                        @foreach($cities as $city)
                            '{{ $city }}'@if(!$loop->last),@endif
                        @endforeach
                    ];
                @endif



            @if( empty($single_fitness) )

                // Loading the initial city variations from Config/website.php
                @foreach( config('website.initial_city') as $initialCity )
                    initialCity.push('{{ $initialCity }}');
                @endforeach

                for (var i = 0; i < fitnessesArr.length; i++) {
                    var fitness = fitnessesArr[i];
                    contentString = '<div class="map-info-window-holder">' +
                        '<a href="' + fitness.url + '" class="title">' + fitness.title + '</a>' +
                        '<span class="address">' + fitness.address + '</span>' +
                        '</div>';

                    fitness['infoWindow'] = new google.maps.InfoWindow({
                            content: contentString,
                            maxWidth: 300
                        });

                    fitness['marker'] = new google.maps.Marker({
                        position: fitness.coordinates,
                        icon: '{{ asset('assets/images/marker.png') }}',
                        map: map
                    });

                    google.maps.event.addListener(fitness.marker, 'click', (function (infoWindow, marker, i) {
                        return function () {
                            if ( prev_infowindow ) {
                                prev_infowindow.close();
                            }

                            prev_infowindow = infoWindow;
                            infoWindow.open(map, marker);
                        }
                    })(fitness.infoWindow, fitness.marker, i));

                    // Set boundaries to the default city -- Sofia
                    if ( initialCity.indexOf(fitness.city) >= 0 ) {
                        bounds.extend(fitness.coordinates)
                    }
                }

                if (fitnessesArr.length > 0) {
                    zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function (event) {
                        if (this.getZoom() > 14 && this.initialZoom == true) {
                            this.setZoom(14);
                            this.initialZoom = false;
                        }
                        google.maps.event.removeListener(zoomChangeBoundsListener);
                    });

                    map.initialZoom = true;
                    map.setCenter(bounds.getCenter());
                    map.fitBounds(bounds);
                }

                $('.view-on-map-trigger').on('click', function(e) {
                    e.preventDefault();
                    var self = $(this);

                    $('html, body').stop().animate({
                        'scrollTop': $('#fitness-map').offset().top - $('#header').height()
                    }, 900, 'swing');

                    for ( var f = 0; f < fitnessesArr.length; f++ ) {
                        if ( fitnessesArr[f].id == self.data().id ) {

                            if ( initialCity.indexOf(fitnessesArr[f].city) ) {

                                for (var p = 0; p < citiesArr.length; p++) {
                                    if (citiesArr[p] == fitnessesArr[f].city) {
                                        geocoder.geocode({'address': citiesArr[p]}, function (results, status) {
                                            if (status === 'OK') {
                                                map.setCenter(results[0].geometry.location);
                                            }
                                        });
                                    }
                                }
                            }

                            map.setCenter(fitnessesArr[f].coordinates);
                            fitnessesArr[f].infoWindow.open(map, fitnessesArr[f].marker)
                        }
                    }
                });

                $('.btn-location').on('click', function () {
                    var self = $(this);
                    var newBounds = new google.maps.LatLngBounds();

                    /* Visual highlights & animations */
                    self.addClass('active highlighted');
                    setTimeout(function () {
                        self.removeClass('highlighted');
                    }, 500);
                    $('.btn-location').not($(this)).removeClass('active');

                    for (var p = 0; p < citiesArr.length; p++) {
                        if (citiesArr[p] == self.data().city) {
                            geocoder.geocode({'address': citiesArr[p]}, function (results, status) {
                                if (status === 'OK') {
                                    map.setCenter(results[0].geometry.location);
                                } else {
                                    console.error('There seems to be a problem. Please, try refreshing your browser')
                                }
                            });
                        }
                    }

                    for (var m = 0; m < fitnessesArr.length; m++) {
                        if (fitnessesArr[m].city == self.data().city) {
                            newBounds.extend(fitnessesArr[m].coordinates);
                        }
                        fitnessesArr[m].infoWindow.close();
                    }

                    setTimeout(function () {
                        zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function (event) {
                            if (this.getZoom() > 14 && this.initialZoom == true) {
                                this.setZoom(14);
                                this.initialZoom = false;
                            }
                            google.maps.event.removeListener(zoomChangeBoundsListener);
                        });
                        map.initialZoom = true;
                        map.setCenter(newBounds.getCenter());
                        map.fitBounds(newBounds);
                    }, 200)
                });

            @else

                var infoWindow = new google.maps.InfoWindow({
                    content: '<div class="map-info-window-holder">' +
                            '<a href="{{ route('fitnesses.view', ['slug' => $fitness->slug]) }}" class="title">{{ $fitness->title }}</a>' +
                            @if(!empty($fitness->address))
                                '<span class="address">{{ $fitness->address }}</span>' +
                            @endif
                        '</div>',
                    maxWidth: 300
                });

                var marker = new google.maps.Marker({
                    position: coordinates,
                    icon: '{{ asset('assets/images/marker.png') }}',
                    map: map
                });

                $('.view-on-map-trigger').on('click', function(e) {
                    e.preventDefault();

                    $('html, body').stop().animate({
                        'scrollTop': $('#fitness-map').offset().top - $('#header').height()
                    }, 900, 'swing');

                    map.setCenter(coordinates);
                    infoWindow.open(map, marker)
                });

                google.maps.event.addListener(marker, 'click', (function (infoWindow, marker) {
                    return function () {
                        infoWindow.open(map, marker);
                    }
                })(infoWindow, marker));

            @endif
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{Settings::get('google_map_api_key')}}&callback=initMap" async defer></script>
@endpush
