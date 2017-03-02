@extends('layouts.app', [ 'menu_style' => 'scroll', 'page_title' => 'DropZone - Accueil', 'includesJs' => [], 'includesCss' => []] ) @section('content')

<!-- Home Section start -->
<section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
    <div class="sec-overlay">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-inner">
                        <div class="center-align home-content">
                            <h1 class="home-title">Drop<span>Zone</span></h1>
                            <h2 class="home-subtitle">Transportez vos colis à moindre prix !</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .container end -->
        <div class="section-call-to-area">
            <div class="container">
                <div class="row">
                    <a href="#about" class="btn-floating btn-large button-middle call-to-about section-call-to-btn animated btn-up btn-hidden"
                        data-section="#about">
                        <i class="mdi-navigation-expand-more"></i>
                        </a>
                </div>
            </div>
            <!-- .container end -->
        </div>
    </div>
</section>
<!-- #home Section end -->

<!-- About Section start -->
<section id="about" class="scroll-section root-sec padd-tb-60 grey lighten-5 about-wrap">
    <div class="container">
        <div class="row">
            <div class="clearfix about-inner">

                <div class="col-sm-12 col-md-4">
                    <div class="person-about">
                        <h3 class="about-subtitle">My Story</h3>
                        <p>Hello, I’m a UI/UX Designer &amp; Front End Developer from Victoria, Australia. I hold a master degree
                            of Web Design from the World University. <br /> And scrambled it to make a type specimen book.
                            It has survived not only five centuries</p>
                    </div>
                </div>
                <!-- about me description -->

                <div class="col-sm-6 col-md-4">
                    <div class="person-img wow fadeIn">
                        <img class="z-depth-1" src="images/person.png" alt="">
                    </div>
                </div>
                <!-- about me image -->

                <div class="col-sm-6 col-md-4">
                    <div class="person-info">
                        <h3 class="about-subtitle">Personal Information</h3>
                        <h5><span>Name :</span> John Doe</h5>
                        <h5><span>Age :</span> 25 Years</h5>
                        <h5><span>Phone :</span> +0123456789</h5>
                        <h5><span>Email :</span> email@domain.com</h5>
                        <h5><span>Address :</span> Dhaka, Bangladesh</h5>
                    </div>

                    <div class="about-social">
                        <ul>
                            <li>
                                <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="team" class="scroll-section root-sec brand-bg padd-tb-120 team-wrap">
    <div class="container">
        <div class="row">

        </div>

    </div>
    <div class="section-call-to-area">
        <div class="container">
            <div class="row">
                <a href="#home" class="btn-floating btn-large button-middle call-to-home section-call-to-btn animated btn-up btn-hidden"
                    data-section="#home">
                    <i class="mdi-navigation-expand-less"></i>
                    </a>
            </div>
        </div>
    </div>
</section>

@endsection