@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => ['/js/components/accordion.min.js'], 'includesCss' => ['/css/components/accordion.gradient.min.css']] ) @section('content')

<div id="profile" class="landing_pages_item">
    <div class="landing_form">
        <form class="uk-form" method="post" action="{{ route('user_vehicule_add_post') }}">
            {{ csrf_field() }}
            <fieldset data-uk-margin>
                <legend style="color: #3498db">Ajout d'un véhicule</legend>
            </fieldset>
            <div class="uk-form-row">
                <label for="marque">Marque:</label>
                <input type="text" placeholder="Marque..." id="marque" name="marque" value="{{ old('marque') }}">
                @if ($errors->has('marque'))
                    <p class="uk-form-help-block">{{ $errors->first('marque') }}</p>
                @endif
            </div>
            <div class="uk-form-row">
                <label for="modele">Modele:</label>
                <input type="text" placeholder="Modele..." id="modele" name="modele" value="{{ old('modele') }}">
                @if ($errors->has('modele'))
                    <p class="uk-form-help-block">{{ $errors->first('modele') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <label for="longMax">Longueur Max. (cm):</label>
                <input type="number" step="any" placeholder="Longueur maximum..." id="longMax" name="longMax" value="{{ old('longMax') }}">
                @if ($errors->has('longMax'))
                    <p class="uk-form-help-block">{{ $errors->first('longMax') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <label for="hautMax">Hauteur Max. (cm):</label>
                <input type="number" step="any" placeholder="Hauteur maximum..." id="hautMax" name="hautMax" value="{{ old('hautMax') }}">
                @if ($errors->has('hautMax'))
                    <p class="uk-form-help-block">{{ $errors->first('hautMax') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <label for="largMax">Hauteur Max. (cm):</label>
                <input type="number" step="any" placeholder="Largeur maximum..." id="largMax" name="largMax" value="{{ old('largMax') }}">
                @if ($errors->has('largMax'))
                    <p class="uk-form-help-block">{{ $errors->first('largMax') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <label for="poidMax">Poid Max. (kg):</label>
                <input type="number" step="any" placeholder="Hauteur maximum..." id="poidMax" name="poidMax" value="{{ old('poidMax') }}">
                @if ($errors->has('poidMax'))
                    <p class="uk-form-help-block">{{ $errors->first('poidMax') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <label for="volume">Volume Max. (cm³):</label>
                <input type="number" step="any" placeholder="Hauteur maximum..." id="volume" name="volume" value="{{ old('volume') }}">
                @if ($errors->has('volume'))
                    <p class="uk-form-help-block">{{ $errors->first('volume') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <label for="volume">Type de véhicule:</label>
                <select name="vehicule_type">
                    @foreach($vehi_type as $vehi)
                    <option value="{{ $vehi->id }}">{{ $vehi->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('vehicule_type'))
                    <p class="uk-form-help-block">{{ $errors->first('vehicule_type') }}</p>
                @endif                
            </div>
            <div class="uk-form-row">
                <button class="uk-button uk-button-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>

@endsection