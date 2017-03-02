@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')






		<!-- About Section start -->
		<section id="about" class="scroll-section root-sec padd-tb-60 grey lighten-5 about-wrap">
			<div class="container">
				<div class="row">
					<div class="clearfix about-inner">

						<div class="col-sm-12 col-md-4">
							<div class="person-about">
								<h3 class="about-subtitle">My Story</h3>
                @if($user->picLink==null)
                  <img src="../../images/profile/icon-{{$user->sexe}}.png" class="uk-thumbnail uk-thumbnail-mini uk-border-circle" alt="">
                @else
                  <img src="../../images/profile/{{$user->picLink}}" class="uk-thumbnail uk-thumbnail-mini uk-border-circle" alt="">
                @endif
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
								<h5><span>Nom :</span> {{$user->firstName}} {{$user->lastName}}</h5>
                <h5><span>Note :</span>

                    <i class="fa fa-star fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o fa-lg yellow-text" aria-hidden="true"></i>
                    <i class="fa fa-star-o fa-lg yellow-text" aria-hidden="true"></i>

                </h5>
								<h5><span>Age :</span> {{$age}} ans</h5>
								<h5><span>Description :</span><br/> {{$user->description}}</h5>
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
        <div class="row">
          <div class="col-sm-12 col-md-12">
            @if($user->vehiculeDefault->marque)
              <img style="width: 30%; height: auto;" src="/images/vehicles/{{ $user->vehiculeDefault->vehiculetype->name }}.svg"><br/>
              <b>Marque: </b> {{ $user->vehiculeDefault->marque }}<br/>
              <b>Modèle: </b> {{ $user->vehiculeDefault->modele }}<br/>
            @else

            @endif
          </div>
        </div>
			</div>
		</section>



@endsection
