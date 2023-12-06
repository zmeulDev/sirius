<!DOCTYPE html>
<html lang="en">

<head>

	<!-- PAGE TITLE HERE -->
	<title>{{ trans('panel.site_title') }} | {{ trans('global.home') }}</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="@yield('page_description', $page_description ?? '')"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png')}}">

    @stack('styles')

    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	
</head>
<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route("admin.home") }}" class="brand-logo">
				<div class="logo-abbr">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                    width="90.000000pt" height="90.000000pt" viewBox="0 0 500.000000 500.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
                    fill="#558b2f" stroke="none">
                    <path d="M2105 3151 c-22 -10 -53 -32 -70 -49 -49 -50 -705 -1167 -705 -1200
                    0 -16 9 -38 20 -50 l21 -22 742 0 c701 0 744 1 782 19 22 10 54 34 72 52 27
                    28 624 1025 684 1141 25 49 24 80 -4 106 l-23 22 -740 0 c-694 0 -741 -2 -779
                    -19z m415 -317 c63 -18 130 -51 130 -63 0 -5 -14 -39 -30 -76 -34 -75 -25 -73
                    -129 -30 -74 31 -167 43 -199 26 -22 -12 -30 -54 -14 -77 11 -18 60 -39 168
                    -73 64 -20 114 -43 139 -63 95 -79 100 -218 10 -304 -103 -99 -309 -107 -485
                    -19 -97 49 -98 50 -56 134 l36 70 49 -33 c63 -43 161 -76 223 -76 39 0 54 5
                    73 25 55 54 26 83 -137 136 -115 36 -138 48 -174 83 -71 70 -80 177 -23 257
                    67 94 251 130 419 83z m297 -588 c22 -19 28 -32 28 -66 0 -73 -67 -110 -134
                    -75 -33 16 -41 33 -41 81 0 75 88 111 147 60z"/>
                    </g>
                    </svg>
				</div>
				
				<div class="brand-title">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                    width="120.000000pt" height="120.000000pt" viewBox="0 0 442.000000 139.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,139.000000) scale(0.100000,-0.100000)"
                    fill="#558b2f" stroke="none">
                    <path d="M802 1334 c-29 -14 -63 -40 -76 -58 -23 -30 -648 -1081 -681 -1146
                    -17 -33 -13 -63 13 -92 14 -17 111 -18 1770 -18 1735 0 1756 0 1797 20 23 11
                    53 32 67 47 21 22 541 892 669 1119 35 61 37 106 7 134 -22 20 -24 20 -1768
                    20 l-1746 0 -52 -26z m697 -208 c90 -47 50 -186 -54 -186 -14 0 -39 13 -57 29
                    -27 24 -33 36 -33 71 0 35 6 47 33 71 36 32 69 36 111 15z m683 -15 c27 -24
                    33 -36 33 -71 0 -100 -135 -136 -181 -49 -26 51 -10 109 37 135 39 22 76 17
                    111 -15z m-971 -247 c30 -9 66 -23 81 -30 l28 -14 -32 -58 c-17 -31 -32 -58
                    -33 -59 0 -1 -29 9 -63 23 -60 24 -138 34 -161 20 -15 -10 -14 -41 3 -55 8 -6
                    56 -25 108 -41 70 -22 101 -37 125 -62 56 -58 66 -113 34 -185 -39 -86 -163
                    -129 -301 -105 -67 11 -161 50 -174 71 -7 11 45 123 54 118 127 -73 260 -87
                    260 -27 0 24 -18 34 -128 70 -135 45 -182 108 -160 216 10 49 59 99 114 119
                    53 19 179 18 245 -1z m329 -274 l0 -290 -90 0 -90 0 0 290 0 290 90 0 90 0 0
                    -290z m278 242 l3 -43 21 27 c25 31 91 63 131 64 l27 0 0 -79 0 -78 -52 -7
                    c-42 -6 -59 -14 -90 -45 l-38 -39 0 -166 0 -166 -95 0 -95 0 0 290 0 291 93
                    -3 92 -3 3 -43z m392 -242 l0 -290 -95 0 -95 0 0 283 c0 156 3 287 7 290 3 4
                    46 7 95 7 l88 0 0 -290z m250 138 c1 -172 9 -225 41 -250 27 -22 87 -23 118
                    -2 42 30 51 71 51 244 l0 161 93 -3 92 -3 3 -287 2 -288 -95 0 -95 0 0 41 0
                    41 -39 -35 c-97 -87 -249 -70 -319 36 l-27 40 -3 229 -3 228 90 0 91 0 0 -152z
                    m833 131 c91 -30 94 -36 62 -100 -15 -30 -28 -55 -30 -56 -1 -2 -28 8 -61 21
                    -53 22 -97 30 -146 27 -10 -1 -22 -10 -28 -20 -15 -29 9 -47 93 -72 132 -40
                    177 -73 196 -144 20 -79 -11 -147 -88 -189 -61 -33 -149 -43 -233 -26 -74 14
                    -168 57 -168 77 0 7 11 36 25 63 l25 49 64 -30 c73 -34 152 -47 184 -30 48 26
                    13 64 -82 92 -106 31 -154 62 -178 116 -38 86 -4 173 84 217 68 34 188 36 281
                    5z m252 -414 c54 -53 18 -155 -55 -155 -17 0 -40 5 -52 11 -26 14 -48 67 -41
                    102 12 63 102 89 148 42z"/>
                    </g>
                    </svg>
				</div>
				
                
           
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

		@include('elements.header')
        @include('elements.sidebar')

        <div class="content-body">
            <div class="container-fluid">
			    @yield('content')
            </div>
        </div>

        @stack('models')
        @include('elements.footer')
    </div>

    <!-- Global JS -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
</body>
</html>