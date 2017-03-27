@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Mes véhicules', 'includesJs' => [], 'includesCss'
=> ['/css/pages/vehicules.css']] ) @section('content')

<div id="background">
    <section id="vehiculeList" class="scroll-section black-text root-sec padd-tb-55 contact-wrap">
        <div class="row">
            <div class="col m6 offset-m3">
                <h2>AJOUTER VEHICULE</h2>
                <div class="card white">
                    <div class="card-content black-text">
                        <div class="row">
                            <form class="uk-form" method="post" action="{{ route('user_vehicule_add_post') }}">
                            {{ csrf_field() }}
                                <div class="input-field col s12">
                                    <input id="marque" name="marque" type="text" class="validate" value="{{ old('marque') }}">
                                    <label for="marque">Marque</label>
                                    @if ($errors->has('marque'))
                                    <strong style="color: brown;">{{ $errors->first('marque') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <input id="modele" name="modele" type="text" class="validate" value="{{ old('modele') }}">
                                    <label for="modele">Modele</label>
                                    @if ($errors->has('modele'))
                                    <strong style="color: brown;">{{ $errors->first('modele') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <input id="longMax" name="longMax" type="number" class="validate" value="{{ old('longMax') }}" onchange="calcVolume()">
                                    <label for="longMax">Longueur Max. (cm)</label>
                                    @if ($errors->has('longMax'))
                                    <strong style="color: brown;">{{ $errors->first('longMax') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <input id="hautMax" name="hautMax" type="number" class="validate" value="{{ old('hautMax') }}" onchange="calcVolume()">
                                    <label for="hautMax">Hauteur Max. (cm)</label>
                                    @if ($errors->has('hautMax'))
                                    <strong style="color: brown;">{{ $errors->first('hautMax') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <input id="largMax" name="largMax" type="number" class="validate" value="{{ old('largMax') }}" onchange="calcVolume()">
                                    <label for="largMax">Largeur Max. (cm)</label>
                                    @if ($errors->has('largMax'))
                                    <strong style="color: brown;">{{ $errors->first('largMax') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <input id="poidMax" name="poidMax" type="number" class="validate" value="{{ old('poidMax') }}">
                                    <label for="poidMax">Poid Max. (kg)</label>
                                    @if ($errors->has('poidMax'))
                                    <strong style="color: brown;">{{ $errors->first('poidMax') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <input id="volume" name="volume" type="number" class="validate" value="{{ old('volume') }}">
                                    <label for="volume">Volume (m³)</label>
                                    @if ($errors->has('volume'))
                                    <strong style="color: brown;">{{ $errors->first('volume') }}</strong>
                                    @endif
                                </div>

                                <div class="input-field col s12 center-align">
                                    
                                    @foreach($vehi_type as $vehi)
                                    <input name="vehicule_type" class="with-gap" type="radio" id="radio_{{ $vehi->id }}" value="{{ $vehi->id }}" />
                                    <label for="radio_{{ $vehi->id }}">{{ $vehi->name }}</label>
                                    @endforeach

                                    @if ($errors->has('vehicule_type'))
                                    <div class="input-field col s12 center-align">
                                        <strong style="color: brown;">{{ $errors->first('vehicule_type') }}</strong>
                                    </div>
                                    @endif
                                </div>

                                <div class="input-field col s12 center-align">
                                    <button class="waves-effect waves-light btn"><i class="mdi mdi-send"></i>button</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
