
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

        <!-- Template Stylesheet -->
        <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->



    <!-- Navbar & Hero Start -->
    <div class="container-fluid header position-relative overflow-hidden p-0">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand p-0">
                <h1 class="display-6 text-primary m-0">
                    <img class="me-2" src="{{ asset('frontend/img/logo.png')}}" alt="" width="80px"> 
                    Know Your Inventory
                </h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">KYI</a>
                    {{-- <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a> --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Learn about KYI</a>
                        <div class="dropdown-menu m-0">
                            @foreach($pages as $page)
                            <a href="{{ route('page.details', ['slug' => $page->slug] )}}" class="dropdown-item">{{$page->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
                @if(Auth::user())
                    <a href="{{ route('home') }}" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Profit Path</a>
                    <a href="{{ route('logout') }}" class="btn btn-primary rounded-pill text-white py-2 px-4" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Log In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill text-white py-2 px-4">Sign Up</a>
                    @endif
                @endif

                
            </div>
        </nav>


        <!-- Hero Header Start -->
        <div class="hero-header overflow-hidden px-5">
        </div>
        <!-- Hero Header End -->
    </div>
    <!-- Navbar & Hero End -->

        
    <section class=" section-padding" style="">
        <div class="container-fluid">
            @yield('avatar_content')
        </div>
    </section>
           
    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-dark mb-4">Company</h4>
                        <a href=""> Why Mailler?</a>
                        <a href=""> Our Features</a>
                        <a href=""> Our Portfolio</a>
                        <a href=""> About Us</a>
                        <a href=""> Our Blog & News</a>
                        <a href=""> Get In Touch</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Quick Links</h4>
                        <a href=""> About Us</a>
                        <a href=""> Contact Us</a>
                        <a href=""> Privacy Policy</a>
                        <a href=""> Terms & Conditions</a>
                        <a href=""> Our Blog & News</a>
                        <a href=""> Our Team</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Services</h4>
                        <a href=""> All Services</a>
                        <a href=""> Promotional Emails</a>
                        <a href=""> Product Updates</a>
                        <a href=""> Email Marketing</a>
                        <a href=""> Acquistion Emails</a>
                        <a href=""> Retention Emails</a>
                    </div>
                </div> --}}
                <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
                    <div class="footer-item text-center">
                        <h4 class="mb-4 text-dark">Contact Info</h4>
                        {{-- <a href=""><i class="fa fa-map-marker-alt me-2"></i> 123 Street, New York, USA</a> --}}
                        <a href="" class="mb-4"><i class="fas fa-envelope me-2"></i> info@profitpathkpi.com</a>
                        {{-- <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                        <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a> --}}
                        <div class="d-flex justify-content-center mt-4">
                            <i class="fas fa-share fa-2x text-secondary me-2"></i>
                            {{-- <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a> --}}
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                            {{-- <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a> --}}
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Know Your Inventory</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    Developed By <a class="border-bottom" href="https://nhtamim.top">NHT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- JAVASCRIPT FILES -->
    {{-- <script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script> --}}
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jqueryFloating.js')}}"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{ asset('frontend/js/jquery.sticky.js')}}"></script> --}}
    <!-- Include dom-to-image library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js')}}"></script>
    {{-- <script src="{{ asset('frontend/js/custom.js')}}"></script> --}}
    <script>let table = new DataTable('.dataTable');</script>
    {{-- <script>$(".overflow-panel").floatingScroll();</script>
     --}}
    <!-- Add this script section at the end of your Blade file -->
    <script>
        function printCard() {
            // Use dom-to-image to convert the card to an image
            domtoimage.toPng(document.querySelector('.print-card'))
                .then(function (dataUrl) {
                    // Create a new window to display the image
                    var printWindow = window.open('', '_blank');
                    printWindow.document.open();
                    printWindow.document.write('<html><head><title>Print</title></head><body>');
                    printWindow.document.write('<img src="' + dataUrl + '">');
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();

                    // Wait for the image to load before triggering print
                    printWindow.onload = function () {
                        printWindow.print();
                        printWindow.onafterprint = function () {
                            printWindow.close();
                        };
                    };
                })
                .catch(function (error) {
                    console.error('Error generating image:', error);
                });
        }
    </script>
    
    {{-- <style>
        .overflow-panel {
            overflow-x: auto;
            min-height: 0.01%;
            width: 600px;
            margin: 100px;
        }

        .wide-load {
            width: 800px;
            height: 800px;
            background-color: #f0f0f0;
        }


        .fl-scrolls {
            bottom:0;
            height:35px;
            overflow:auto;
            position:fixed;
        }
        .fl-scrolls div {
            height:1px;
            overflow:hidden;
        }
        .fl-scrolls div:before {
            content:"";
        }
        .fl-scrolls-hidden {
            bottom:9999px;
        }
    </style> --}}
</body>
</html>