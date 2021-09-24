@extends('layouts.master2')
@section('title')
    {{trans('front.website_name')}}
@endsection
@section('css')

    <!--- Internal Fontawesome css-->
    <link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!---Ionicons css-->
    <link href="{{URL::asset('assets/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <!---Internal Typicons css-->
    <link href="{{URL::asset('assets/plugins/typicons.font/typicons.css')}}" rel="stylesheet">
    <!---Internal Feather css-->
    <link href="{{URL::asset('assets/plugins/feather/feather.css')}}" rel="stylesheet">
    <!---Internal Falg-icons css-->
    <link href="{{URL::asset('assets/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <style>
        @if (App::getLocale() == 'ar')
            .main-front .front-main-header{
                right: 0;
            }
            .main-front .main-container{
                margin-right: -65px;
                margin-left: -15px;
            }
            .main-front .open-close-header{
                left: 10px;
            }
            .main-front #main-content{
            margin-right: 332px;
            }
        /* Extra small Media*/
        @media (max-width: 575.98px){
            .main-front #main-content{
                margin-right: 40px;
            }
        }
        /*Small Media*/
        @media (min-width: 576px) and (max-width: 767.98px) {
            .main-front #main-content{
                margin-right: 50px;
            }
        }
        /*Medium Media*/
        @media (min-width: 768px) and (max-width: 991.98px) {
            .main-front #main-content{
                margin-right: 50px;
            }
        }
        @else
            .main-front .front-main-header{
            left: 0;
        }
        .main-front .main-container{
            margin-left: -65px;
            margin-right: -15px;
        }
        .main-front .open-close-header{
            right: 10px;
        }
        .main-front #main-content{
            margin-left: 332px;
        }
        /* Extra small Media*/
        @media (max-width: 575.98px){
            .main-front #main-content{
                margin-left: 40px;
            }
        }
        /*Small Media*/
        @media (min-width: 576px) and (max-width: 767.98px) {
            .main-front #main-content{
                margin-left: 50px;
            }
        }
        /*Medium Media*/
        @media (min-width: 768px) and (max-width: 991.98px) {
            .main-front #main-content{
                margin-left: 50px;
            }
        }
        @endif
    </style>
@endsection
@section('content')
     <div class="main-front">

        <div class="container-fluid">
            <div class="open-close-header" >
                <span id="close-header" data-lang="{{App::getLocale()}}">
                    <i class="fas fa-times"></i>
                </span>
                <span id="open-header" data-lang="{{App::getLocale()}}">
                    <i class="fas fa-sliders-h"></i>
                </span>
            </div>
           <div class="main-container">
               <div class="" id="header-container">
                   <!-- Start header -->
                   <section class="front-main-header">
                       <div class="info">
                           <div class="img-now">
                               <img src="{{asset('public/assets/img/front/header.jpg')}}">
                           </div>
                           <div class="name">
                               {{trans('front.fullname_title')}}
                           </div>
                           <div class="social">
                               <a href="https://twitter.com/AhmedRa69538578" target="_blank" class="twitter" title="{{trans('front.twitter')}}">
                                   <i class="bx bxl-twitter"></i>
                               </a>
                               <a href="https://www.facebook.com/profile.php?id=100003975960360" target="_blank" class="facebook" title="{{trans('front.facebook')}}">
                                   <i class="bx bxl-facebook"></i>
                               </a>
                               <a href="https://www.instagram.com/ahmedrabi7/" target="_blank" class="instgram" title="{{trans('front.instgram')}}">
                                   <i class="bx bxl-instagram"></i>
                               </a>
                               <a href="mailto:rabidev2020@gmail.com" target="_blank" class="google" title="{{trans('front.google')}}">
                                   <i class="bx bxl-google"></i>
                               </a>
                               <a href="https://www.linkedin.com/in/ahmed-rabi-160139165/" target="_blank"  class="linkedin" title="{{trans('front.linkedin')}}">
                                   <i class="bx bxl-linkedin"></i>
                               </a>
                           </div>
                       </div>
                       <ul class="main-links-page">
                            <li>
                                <a href="#" class="go-sec" data-target="home">
                                    <i class="bx bx-home"></i>
                                    <span>{{trans('front.home')}}</span>
                                </a>
                            </li>
                           <li>
                               <a href="#" class="go-sec" data-target="about">
                                   <i class="bx bx-user"></i>
                                   <span>{{trans('front.about')}}</span>
                               </a>
                           </li>
                           <li>
                               <a href="#" class="go-sec" data-target="skills">
                                   <i class="fa bx bx-file-blank"></i>
                                   <span>{{trans('front.skills')}}</span>
                               </a>
                           </li>
                           <li>
                               <a href="#" class="go-sec" data-target="contact">
                                   <i class="bx bx-envelope"></i>
                                   <span>{{trans('front.contact')}}</span>
                               </a>
                           </li>
                       </ul>
                       <div class="link_lang">
                           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                   <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                       {{ $properties['native'] }}
                                   </a>
                           @endforeach
                       </div>
                       <div class="copyright">
                           &copy;{{trans('front.copyright')}} <span>{{trans('front.name_title')}}</span>
                       </div>
                   </section>
                   <!-- End header -->
               </div>
               <div class="" id="main-content">
                   <!-- Start Header Background -->
                   <section class="main-bg" id="home">
                       <div class="content-bg">
                           <div class="container">
                               <div class="info">
                                   <p class="name">{{trans('front.fullname_title')}}</p>
                                   <p class="job_title" id="type_job">
                                       {{trans('front.job_title')}}
                                   </p>
                               </div>
                           </div>
                       </div>
                   </section>
                   <!-- End Header Background -->
                   <!-- Start About -->
                   <section id="about">
                       <div class="container-fluid">
                           <h2 class="title-page">{{trans('front.about')}}</h2>
                           <p class="intro">
                                {{trans('front.intro_about')}}
                           </p>
                           <div class="row">
                               <div class="col-lg-3 col-md-4">
                                   <div class="profile">
                                       <img src="{{asset('public/assets/img/front/profile.jpg')}}">
                                   </div>
                               </div>
                               <div class="col-lg-9 col-md-8">
                                   <div class="right-side">
                                       <h3>{{trans('front.skills_title')}}</h3>
                                        <div class="info">
                                        <?php
                                        if(App::getLocale() == 'ar')
                                            {
                                                $arrow = "left";
                                            }
                                        else
                                            {
                                                $arrow = "right";
                                            }
                                        ?>
                                        <divc class="row">
                                            <div class="col-sm-6">
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.birthday')}}</strong>
                                                    <span>{{trans('front.birthday_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.faculty')}}</strong>
                                                    <span>{{trans('front.faculty_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.phone')}}</strong>
                                                    <span>{{trans('front.phone_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.city')}}</strong>
                                                    <span>{{trans('front.city_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.experience')}}</strong>
                                                    <span>+4</span>
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.age')}}</strong>
                                                    <span>{{trans('front.age_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.degree')}}</strong>
                                                    <span>{{trans('front.degree_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.email')}}</strong>
                                                    <span>{{trans('front.email_value')}}</span>
                                                </p><p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.freelance')}}</strong>
                                                    <span>{{trans('front.freelance_value')}}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-chevron-<?php echo $arrow;?>"></i>
                                                    <strong>{{trans('front.whatsapp')}}</strong>
                                                    <span>{{trans('front.whatsapp_value')}}</span>
                                                </p>
                                            </div>
                                        </divc>

                                    </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </section>
                   <!-- End About -->
                   <!-- Start skills -->
                   <section id="skills">
                       <div class="container-fluid">
                           <h2 class="title-page">{{trans('front.skills')}}</h2>
                           <p class="intro">
                               {{trans('front.intro_skills')}}
                           </p>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="block">
                                        <span class="name">PHP and SQL</span>
                                       <div class="progress-bar progress-bar-lg bg-info wd-95p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">95%</div>
                                   </div>
                                   <div class="block">
                                       <span class="name">Laravel</span>
                                       <div class="progress-bar progress-bar-lg bg-secondary wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                   </div>
                                   <div class="block">
                                       <span class="name">Ajax</span>
                                       <div class="progress-bar progress-bar-lg bg-primary wd-90p" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                   </div>
                                   <div class="block">
                                       <span class="name">JQuery</span>
                                       <div class="progress-bar progress-bar-lg bg-pink-gradient wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="block">
                                       <span class="name">HTML5</span>
                                       <div class="progress-bar progress-bar-lg bg-success wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                   </div>
                                   <div class="block">
                                       <span class="name">CSS3</span>
                                       <div class="progress-bar progress-bar-lg bg-purple wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                   </div>
                                   <div class="block">
                                       <span class="name">JavaScript</span>
                                       <div class="progress-bar progress-bar-lg bg-dark wd-90p" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                   </div>
                                   <div class="block">
                                       <span class="name">Bootstrap</span>
                                       <div class="progress-bar progress-bar-lg bg-danger-gradient wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </section>
                   <!-- End skills -->
                   <!-- Start Contact -->
                   <section id="contact">
                       <div class="container-fluid">
                           <h2 class="title-page">{{trans('front.contact')}}</h2>
                           <div class="row">
                               <div class="col-xl-5 col-xs-12">
                                   <div class="info">
                                       <div class="block">
                                          <div class="row">
                                              <div class="col-2">
                                                  <i class="fa fa-map-marker-alt"></i>
                                              </div>
                                              <div class="col-10">
                                                  <p class="name">{{trans('front.location')}}</p>
                                                  <span class="data">{{trans('front.city_value')}}</span>
                                              </div>
                                          </div>
                                       </div>
                                       <div class="block">
                                           <div class="row">
                                               <div class="col-2">
                                                   <i class="far fa-envelope"></i>
                                               </div>
                                               <div class="col-10">
                                                   <p class="name">{{trans('front.email')}}</p>
                                                   <span class="data">{{trans('front.email_value')}}</span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="block">
                                           <div class="row">
                                               <div class="col-2">
                                                   <i class="fas fa-mobile-alt"></i>
                                               </div>
                                               <div class="col-10">
                                                   <p class="name">{{trans('front.call')}}</p>
                                                   <span class="data">{{trans('front.phone_value')}}</span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="block">
                                           <div class="row">
                                               <div class="col-2">
                                                   <i class="fab fa-whatsapp"></i>
                                               </div>
                                               <div class="col-10">
                                                   <p class="name">{{trans('front.whatsapp')}}</p>
                                                   <span class="data">{{trans('front.whatsapp_value')}}</span>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="lang">
                                       <h2 class="title">{{trans('front.languages')}}</h2>
                                       <div class="box">
                                           <span class="name">{{trans('front.arabic')}}</span>
                                           <div class="progress-bar progress-bar-lg bg-success-gradient wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                       </div>
                                       <div class="box">
                                           <span class="name">{{trans('front.english')}}</span>
                                           <div class="progress-bar progress-bar-lg bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-xl-7 col-xs-12 ">
                                    <div class="form">
                                        <form onsubmit="return sendMessage(this)">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <label>{{trans('front.your_name')}}</label>
                                                    <input class="form-control" name="name">
                                                </div>
                                                <div class="col">
                                                    <label>{{trans('front.your_email')}}</label>
                                                    <input class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>{{trans('front.subject')}}</label>
                                                    <input class="form-control" name="subject">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>{{trans('front.message')}}</label>
                                                    <textarea name="message"></textarea>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="btn_contact" class="btn btn-primary">
                                                    {{trans('front.send_message_btn')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                               </div>
                           </div>
                       </div>
                   </section>
                   <!-- End Contact -->
                   <!-- Start Copyrights -->
                   <section class="copy">
                        <div class="container-fluid">
                            <p>
                                &copy; {{trans('front.end_copyright')}}
                            </p>
                        </div>
                   </section>
                   <!-- End Copyrights -->
               </div>
           </div>
        </div>
     </div>
@endsection
@section('js')
    <script>
        var i = 0;
        var speed = 50;
        var pixelMainContent;
        var job_title_id = document.getElementById("type_job");
        var job_title_words = job_title_id.innerHTML;
        job_title_id.innerHTML = "";
        var count = job_title_words.length;
        var lang = {!! json_encode(App::getLocale()) !!};

        function typeWriter() {
            if(i == count){
                i=0;
                job_title_id.innerHTML = "";
            }
            if (i < job_title_words.length) {
                job_title_id.innerHTML += job_title_words.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }
        typeWriter();
        $("#close-header").on('click',function () {
            $("#header-container").css('display','none');
            $("#open-header").css('display','block');
            $("#close-header").css('display','none');

            if(lang == 'ar'){
                $("#main-content").css('margin-right',pixelMainContent);
            }
            else
            {
                $("#main-content").css('margin-left',pixelMainContent);
            }
        })
        $("#open-header").on('click',function () {
            $("#header-container").css('display','block');
            $("#close-header").css('display','block');
            $("#open-header").css('display','none');
            if(lang == 'ar'){
                pixelMainContent =  $("#main-content").css("margin-right");
                $("#main-content").css('margin-right','332px')
            }
            else
            {
                pixelMainContent =  $("#main-content").css("margin-left");
                $("#main-content").css('margin-left','332px');
            }

        })
        $(document).on('click','.go-sec', function(event) {
            event.preventDefault();
            var target = "#" + this.getAttribute('data-target');
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1500);
        });
        function sendMessage(data) {
            var btn = document.getElementById("btn_contact");
            btn.disabled = true;
            var name  = data.name.value;
            var email  = data.email.value;
            var subject  = data.subject.value;
            var message  = data.message.value;
            var _token   = data._token.value;
            var fields = ["name", "email", "subject","message"];
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('sendMailToMe') }}",
                type: "POST",
                data:{
                    name:name,
                    email:email,
                    subject:subject,
                    message:message,
                    _token: _token
                },
                dataType: "json",
                success: function(result) {
                    btn.disabled = true;
                    location.href="thanks/contact";
                },
                error:function (err) {
                    btn.disabled = false;
                    console.log("result1 : "+err)
                    $.each(err.responseJSON.errors, function (i, error) {
                        fields.splice(fields.indexOf(i), 1);
                        var el = $(document).find('[name="'+i+'"]');
                        var sp = $(document).find('[id="'+i+'"]');
                        el.css('border-color','#ff0000');
                        el.after($('<span id="'+i+'" style="color: #ff0000;">'+error[0]+'</span>'));
                    });
                }
            });
            for(i=0;i<fields.length;i++){
                var el = $(document).find('[name="'+fields[i]+'"]');
                var sp = $(document).find('[id="'+fields[i]+'"]').remove();
                el.css('border-color','#069306');
            }
            return false;
        }
    </script>
@endsection
