
<!DOCTYPE HTML>
<html>
    <head>
        <title>HMS | Contact us</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!--start-wrap-->
        
            <!--start-header-->
            <div class="header">
                <div class="wrap">
                <!--start-logo-->
                <div class="logo">
                    <a href="{{ url('/') }}" style="font-size: 30px;">Health Monitoring System</a>
                    <h3 style="font-size: 20px;">We care about your Health.</h3>
                </div>
                <!--end-logo-->
                <!--start-top-nav-->
                <div class="top-nav">
                    <ul>
                    @auth
                    <li class="active"><a href="{{ url('/user/dashboard') }}">Dashboard</a></li>
                    @else
                        <li class="active"><a href="{{ route('login') }}">Login</a></li>
                        
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    </ul>                   
                </div>
                <div class="clear"> </div>
                <!--end-top-nav-->
            </div>
            <!--end-header-->
        </div>
           <div class="clear"> </div>
           <div class="wrap">
            <div class="contact">
            <div class="section group">             
                <div class="col span_1_of_3">
                    
                <div class="company_address">
                        <h2>Health_Ultma  :</h2>
                                <p>200 Oak Crest Dr.,</p>
                                <p>Lafayette,LA 70503</p>
                                <p>USA</p>
                        <p>Phone:(+1) 337-381-4165</p>
                        <p>Fax: (000) 000 00 00 0</p>
                        <p>Email: <span>info@ultma.com</span></p>
                    
                   </div>
                </div>              
                <div class="col span_2_of_3">
                  <div class="contact-form" action="{{route('contact')}}" method="POST" role="form">
                    <h2>Contact Us</h2>
                    <!--action needed submit this forum to send an e-mail-->
                        <form>
                            <div class="field">
                                <span><label for="name" class="label">NAME</label></span>
                                <p class="control">
                                <span><input class="input {{$errors->has('name')?'is-danger':''}}" type="text" name="name" id="name" placeholder="Mohamed Seliem" value="{{old('name')}}"></span>
                                </p>
                                @if($errors->has('name'))
                                 <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <span><label for="email" class="label">E-MAIL</label></span>
                                <p class="control">
                                <span><input class="input {{$errors->has('email')?'is-danger':''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}"></span>
                                </p>
                                @if($errors->has('email'))
                                 <p class="help is-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <span><label for="mobile" class="label">MOBILE.NO</label></span>
                                <p class="control">
                                <span><input class="input {{$errors->has('mobile')?'is-danger':''}}" type="text" name="mobile" id="mobile" placeholder="337-338-1234" value="{{old('mobile')}}"></span>
                                </p>
                                @if($errors->has('mobile'))
                                 <p class="help is-danger">{{$errors->first('mobile')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <span><label for="subject" class="label">SUBJECT</label></span>
                                <span><textarea> </textarea></span>
                            </div>
                           <div>
                                <span><input type="submit" value="Submit"></span>
                          </div>
                        </form>
                    </div>
                </div>              
              </div>
                 <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
            </div>
          <div class="clear"> </div>
           <div class="footer">
             <div class="wrap">
            <div class="footer-left">
                    <ul>
                       <li><a href="{{ url('/') }}">Home</a></li>
                    </ul>
            </div>
          
            <div class="clear"> </div>
           </div>
           </div>
        <!--end-wrap-->
    </body>
</html>
