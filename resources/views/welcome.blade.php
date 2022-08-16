<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Larry - Personal template</title>

    <!-- Favicons -->

    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('back/css/style.css') }}" rel="stylesheet" media="screen">
    @isset($HomeSection)
        <style>
            .masthead {
                background: url('{{ asset($HomeSection->background_image) }}') 50% 0 no-repeat;
                background-size: cover;
            }
        </style>
    @endisset

</head>

<body>
    <div class="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <div id="layout" class="layout">

        <!-- Header -->

        <header id="top" class="navbar js-navbar-affix">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#layout" class="brand js-target-scroll">
                        <img class="brand-img-white" alt=""
                            src="@if (isset($HomeLogo->logo)) {{ asset($HomeLogo->logo) }} @else @endif"
                            width="50" height="auto">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#layout">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#reviews">Reviews</a></li>
                        <li><a href="#contacts">Contacts</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Home -->
        @if (isset($HomeSection))
            <main id="home" class="masthead masked" data-stellar-background-ratio="0.8">
                <div class="opener rel-1">
                    <div class="container">
                        <h1>Hi, i'm <br>{{ $HomeSection->title }}</h1>
                        <p class="lead-text wow fadeInUp">{{ $HomeSection->subTitle }} &amp; Freelancer</p>
                        <div class="control">
                            <a href="#request" class="btn wow fadeInUp" data-wow-delay="0.2s"
                                data-toggle="modal">Contact
                                me</a>
                        </div>
                    </div>
                </div>
            </main>
        @else
            <main id="home" class="masthead masked" data-stellar-background-ratio="0.8">
                <div class="opener rel-1">
                    <div class="container">
                        <h1>Hi, i'm <br>good</h1>
                        <p class="lead-text wow fadeInUp">nothing &amp; Freelancer</p>
                        <div class="control">
                            <a href="#request" class="btn wow fadeInUp" data-wow-delay="0.2s"
                                data-toggle="modal">Contact
                                me</a>
                        </div>
                    </div>
                </div>
            </main>
        @endif

        <!-- Content -->

        <div class="content">

            <!-- About  -->
            <section id="about" class="about section">
                <div class="container">
                    <div class="row-padding row-columns row">
                        <div class="col-padding column col-md-6 col-md-push-6">

                            <h2 class="section-title">
                                @if (isset($about))
                                    {{ $about->title }}
                                @else
                                    About me
                                @endif
                            </h2>
                            @if (isset($about))
                                <p>{{ $about->description }}</p>
                            @else
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos incidunt laboriosam vel
                                    quis ex, dolorum deleniti mollitia nemo sint asperiores? Voluptate ipsum, sint rerum
                                    inventore ullam eaque.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos incidunt laboriosam vel
                                    quis ex, dolorum deleniti mollitia nemo sint asperiores?</p>
                            @endif
                            @if (isset($about->aboutProgress))
                                @foreach ($about->aboutProgress as $i => $val)
                                    <div class="skills-bar">
                                        <div class="progress-bar-title">{{ $val->title }}</div>
                                        <div class="progress">
                                            <div class="progress-bar" data-width="{{ $val->percentage }}">
                                                <span>{{ $val->percentage }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="skills-bar">
                                    <div class="progress-bar-title">Design</div>
                                    <div class="progress">
                                        <div class="progress-bar" data-width="80">
                                            <span>80%</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="col-padding column col-md-6 col-md-pull-6">
                            <img alt="" class="img-responsive"
                                src="@if (isset($about->image_field)) {{ asset($about->image_field) }} @else @endif ">
                        </div>
                    </div>
                </div>
            </section>
            <!-- Resume -->

            <section id="resume" class="resume text-center  bgc-light section">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 col-md-offset-2">
                            <h2 class="section-titler">View my resume</h2>
                            <p class="lead-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do
                                eiusmod
                                tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                    <div class="section-buttons section-body-sm">
                        <a href="#" class="btn">Download CV</a>
                    </div>
                </div>
            </section>

            <!-- Services -->

            <section id="services" class="services section">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 col-md-offset-2">
                            <h2 class="section-title">
                                @if (isset($HomeService))
                                    {{ $HomeService->title }}
                                @else
                                    No title
                                @endif
                            </h2>
                            <p class="lead-text">
                                @if (isset($HomeService))
                                    {{ $HomeService->description }}
                                @else
                                    no record found
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row-columns row">
                            @if (isset($HomeService->images))
                                @foreach ($HomeService->images as $i => $val)
                                    <div class="column col-md-4">
                                        <img src="{{ asset($val->image) }}" width="40" height="auto"
                                            class="round" />
                                        <h4>{{ $val->title }}</h4>
                                        <p>{{ $val->subTitle }}</p>
                                    </div>
                                @endforeach
                            @else
                                <div class="column col-md-4">
                                    <i class="text-primary icon ion-speedometer"></i>
                                    <h4>Bootstrap 3x</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </section>

            <!-- Portfolio -->


            <section id="portfolio" class="portfolio bgc-light section">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 col-md-offset-2">
                            <h2 class="section-title">Recent Works</h2>
                        </div>
                    </div>
                    <ul class="filter">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        <li><a href="#" data-filter=".digital">Digital</a></li>
                        <li><a href="#" data-filter=".branding">Branding</a></li>
                        <li><a href="#" data-filter=".marketing">Marketing</a></li>
                        <li><a href="#" data-filter=".video">Video</a></li>
                    </ul>
                    <div class="isotope js-gallery">


                        @if (isset($recentWork))
                            @foreach ($recentWork as $val)
                                <div class="isotope-item {{ $val->type }} ">
                                    <a href="{{ asset($val->background_image) }}" title="Stationery Design">
                                        <figure class="showcase-item">
                                            <div class="showcase-item-thumbnail">
                                                <img alt="" src="{{ asset($val->background_image) }}" />
                                            </div>
                                            <figcaption class="showcase-item-hover">
                                                <div class="showcase-item-info">
                                                    <div class="showcase-item-category">{{ $val->title }}</div>
                                                    <div class="showcase-item-title">{{ $val->subTitle }}</div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="isotope-item digital">
                                <a href="{{ asset('back/img/portfolio/1.jpg') }}" title="Stationery Design">
                                    <figure class="showcase-item">
                                        <div class="showcase-item-thumbnail">
                                            <img alt="" src="{{ asset('back/img/portfolio/1.jpg') }}" />
                                        </div>
                                        <figcaption class="showcase-item-hover">
                                            <div class="showcase-item-info">
                                                <div class="showcase-item-category">Branding</div>
                                                <div class="showcase-item-title">Stationery Design</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <!-- Reviews -->

            <section id="reviews" class="reviews text-center section">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 col-md-offset-2">
                            <h2 class="section-title">
                                @if (isset($client))
                                    {{ $client->title }}
                                @else
                                    No record found
                                @endif
                            </h2>
                            <p class="lead-text">
                                @if (isset($client))
                                    {{ $client->subTitle }}
                                @else
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="review-carousel carousel">
                                @if (isset($client->clientReview))
                                    @foreach ($client->clientReview as $i => $val)
                                        <div class="review">
                                            <div class="text-center">
                                                <img alt="" class="img-circle"
                                                    src="{{ asset($val->image) }}" width="50" height="auto">
                                                <h3>
                                                    <h3>{{ $val->name }} </h3>
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <p>«{{ $val->review }}</p>
                                                    </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="review">
                                        <div class="text-center">
                                            <img alt="" class="img-circle" src="img/reviews/3.jpg">
                                            <h3>James Thornton</h3>
                                            <div class="col-md-6 col-md-offset-3">
                                                <p>«Design is the method of putting form and content together; there is
                                                    no
                                                    single definition. Design can be aesthetics</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Partners -->

            <section id="partners" class="partners text-center bgc-light section-sm">
                <div class="container">
                    <div class="row">
                        <div class="partners-carousel">
                            <div class="partner">
                                <img alt="" class="img-responsive center-block" src="img/partners/1.png">
                            </div>
                            <div class="partner ">
                                <img alt="" class="img-responsive center-block" src="img/partners/2.png">
                            </div>
                            <div class="partner">
                                <img alt="" class="img-responsive center-block" src="img/partners/1.png">
                            </div>
                            <div class="partner">
                                <img alt="" class="img-responsive center-block" src="img/partners/2.png">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contacts -->

            <section id="contacts" class="contacts section">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 col-md-offset-2">
                            <h2 class="section-title">Keep in touch</h2>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row-columns row">
                            <div class="column col-md-7">
                                <form class="form-request js-ajax-form">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="name" required
                                                placeholder="Name *">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" name="email" required
                                                placeholder="Email *">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn" data-text-hover="Submit">Send
                                                request</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="column col-md-4 col-md-offset-1">
                                <div class="contact-line">
                                    <div class="media-left">
                                        <i class="text-primary icon ion-ios-telephone"></i>
                                    </div>
                                    <div class="media-right">
                                        <h4>Phone</h4>
                                        +93 345 678 91 23
                                    </div>
                                </div>
                                <div class="contact-line">
                                    <div class="media-left">
                                        <i class="text-primary icon ion-android-pin"></i>
                                    </div>
                                    <div class="media-right">
                                        <h4>Address</h4>
                                        198 West 21th Street,<br> Suite 721 New York NY 10016
                                    </div>
                                </div>
                                <div class="contact-line">
                                    <div class="media-left">
                                        <i class="text-primary icon ion-email"></i>
                                    </div>
                                    <div class="media-right">
                                        <h4>Email</h4>
                                        larry@larry.com
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->

        <footer id="footer" class="footer text-center text-left-md bgc-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="social">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-pinterest"></a>
                            <a href="#" class="fa fa-youtube-play"></a>
                        </div>
                    </div>
                    <div class="col-md-7 text-right-md">
                        <div class="copy">
                            © 2017 Larry. All rights reserved by <a href="http://themeforest.net/user/murren20"
                                target="_blank">Murren20</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modals -->

    <div id="request" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal" aria-label="Close">&times;</span>
                    <h2 class="modal-title">Contact me</h2>
                </div>
                <div class="modal-body text-center">
                    <form class="form-request js-ajax-form">
                        <div class="row-fields row">
                            <div class="form-group col-field">
                                <input type="text" class="form-control" name="name" required
                                    placeholder="Name *">
                            </div>
                            <div class="form-group col-field">
                                <input type="email" class="form-control" name="email" required
                                    placeholder="Email *">
                            </div>
                            <div class="form-group col-field">
                                <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn" data-text-hover="Submit">Send request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals success -->

    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></span>
                    <h2 class="modal-title">Thank you</h2>
                    <p class="modal-subtitle">Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></span>
                    <h2 class="modal-title">Sorry</h2>
                    <p class="modal-subtitle"> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->

    <script src="{{ asset('back/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back/js/jquery.viewport.js') }}"></script>
    <script src="{{ asset('back/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('back/js/wow.min.js') }}"></script>
    <script src="{{ asset('back/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('back/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('back/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('back/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('back/js/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('back/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('back/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('back/js/interface.js') }}"></script>
</body>

</html>
