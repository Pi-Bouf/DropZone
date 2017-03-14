@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Profil
            </header>
            <div class="panel-body">
                @if($result == "OK")
                <div class="alert alert-success">
                    <strong>Super !</strong> L'utilisateur a bien été modifié !
                </div>
                @endif
                <form method="post" action="{{ route('admin_user_edit_post', array('user' => $user->id)) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse email..." value="{{ $user->email }}" required="required">
                        @if ($errors->has('email'))
                        <small id="emailHelp" class="form-text text-muted has-error" style="color: #B9121B;">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="login">Pseudo (publique):</label>
                        <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" placeholder="Pseudo..." value="{{ $user->login }}" required="required">
                        @if ($errors->has('login'))
                        <small id="loginHelp" class="form-text text-muted has-error" style="color: #B9121B;">{{ $errors->first('login') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="firstName">Prénom:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="firstNameHelp" placeholder="Prénom..." value="{{ $user->firstName }}" required="required">
                        @if ($errors->has('firstName'))
                        <small id="firstNameHelp" class="form-text text-muted has-error" style="color: #B9121B;">{{ $errors->first('firstName') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lastName">Nom:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastNameHelp" placeholder="Nom..." value="{{ $user->lastName }}" required="required">
                        @if ($errors->has('lastName'))
                        <small id="lastNameHelp" class="form-text text-muted has-error" style="color: #B9121B;">{{ $errors->first('lastName') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="birthday">Date de naissance:</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" aria-describedby="birthdayHelp" placeholder="Pseudo..." value="{{ $user->birthday }}" required="required">
                        @if ($errors->has('birthday'))
                        <small id="birthdayHelp" class="form-text text-muted has-error" style="color: #B9121B;">{{ $errors->first('birthday') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone:</label>
                        <input type="text" class="form-control" id="phone" name="phone"  aria-describedby="phoneHelp" placeholder="Pseudo..." value="{{ $user->phone }}" required="required">
                        @if ($errors->has('phone'))
                        <small id="phoneHelp" class="form-text text-muted has-error" style="color: #B9121B;">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>

                    <fieldset class="form-group">
                        <legend>Sexe</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="sexe1" value="f" @if($user->sexe == 'f') checked @endif>
                                Femme
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="sexe2" value="h" @if($user->sexe == 'h') checked @endif>
                                Homme
                            </label>
                        </div>
                    </fieldset>

                    <button class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Photo de profil
            </header>
            <div class="panel-body">
                <div class="text-center">
                    @if($user->picLink != NULL)
                    <img style="width: 50%;" class="img-circle" src="/images/profile/{{ $user->picLink }}"></img>
                    @else
                    <img src="/images/profile/icon-{{$user->sexe}}.png" width="50%" class="img-circle" alt="">
                    @endif
                    <div style="margin: 10px;"></div>
                    <a href="{{ route('admin_user_pic_delete', array('user' => $user->id)) }}" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection