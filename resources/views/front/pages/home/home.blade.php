@extends('layouts.app', [
    'menu_style' => 'scroll',
    'page_title' => 'DropZone - Ajout transport',
    'includesJs' => ['/js/components/datepicker.min.js', '/js/components/lightbox.min.js', '/js/components/accordion.min.js', '/js/scrollMenu.js'],
    'includesCss' => ['/css/components/datepicker.min.css', '/css/components/accordion.gradient.min.css']]
) @section('content')
<div id="accueil" class="landing_pages_item">
    COUCOU :D
</div>
<div id="expedition" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form">
            <fieldset data-uk-margin>
                <legend>Expedier un colis</legend>
                <div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
                <div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
                <div class="uk-form-row">
                    <input type="date" class='datePicker' placeholder="Date ramassage">
                </div>
                <div class="uk-form-row">
                    <select>
						<option>Oui</option>
						<option>Non</option>
					</select>
                </div>
                <div class="uk-form-row"><button class="uk-button uk-animation-shake uk-animation-hover">Valider</button></div>
            </fieldset>
        </form>
    </div>
</div>
<div id="transport" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form">
            <fieldset data-uk-margin>
                <legend>Proposer un transport</legend>
                <div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
                <div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
                <div class="uk-form-row">
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
<div id="recherche" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form">
            <fieldset data-uk-margin>
                <legend>Rechercher</legend>
                <div class="uk-form-row"><input type="text" placeholder="qsdqsd"></div>
                <div class="uk-form-row"><input type="password" placeholder="qsdqsd"></div>
                <div class="uk-form-row">
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