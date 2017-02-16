@extends('layouts.app', [ 'page_title' => 'DropZone - Modification du profil', 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')

<div id="profile_update" class="landing_pages_item">
  <div class="landing_form">
      <form class="uk-form">
          <fieldset data-uk-margin>
              <legend>Modifier mon profil</legend>
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




@endsection
