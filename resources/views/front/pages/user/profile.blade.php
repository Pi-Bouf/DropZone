@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')






		<!-- About Section start -->
		<section id="about" class="scroll-section root-sec padd-tb-55 grey lighten-5 about-wrap">
			<div class="container">
				<div class="row">
					<div class="clearfix ">





            <div class="col-xs-12 col-sm-12 col-md-4">
							<div class="person-about">
								<h3 class="about-subtitle">Profil de {{$user->firstName}} {{$user->lastName}}</h3>
                  <p>{{$user->description}}</p>
							</div>
						</div>

            <div class="col-xs-12 col-sm-6 col-md-4">
							<div class="person-img wow fadeIn center-align">
                @if($user->picLink==null)
                  <img src="../../images/profile/icon-{{$user->sexe}}.png" width="75%" class="responsive-img circle" alt="">
                @else
                  <img src="../../images/profile/{{$user->picLink}}" width="75%" class="responsive-img circle" alt="">
                @endif
							</div>
						</div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="person-info">
                <h3 class="about-subtitle">Information personnelles</h3>
                <h5><span>Nom :</span> {{$user->firstName}} {{$user->lastName}}</h5>
                <h5><span>Note :</span>

                    <i class="fa fa-star fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-lg yellow-text" aria-hidden="true"></i>

                </h5>
                <h5><span>Age :</span> {{$age}} ans</h5>
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
      </div>
    </section>


    <section id="vehicule" class="scroll-section root-sec brand-bg padd-tb-60 team-wrap">
      <div class="container">
          <div class="row">
            @if($user->vehiculeDefault->marque)
            <div class="default-vehicule">
                <div class="col s12 m12 l6 offset-l3 black-text">
                  <h3 class="about-subtitle white-text center-align">Véhicule</h3>
                  <div class="col s12 m12 l6">
                    <h5 class="white-text center-align"><img style="width: 50%; margin-top:-75px; margin-bottom:-50px;" src="/images/vehicles/{{ $user->vehiculeDefault->vehiculetype->name }}.svg"></h5>

                  </div>
                  <div class="col s12 m12 l6">
                    <div class="person-info">

                      <h5 class="white-text"><span>Marque :</span> {{ $user->vehiculeDefault->marque }}</h5>
                      <h5 class="white-text"><span>Modèle :</span> {{ $user->vehiculeDefault->modele }}</h5>
                    </div>
                  </div>


                </div>



            </div>

            @else

            @endif
          </div>

      </div>
  </section>




@endsection
