@extends('layouts.app', [
'menu_style' => 'static',
'page_title' => 'DropZone - Affichage de l\'expédition',
'includesJs' => [''],
'includesCss' => ['']])
@section('content')
    <style>
        h2{
            font-size:2.5em !important;
            margin-top:-20px;
            color:#ff8a65;
        }
        h3{
            font-size:1.6em !important;
            color:#ff8a65 !important;
        }
        .whited:focus {
            border-bottom: 1px solid white !important;
            -webkit-box-shadow: 0 1px 0 0 white !important;
            -moz-box-shadow: 0 1px 0 0 white !important;
            box-shadow: 0 1px 0 0 white !important;
        }
        .oranged:focus {
            border-bottom: 1px solid #ff8a65 !important;
            -webkit-box-shadow: 0 1px 0 0 #ff8a65 !important;
            -moz-box-shadow: 0 1px 0 0 #ff8a65 !important;
            box-shadow: 0 1px 0 0 #ff8a65 !important;
        }
        input:focus {
            border-bottom: 1px solid white !important;
            -webkit-box-shadow: 0 1px 0 0 white !important;
            -moz-box-shadow: 0 1px 0 0 white !important;
            box-shadow: 0 1px 0 0 white !important;
        }

        .bold{
            font-weight: bold;
            
        }

        #date{
            font-size:0.8em;
        }

        .center{
            margin-right:auto !important;
            margin-left:auto !important;
        }

        #descri tr{
            border: 1px solid grey;
            line-height:30px;
        }

        #descri{
            margin-bottom:30px;
        }
        #reservBG{
            background-image:url('../images/orange.jpg');
            background-size:cover;
        }

        .reponse{
            border-left:2px solid #CECECE;
        }


    </style>
    <section id="contenuSection" class="scroll-section root-sec padd-tb-60 team-wrap center-align">
        <div class="row">
            <div class="col s12 l6 push-l1">
                <div class="card white lighten-3">
                    <div class="card-content grey-text">
                        <h3 class="about-subtitle ">Détail de l'expédition</h3>
                        <br>
                        <p>{{$expedition->description}}</p>
                        <br>
                        <div class="row">
                            <table class="striped col l8 push-l2">
                                <tr>
                                    <td>Ville de départ :</td>
                                    <td>{{$expedition->villeDep->name}}</td>
                                </tr>
                                <tr>
                                    <td>Ville d'arrivée :</td>
                                    <td>{{$expedition->villeArr->name}}</td>
                                </tr>
                                <tr>
                                    <td>Poids de l'objet :</td>
                                    <td>{{$expedition->weightItem}} kg</td>
                                </tr>
                                <tr>
                                    <td>Longueur du colis :</td>
                                    <td>{{$expedition->lengthItem}} cm</td>
                                </tr>
                                <tr>
                                    <td>Largeur du colis :</td>
                                    <td>{{$expedition->widthItem}} cm</td>
                                </tr>
                                <tr>
                                    <td>Hauteur du colis :</td>
                                    <td>{{$expedition->heightItem}} cm</td>
                                </tr>
                                <tr>
                                    <td>Volume du colis:</td>
                                    <td>{{$expedition->volumeItem}} m³</td>
                                </tr>
                                <tr>
                                    <td>Prix maximum :</td>
                                    <td>{{$expedition->costMax}} €</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l3 push-l2 padd-tb-60">
                <div class="card white lighten-3">
                    <div class="card-content grey-text">
                        <h3 class="about-subtitle ">Expéditeur</h3>
                        @if($expedition->user->picLink==null)
                            <img src="/images/profile/icon-{{$expedition->user->sexe}}.png" width="35%" class="responsive-img circle" alt="">
                        @else
                            <img src="{{$expedition->user->picLink}}" width="35%" class="responsive-img circle" alt="">
                        @endif
                        <div id="nomConducteur"><a href="/user/{{$expedition->user->id}}" class="orange-text">{{$expedition->user->firstName}}</a> - {{$age}} ans</div>
                        <div id="etoile"><i class="mdi mdi-star icon-size yellow-text" aria-hidden="true"></i> {{$note}}/5 - {{$nbnote}} avis</div><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($expedition->user->id != Auth::user()->id && !$expedition->isAccepted)
    <section class="scroll-section root-sec padd-tb-60 team-wrap  center-align" id="reservBG">
        <div class="row">
            <h2 class="reservation white-text">Demande d'expédition du colis</h2>
            <form class="reservation col s12 push-m2 m8 push-l3 l6" method="POST" action="{{route('postaddreservationexpedition')}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field">
                        <textarea id="message" name="message" class="validate materialize-textarea white-text whited" required></textarea>
                        <label for="message" class="white-text left-align">Description de votre trajet</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input id="prix" type="number" name="prix" step="0.01" class="validate white-text" required>
                        <label for="prix" class="white-text left-align">Prix proposé €</label>
                    </div>
                </div>        
                <div class="row">                          
                    <div class="input-field">
                        <input type="text" name="dateD" class="datepicker  white-text " id="dateD"><br>
                        <label for="dateD" class=" white-text ">Date départ au plus tôt</label>
                    </div>
                </div> 
                <div class="row">                               
                    <div class="input-field ">
                        <label for="dateF" class="white-text ">Date départ au plus tard</label>
                        <input type="text" name="dateF" class="datepicker  white-text " id="dateF"><br>
                    </div>
                </div>
                <input id="idE" name="idE" type="hidden" value="{{$expedition->id}}">
                <p class="center-align"><button id="btProposer" type="submit" class=" btn-large white deep-orange-text lighten-2"><i class="mdi mdi-cube-send right"></i>Proposer</button></p>
            </form>
        </div>
    </section>
    @endif

    @if($expedition->isAccepted)
        <section class="scroll-section root-sec padd-tb-60 team-wrap  center-align" id="reservBG">
            <h3 class="reservation white-text">Ce colis est déjà livré.</h3>
        </section>
    @endif

    <section class="scroll-section root-sec padd-tb-60 team-wrap white center-align">
        <div class="row">
            <h2 class="reservation ">Questions : </h2>
            <form action="{{route('postaddquestionexpedition')}}" method="POST" class="reservation col s12 push-m2 m8 push-l3 l6">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field">
                        <textarea id="message" name="message" class="validate materialize-textarea grey-text  oranged"></textarea>
                        <label for="message" class=" deep-orange-text ">Poser votre question ici</label>
                    </div>
                    <input id="idE" name="idE" type="hidden" value="{{$expedition->id}}">
                </div>
                <p class="center-align"><button id="btProposer" type="submit" class=" btn-large  deep-orange">Envoyer</button></p>
            </form>
        </div>
        <br><br>
        <div class="row">
            @if($expedition->questionsExpedition->count() != 0)
                <div class="col s12 push-m2 m8 push-l3 l6">
                    @foreach($expedition->questionsExpedition as $qu)
                        <div class="row">
                            <div class="col s4 m2">
                                @if($qu->user->picLink==null)
                                    <img src="/images/profile/icon-{{$qu->user->sexe}}.png" width="100%" class="responsive-img circle" alt="">
                                @else
                                    <img src="{{$qu->user->picLink}}" width="100%" class="responsive-img circle" alt="">
                                @endif
                                <br>
                                <a href="/user/{{$qu->user->id}}" class="deep-orange-text lighten-2">{{$qu->user->login}}</a>
                                <br><br>
                            </div>
                            <div class="col s8 m10">
                                <div id="date" class="left-align grey-text">Publié le <span class="bold">{{Date::parse($qu->created_at)->format('l j F') }}</span></div>
                                <div class="grey-text left-align">{{$qu->question}}</div>
                            </div>
                        </div>
                        @if($qu->reponseAtQuestion->count() != 0)
                            @foreach($qu->reponseAtQuestion as $rep)
                                <div class="row">
                                    <div class="col s11 push-s1">
                                        <div class="col s4 m2 reponse">
                                                @if($rep->user->picLink==null)
                                                    <img src="/images/profile/icon-{{$rep->user->sexe}}.png" width="100%" class="responsive-img circle" alt="">
                                                @else
                                                    <img src="{{$rep->user->picLink}}" width="100%" class="responsive-img circle" alt="">
                                                @endif
                                                <br>
                                                <a href="/user/{{$rep->user->id}}" class="deep-orange-text">{{$rep->user->login}}</a>
                                                <br><br>
                                        </div>
                                        <div class="col s8 m10">
                                                <div id="date" class=" left-align grey-text">Publié le <span class="bold">{{Date::parse($rep->created_at)->format('l j F') }}</span></div>
                                                <div class="left-align grey-text">{{$rep->question}}</div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col s11 push-s1">
                                <div class="col s4 m2 reponse">
                                        @if(Auth::user()->picLink==null)
                                            <img src="/images/profile/icon-{{Auth::user()->sexe}}.png" width="100%" class="responsive-img circle" alt="">
                                        @else
                                            <img src="{{Auth::user()->picLink}}" width="100%" class="responsive-img circle" alt="">
                                        @endif
                                        <br><br>
                                </div>
                                <div class="col s8 m10">
                                    <form action="{{route('postaddreponseexpe',array('question' => $qu->id))}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="input-field">
                                            <input id="reponse" type="text" name="reponse" class="validate  grey-text oranged" data-length="255" required>
                                            <label for="reponse" class="deep-orange-text left-align">Votre réponse</label>
                                        </div>
                                        <input id="idT" name="idT" type="hidden" value="{{$expedition->id}}">
                                        <p class="center-align addRep"><button id="btRépondre" type="submit" class="waves-effect waves-light btn deep-orange white-text">Répondre</button></p>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <br><br>
                    @endforeach
                </div>
            @else
                Pas de question pour le moment.
            @endif
        </div>
    </section>
@endsection
