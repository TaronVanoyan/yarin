@extends('layouts.front')

@section('header')
    <div class="container">




        <!-- Page Top section start -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4"></div>
            <div class="col-lg-6 col-md-6 col-sm-4">
                <div class="container-top">
                    <p class="logo-up">
                        <button class="button-up-logo">הִתאָרְעוּת</button>
                    </p>
                    <div class="logo"><img src="{{asset('events/imgs/Clip_Group.png')}}" alt="vip"></div>
                    <p class="under-logo">
                        <img src="{{asset('events/imgs/down_logo.png')}}" alt="under-logo">
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">

            </div>
            <div class="col-xl-2"></div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <p></p>
                <div class="logo">

                </div>
            </div>
        </div>
        <!-- Page Top section end -->

        <!-- Menu section start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-sm">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navBar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item" data-toggle="modal" data-target="#event-modal">
                                    <span class="nav-link not-button" href="#"  > תזכורת להשתלמויות
                                        <img src="{{asset('events/imgs/bang.png')}}" alt="bang-image">
                                    </span>
                                </li>
                                <li class="nav-item"  id="toContact">
                                    <a class="" href="#">צור קשר</a>
                                </li>
                                <li class="nav-item" id="toVideo">
                                    <a class="" href="#">וידאו</a>
                                </li>
                                <li class="nav-item" id="toTeam">
                                    <a class="" href="#">מרצים</a>
                                </li>
                                <li class="nav-item" id="toCourse">
                                    <a class="" href="#">לוח השתלמויות</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Menu section end-->
    </div>
@endsection

@section("box-head")
    <!-- Section Head Start-->
    <div class="box-head">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="full-box-content"><span>לוח השתלמויות</span></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Head End-->
@endsection
@section("event-section")
    <!-- Event Section start-->
    <div class="container" id="course">
        <div class="carousel slider center">
            <!-- Select Months Section start-->
            <div class=''>
                <div class='single-item'>
                    <div class="nav-item">
                        <a >ינואר</a>
                        <span></span>
                    </div>
                    <div class="nav-item">
                        <a >דצמבר</a>
                        <span></span>
                    </div>
                    <div class="nav-item">
                        <a >נובמבר</a>
                        <span></span>
                    </div>
                    <div class="nav-item">
                        <a >אוקטובר</a>
                        <span></span>
                    </div>
                    <div class="nav-item">
                        <a>אוקטובר</a>
                        <span></span>
                    </div>
                    <div class="nav-item">
                        <a>אוקטובר</a>
                        <span></span>
                    </div>
                    <div class="nav-item">
                        <a>אוקטובר</a>
                        <span></span>
                    </div>
                </div>
            </div>
            <!-- Select Months Section end-->
        </div>
        @include("front.blocks.events.featured")
        @foreach($events as $event)
            @include("front.blocks.events.default",['event'=>$event])
        @endforeach
        <div class="row box black-box-two">
            <div class="left-side">
                <!-- Left side card start -->
                <div id="coll" class="left-side-inner collapse in">
                    <p class="box-date"><span>12.11.2017</span></p>
                    <p class="box-date-under"><span>ום שני, שעה 14:30 | בית הלל 10, תל-אבי</span></p>
                    <div class="middle-layer">
                        <div class="under-date-box">
                            <div class="inner-under-date-box">
                                <p ><span>תסרוקת?</span></p>
                                <p ><span>השתלמות מעשית</span></p>
                            </div>
                        </div>
                        <div >
                            <ul class="info-nav">
                                <li>
                                    <a >תסרוקת כלה</a>
                                </li>
                                <li>
                                    <a>תסרוקות אסופות</a>
                                </li>
                                <li>
                                    <a>תסרוקות אסופות</a>
                                </li>
                                <li>
                                    <a>תסרוקות אסופות</a>
                                </li>
                            </ul>
                            <ul class="fore-more-button">
                                <li>
                                    <a class="fore-more"> תסרוקות</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Left side card end -->

                <!--    Modal form  start -->
                <div class="row " >
                    <div class="col collapse" id="form-modal">
                        <p class="close-button">
                            <i class="fa fa-times-circle" data-toggle="collapse" data-target="#coll,#form-modal,#coll-one" aria-hidden="true"></i>
                        </p>
                        <div>
                            <div class="card card-body">
                                <div class="black-box-form">
                                    <h2>לקבלת פרטים נוספים</h2>
                                    <p>מלאי את פרטיך ונשוב אליך בהקדם</p>
                                    <form method="" action="" id="person-details">
                                        <div class="event-type">
                                            <p>
                                                <label for="details-name">*שם פרטי</label> <br>
                                                <input
                                                        type="text"
                                                        id="details-name"
                                                        name="details_name"
                                                        minlength="4"
                                                >
                                            </p>
                                            <p>
                                                <label for="details-lastName">שם משפחה</label> <br>
                                                <input
                                                        type="text"
                                                        id="details-lastName"
                                                        name="details_last"
                                                        minlength="4"
                                                >
                                            </p>
                                            <p>
                                                <label for="details-number">*טלפון נייד</label> <br>
                                                <input
                                                        type="text"
                                                        id="details-number"
                                                        name="details_number"
                                                        minlength="4"
                                                >
                                            </p>
                                            <p class="event-type-checkbox">
                                                <input
                                                        type="checkbox"
                                                        id="event-type-info"
                                                        name="feed_back"
                                                >
                                                <label for="event-type-info">שלח לי פרטי הגעה וחניונים</label>
                                            </p>
                                        </div>
                                        <div class="box-form-buttons">
                                            <p><button class="send-event">שליחה</button></p>
                                            <p><span>* שדה חובה</span></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    Modal form  end  -->

                <!-- Left side card start -->
                <div id="coll-one" class="left-side-inner collapse in">
                    <div class="white-layer">
                        <p>
                            <span>משך ההשתלמות</span><br>
                            <span>90 דקות</span>
                        </p>
                        <p>
                            <span>קהל יעד</span><br>
                            <span>מאפרים</span>
                        </p>
                        <p>
                            <span>עלות</span><br>
                            <span>149ש”ח</span>
                        </p>
                    </div>
                    <div class="white-layer white-layer-second">
                        <p></p>
                        <p></p>
                        <p>
                            <span>*ההשתלמות הינה ללא עלות לזכאים-
                                    לבדיקת זכאותך השאר פרטייך.
                            </span>
                            <button class="more-button" data-toggle="collapse" data-target="#coll,#form-modal,#coll-one">פרטים נוספים</button>
                        </p>
                    </div>
                </div>
                <!-- Left side card end -->
            </div>
            <div class="right-side">
                <div class="teacher-image">
                    <div class="teacher-image-container">
                        <img src="{{asset("events/imgs/girl_third.jpg")}}" alt="second-girl">
                        <p class="girl-box-down">
                            <span>טרנדים לקיץ 2019</span><br>
                            <span class="teacher-name-right">מיכל שיף</span>
                        </p>
                    </div>
                </div>
                <div class="event-title">
                    <p class="right-rotate-element">
                        <span>השתלמות מרצה סגל</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p class="further-button"><a>לעוד השתלמויות</a></p>
            </div>
        </div>
    </div>
    <!-- Event Section end-->
@endsection
@section("head-team")
    <!-- Section Head (Team) Start-->
    <div class="box-head team">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="full-box-content"><span>סגל המרצים</span></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Head End-->
@endsection

@section("teachers")
    <!-- Section Teachers Start-->
    <div id="team" class="container">
        <div class="team-container">
            @foreach($teacher_groups as $teachers)
            <div class="row team">
                @foreach($teachers as $teacher)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                    <div>
                        <p class="teach-image">
                            @include("common.img",['image'=>$teacher->thumbnail])
                        </p>
                        <p class="about-teacher">
                            <span class="teacher-name">{{$teacher->name}}</span> <br>
                            <span class="teacher-pos">{{$teacher->position}}</span>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    <!-- Section Teachers End-->
@endsection

@section("vieo-head")
    <!-- Section  Video Head Start-->
    <div class="box-head">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="full-box-content"><span>וידאו </span></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Video Head End-->
@endsection
@section("video-content")
    <!-- Section  Video Start-->
    <div id="video" class="video-slide">
        <div class="video-slide_cont">
            <div class="embed-responsive">
                <img src="{{asset("events/imgs/center.png")}}" alt="" class="embed-responsive-item">
                <!--<iframe class="embed-responsive-item" src=" "  frameborder="0" allowfullscreen> </iframe>-->
                <p class="video_title">
                    <span>26.05.17</span> <br>
                    <span> השתלמות “איפור לבנוני” - ג’יאהן עוואד</span>
                </p>
            </div>
            <div class="embed-responsive">
                <img src="{{asset("events/imgs/center.png")}}" alt="" class="embed-responsive-item">
                <p class="video_title">
                    <span>26.05.17</span> <br>
                    <span>כותרת סרטון</span>
                </p>
            </div>
            <div class="embed-responsive" >
                <img src="https://www.learningpotential.gov.au/sites/learningpotential/files/styles/article_image/public/2017/04/ps57-meeting-teachers.jpg?itok=hN_dLdeV" alt="" class="embed-responsive-item">
                <p class="video_title">
                    <span>26.05.17</span> <br>
                    <span>כותרת סרטון</span>
                </p>
            </div>
            <div class="embed-responsive" >
                <img src="https://img-s3.onedio.com/id-5759c771bd51023f7edca801/rev-0/raw/s-05f14ef349b7d46ab3f0fb0079435924e96486ce.jpg" alt="" class="embed-responsive-item">
                <p class="video_title">
                    <span>26.05.17</span> <br>
                    <span>כותרת סרטון</span>
                </p>
            </div>
            <div class="embed-responsive">
                <img src="http://c8.alamy.com/comp/J6JKFG/makeup-teacher-with-her-student-girl-makeup-tutorial-course-at-beauty-J6JKFG.jpg" alt="" class="embed-responsive-item">
                <p class="video_title">
                    <span>26.05.17</span> <br>
                    <span>כותרת סרטון</span>
                </p>
            </div>
            <div class="embed-responsive" >
                <img src="{{asset("events/imgs/center.png")}}" alt="" class="embed-responsive-item">
                <p class="video_title">
                    <span>26.05.17</span> <br>
                    <span>כותרת סרטון</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Section Video End-->
@endsection
@section('footer')
    <!-- Section  Footer Start-->
    <div id="contact" class="footer">
        <!-- Section  Video Head Start-->
        <div class="box-head">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2 class="full-box-content"><span>צור קשר </span></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Video Head End-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-small">
                    <div class="black-box-form">
                        <h3>מלאי את פרטיך ונשוב אליך בהקדם</h3>
                        <form id="message-form">
                            <div class="event-type">
                                <p>
                                    <label for="message-name">*שם פרטי</label>
                                    <input
                                            type="text"
                                            id="message-name"
                                            name="message_name"
                                    >
                                </p>
                                <p>
                                    <label for="message-last">שם משפחה</label>
                                    <input
                                            type="text"
                                            id="message-last"
                                            name="message_last"
                                    >
                                </p>
                                <p>
                                    <label for="message-number">*טלפון נייד</label>
                                    <input
                                            type="text"
                                            id="message-number"
                                            name="message_number"
                                    >
                                </p>
                            </div>
                            <div class="box-form-buttons">
                                <p><input type="submit" class="send-event" value="שליחה"></p>
                                <p><span>* שדה חובה</span></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-small">
                    <div class="footer-right-box">
                        <div class="box-contact">
                            <p>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>1700-50-60-80</span>
                            </p>
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>כתובת</span>
                            </p>
                        </div>
                        <div class="box-social">
                            <p class="social">
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </p>
                            <p class="box-social-bottom">
                                <a data-toggle="modal" data-target="#contact-modal">פרטי הגעה וחניונים</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Footer End-->
@endsection