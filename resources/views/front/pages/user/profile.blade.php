@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')
		<section id="about" class="scroll-section root-sec padd-tb-100-30  grey lighten-5">
			<div class="container">
				<div class="row">
					<div class="clearfix ">




            <div class="col s12 m12 l4">
							<div class="card white lighten-3">
				        <div class="card-content grey-text">
									<div class="person-about">
		                @if(Auth::user()->id == $user->id)
		                  <h3 class="about-subtitle">Mon profil</h3>
		                @else
		                <h3 class="about-subtitle">{{$user->firstName}} {{$user->lastName}}</h3>
		                @endif
		                <p>{{$user->description}}</p>
									</div>
				        </div>
				      </div>
						</div>

            <div class="col s12 m6 l4">
							<div class="person-img center-align">
                @if($user->picLink==null)
                  <img src="../../images/profile/icon-{{$user->sexe}}.png" width="75%" class="responsive-img circle" alt="">
                @else
                  <img src="../../images/profile/{{$user->picLink}}" width="75%" class="responsive-img circle" alt="">
                @endif
							</div>
						</div>

            <div class="col s12 m6 l4">

							<div class="card white lighten-3">
				        <div class="card-content">
									<div class="person-info">
		                <h3 class="about-subtitle">Information personnelles</h3>
		                <h5><span>Nom :</span> {{$user->firstName}} {{$user->lastName}}</h5>
		                <h5><span>Note :</span>
											<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
											<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
											<i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i>
											<i class="mdi mdi-star-half icon-size yellow-text" aria-hidden="true"></i>
		                  <i class="mdi mdi-star-outline icon-size yellow-text" aria-hidden="true"></i>

		                </h5>
		                <h5><span>Age :</span> {{$age}} ans</h5>
		                <div class="about-social">
		                  <ul>
		                    <li>
		                      <a href="#" class="btn-floating waves-effect waves-light white"><i class="mdi mdi-facebook"></i></a>
		                    </li>
		                    <li>
		                      <a href="#" class="btn-floating waves-effect waves-light white"><i class="mdi mdi-twitter"></i></a>
		                    </li>
		                    <li>
		                      <a href="#" class="btn-floating waves-effect waves-light white"><i class="mdi mdi-google-plus"></i></a>
		                    </li>
		                    <li>
		                      <a href="#" class="btn-floating waves-effect waves-light white"><i class="mdi mdi-linkedin"></i></a>
		                    </li>
		                    <li>
		                      <a href="#" class="btn-floating waves-effect waves-light white"><i class="mdi mdi-pinterest"></i></a>
		                    </li>
		                  </ul>
		                </div>
		              </div>
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
            @if($user->vehiculeDefault)
            <div class="default-vehicule">
                <div class="col s12 m12 l6 offset-l3 black-text">
                  <h3 class="about-subtitle white-text center-align">Véhicule</h3>
                  <div class="col s12 m6 l6">
                    <h5 class="white-text center-align"><img style="width: 50%; " src="/images/vehicles/{{ $user->vehiculeDefault->vehiculetype->name }}.svg"></h5>
                  </div>
                  <div class="col s12 m6 l6">
                    <div class="person-info marg-top-15px">
                      <h5 class="white-text"><span>Marque :</span> {{ $user->vehiculeDefault->marque }}</h5>
                      <h5 class="white-text"><span>Modèle :</span> {{ $user->vehiculeDefault->modele }}</h5>
                    </div>
                  </div>
                </div>
            </div>
            @else
            <div class="default-vehicule center-align">
              <p>Ce membre n'a pas encore ajouté de véhicule...</p>
            </div>
            @endif
          </div>
      </div>
  </section>




@endsection
