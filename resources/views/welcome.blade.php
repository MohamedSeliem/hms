<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Health Monitoring System</title>
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/responsiveslides.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
        <script>
            // You can also use "$(window).load(function() {"
                $(function () {
            
                  // Slideshow 1
                  $("#slider1").responsiveSlides({
                    maxwidth: 1800,
                    speed: 600
                  });
            });
          </script>

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!--start-header-->
            <div class="header">
                <div class="wrap">
                <!--start-logo-->
                <div class="logo">
                    <a href="index.html" style="font-size: 30px;"> Health Monitoring System</a>
                    <h3 style="font-size: 20px;"> We care about your Health.</h3>
                </div>
                <!--end-logo-->
                <!--start-top-nav-->
               @if (Route::has('login'))
                <div class="top-nav">

                    <ul>
                    @auth
                    <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li class="active"><a href="{{ route('login') }}">Login</a></li>
                        
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    </ul>                   
                </div>
                @endif
                <div class="clear"> </div>
                <!--end-top-nav-->
            </div>
            <!--end-header-->
        </div>
        <div class="clear"> </div>
           
                    <div class="image-slider">
                        <div class="wrap">
                        <!-- Slideshow 1 -->
                        <ul class="rslides" id="slider1" align="right">
                          <li><img src="images/slider-image4.jpg" alt="" >
                          </li>
                          <li><img src="images/slider-image1.jpg" alt="" ></li>
                          <li><img src="images/slider-image2.jpg" alt=""></li>
                          <li><img src="images/slider-image3.jpg" alt=""></li>
                        </ul>
                         <!-- Slideshow 2 -->
                         </div>
                    </div>
                    
         <div class="clear"> </div>
          <div class="content-grids">
                <div class="wrap">
                <div class="section group">
                                
                            
                <div class="listview_1_of_3 images_1_of_3">
                    <div class="listimg listimg_1_of_2">
                          <img src="images/grid-img3.png">
                    </div>
                    <div class="text list_1_of_2">
                          <h3>Patient </h3>
                          <p>Welcome to Patient Portal, 
                          </br>your medical home on the Web. 
                      </br>With Patient Portal, you can connect with your doctor through a convenient, safe, and secure environment.</p>
                    </div>
                </div>  

                <div class="listview_1_of_3 images_1_of_3">
                    <div class="listimg listimg_1_of_2">
                          <img src="images/grid-img1.png">
                    </div>
                    <div class="text list_1_of_2">
                          <h3>Doctor </h3>
                          <p>Using our exclusive Doctor Portal, your one-stop Web presence management tool, 
                          </br>you will have access to:
                           </br> Track new patient appointment requests
                           </br> View new patient appointment requests</p>
                          
                    </div>
                </div>


                    <div class="listview_1_of_3 images_1_of_3">
                    <div class="listimg listimg_1_of_2">
                          <img src="images/grid-img2.png">
                    </div>
                    <div class="text list_1_of_2">
                          <h3>Admin </h3>
                          <p>The admin portal allows for tenant management of HMS. It includes items such as  access to the admin center, and settings.Tenant management of HMS is done through the admin portal. </p>
                        
                     </div>
                </div>          
            </div>
            </div>
           </div>
           <div class="wrap">
           <div class="content-box">
           <div class="section group">
                <div class="col_1_of_3 span_1_of_3 first">
                <h3> Health Monitoring System (HMS)</h3>
                <p>Our goal is to provide Public Health officials with the tools that enhance their ability to safeguard the health of the communities they serve. Our Community Health Surveillance service, EpiCenter analyzes healthcare data in real time using a software-as-a-service approach.</p>
                </div>
                <div class="col_1_of_3 span_1_of_3 second">
                    <h3>No software</h3>
                    <p>No software to buy or look after. Just get online, sign up and you are up and running in 3 minutes. Access your monitoring anywhere 24/7/365. FREE and Tailored plans available.</p>
                </div>
                <div class="col_1_of_3 span_1_of_3 third">
                    <h3> Instant alert</h3>
                    <p>Take full control of your alerts. Set your triggers and get instant alerts via email, SMS, Twitter or phone whenever something is wrong. Our data center will alert you even if your network is down.</p>

                </div>
            </div>
           </div>
           </div>
           <div class="clear"> </div>

    </body>
</html>
