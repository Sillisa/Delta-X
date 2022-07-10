<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
		<title>DeltaX</title>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		{{-- bootstrap --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">	
		{{-- fonawsome --}}
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
		{{-- datatables --}}
		<link rel="stylesheet"
        href="{{ URL::asset('front/extras/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    	<link rel="stylesheet"
        href="{{ URL::asset('front/extras/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    	<link rel="stylesheet"
        href="{{ URL::asset('front/extras/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
				<a class="navbar-brand" href="{{ url('/') }}">DeltaX</a>
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">Home</a>
				  </li>
				</ul>
			  </nav>
		</header>
			@yield('content')
	
		<!-- jQuery -->
    	<script src="{{ URL::asset('front/extras/jquery/jquery.min.js') }}"></script>

    	<!-- jQuery UI 1.11.4 -->
    	<script src="{{ URL::asset('front/extras/jquery-ui/jquery-ui.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<!-- DataTables  & Plugins -->
		<script src="{{ URL::asset('front/extras/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ URL::asset('front/extras/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ URL::asset('front/extras/datatables-responsive/js/dataTables.responsive.min.js') }}">
		</script>
		<script src="{{ URL::asset('front/extras/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
		</script>
		<script src="{{ URL::asset('front/extras/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ URL::asset('front/extras/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>