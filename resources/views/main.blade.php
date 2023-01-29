
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MakanCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="TemplatePresento/assets/img/favicon.ico" rel="icon">
  <link href="TemplatePresento/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="TemplateGP/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="TemplateGP/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="TemplatePresento/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp - v4.10.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div
                class="container d-flex align-items-center justify-content-lg-between"
            >
                <h1 class="logo me-auto me-lg-0">
                    <a href="/main">MakanCare<span>.</span></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="TemplateGP/assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li>
                            <a class="nav-link scrollto " href="#hero">Home</a>
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#clients">Partners</a>
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#about">About</a>
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#contact">Contact Us</a>
                        </li>
                        <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    @if(!Auth::user()->is_admin)
                            <li class="dropdown"><a href="/view-donation"><span>Your Donation</span> </a>
                                <!-- <ul>
                                <li><a href="#">Delete Food</a></li>
                                </ul> -->
                                @endif
                                <li><a href="#" onclick="logout()">Logout</a>
                                                    <script>
                                                        function logout() {
                                                        // add extra functionality or validation here
                                                            // then submit the form
                                                            document.getElementById('logout-form').submit();
                                                        }            
                                                    </script></a>
                                </li>
                            </li>
                            </ul>
                        </li>
                       
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->

                <a href="/googleMaps" class="get-started-btn scrollto">Maps</a>
            </div>
        </header>
        <!-- End Header -->

        
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<style>
    #header{
        background: #ffffff5e;
    }
</style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Makan Care</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="TemplatePresento/assets/img/favicon.ico" rel="icon">
  <link href="TemplatePresento/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="TemplatePresento/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="TemplatePresento/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="TemplatePresento/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Presento - v3.10.0
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
#hero {
 
  background: url("https://www.linkpicture.com/q/hero-bg2.jpg") top center no-repeat;
}</style>
<body>

  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>We care, we share. MakanCare is always there</h1>
          <h2>Find the nearest food bank at your location with MakanCare</h2>
          <a href="#about" class="btn-get-started scrollto">About Us</a>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="TemplatePresento/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"> </div>
          <div style="text-align: center;"> 
            <h2 class="Center-text">Meet Our Partners</h2> 
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch">
            <div class="content">
              <h3>What is MakanCare?</h3>
              <p>
                By using MakanCare, you can find the nearest foodbank to obtain foods and donate to nearest food bank.
              </p>
              <a href="#" class="about-btn"><span>Home</span> <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Vision</h4>
                  <p>Our company aims to solve the hunger issue that has been increasing due to high living cost and inflation</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Mission</h4>
                  <p>We are a team of students in Universiti Sains Malaysia who want to solve the hunger problem and food insecurity in the area</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Strategy</h4>
                  <p>By using our system, the community would be able to access the system where the process of food sharing would be much easier</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Values</h4>
                  <p>Integrity. Honesty. Accountability.</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Team</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="TemplatePresento/assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info text-center">
                <h4>Haziq Hizul</h4>
                <span>Back End Developer</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="TemplatePresento/assets/img/team/team-2.jpeg" class="img-fluid" alt="">
              </div>
              <div class="member-info text-center">
                <h4>Azrul Azree</h4>
                <span>Senior Software Engineer</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="TemplatePresento/assets/img/team/team-3.jpeg" class="img-fluid" alt="">
              </div>
              <div class="member-info text-center">
                <h4>Hafiz Jamal</h4>
                <span>Front End Developer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>If you have any inquiries or question, please reach us using information below.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Universiti Sains Malaysia 11800 USM Penang, Malaysia</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>makancareofficial@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+6010-7740311</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

  </main>
  <!-- End main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="TemplatePresento/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="TemplatePresento/assets/vendor/aos/aos.js"></script>
  <script src="TemplatePresento/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="TemplatePresento/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="TemplatePresento/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="TemplatePresento/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="TemplatePresento/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="TemplatePresento/assets/js/main.js"></script>

</body>
</html>