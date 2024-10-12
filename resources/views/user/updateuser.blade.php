<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Register</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/core.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/icon-font.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/style.css') }}" />
    

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{ asset('vendor/images/apple-touch-icon.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ asset('vendor/images/favicon-32x32.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ asset('vendor/images/favicon-16x16.png') }}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/core.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('vendor/styles/icon-font.min.css') }}"
		/>
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/style.css') }}" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
						<img src="{{ asset('vendor/images/deskapp-logo.svg') }}" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="register.html">Register</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="{{ asset('vendor/images/login-page-img.png') }}" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Update To DeskApp</h2>
							</div>
							
                            <form action="{{route('update',$user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" placeholder="Username"
                                        name="username" value="{{$user->username}}" />
    
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                  
                                </div>
                                <span style="color: red;">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                                
                                <div class="input-group custom">
                                    <input type="email" class="form-control form-control-lg" placeholder="Email"
                                        name="email" value="{{$user->email}}" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                   
                                </div>
                                <span style="color: red;">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" placeholder="Password"
                                        name="password" value="{{$user->password}}"/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <span style="color: red;">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
    
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" placeholder="Mobile Number"
                                        name="mobile" value="{{$user->mobile}}"/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <span style="color: red;">
                                    @error('mobile')
                                        {{ $message }}
                                    @enderror
                                </span>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                       
                                        <div class="input-group mb-0">
                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Register
                                                To Create Account</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<a
			href="https://github.com/dropways/deskapp"
			target="_blank"
			class="btn btn-success btn-sm mb-0 mb-md-3 w-100"
		>
			DOWNLOAD
			<i class="fa fa-download"></i>
		</a>
		<p class="font-14 text-center mb-1 d-none d-md-block">
			Available in the following technologies:
		</p>
		<div class="d-none d-md-flex justify-content-center h1 mb-0 text-danger">
			<i class="fa fa-html5"></i>
		</div>

		<!-- js -->
		<script src="{{ asset('vendor/scripts/core.js') }}"></script>
		<script src="{{ asset('vendor/scripts/script.min.js') }}"></script>
		<script src="{{ asset('vendor/scripts/process.js') }}"></script>
		<script src="{{ asset('vendor/scripts/layout-settings.js') }}"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
