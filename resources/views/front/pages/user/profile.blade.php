@extends('layouts.app', [ 'menu_style' => 'scroll' ]) @section('content')
<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form">
            <fieldset data-uk-margin>
                <legend>Proposer un transport</legend>
                <div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
                <div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
                <div class="uk-form-row">
                  <p>Profil de {{$user->firstName}} {{$user->lastName}}</p>
                  <p>{{$user->description}}</p>
                    <select>
						<option>HEY</option>
						<option>HOY</option>
					</select>
                </div>

                <div class="uk-form-row"><button class="uk-button uk-button-primary uk-animation-shake uk-animation-hover">Valider</button></div>
            </fieldset>
        </form>
    </div>
</div>



@endsection
