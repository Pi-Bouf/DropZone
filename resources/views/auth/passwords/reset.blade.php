@extends('layouts.app', [ 'menu_style' => 'scroll', 'page_title' => 'DropZone - Ajout transport', 'includesJs' => [], 'includesCss' => []] ) @section('content')

<section>
    <section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
        <div class="sec-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-inner">
                            <div class="center-align home-content">
                                <div class="row">
                                    <div class="col s12 m6 offset-m3">
                                        <div class="card white">
                                            <div class="card-content grey-text">
                                                <span class="card-title">Réinitialiser mot de passe</span>
                                                <p>
                                                    @if (session('status'))
                                                        <div class="alert alert-success">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif

                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="token" value="{{ $token }}">

                                                        <div class="row">
                                                            <div class="input-field col s12 left-align">
                                                                <input id="emailReset" type="email" class="validate" name="emailReset" value="{{ $emailReset or old('emailReset') }}" required>
                                                                <label for="emailReset">Email</label>
                                                                @if ($errors->has('emailReset'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('emailReset') }}</strong> <br/>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12 left-align">
                                                                <input id="passReset" type="password" class="validate" name="passReset" required>
                                                                <label for="passReset">Mot de passe</label>
                                                                @if ($errors->has('passReset'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('passReset') }}</strong> <br/>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12 left-align">
                                                                <input id="passReset_confirmation" type="password" class="validate" name="passReset_confirmation" required>
                                                                <label for="passReset_confirmation">Confirmation</label>
                                                            </div>
                                                        </div>

                                                        <div class="center-align">
                                                            <button class="btn waves-effect waves-light" type="submit" name="action">REINITIALISER<i class="mdi mdi-send right"></i></button>
                                                        </div>
                                                    </form>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection