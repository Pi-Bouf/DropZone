@extends('back.app') @section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Expedition
            </header>
            <div class="panel-body">
                <div class="text-center">
                    <h4><b>{{ $expedition->villeDep->name }} </b> <span style="margin: 10px">&#8620;</span> <b> {{ $expedition->villeArr->name }}</b></h4>
                </div>
                <div class="text-center" style="font-style: italic;">
                {{ $expedition->description }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Informations
            </header>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Utilisateur</th>
                        <td><a href="{{ route('admin_user_detail', array('user' => $expedition->user->id)) }}">{{ $expedition->user->login }}</a></td>
                    </tr>
                    <tr>
                        <td>Longueur Max.:</td>
                        <td>
                            {{ $expedition->lengthItem }} cm
                        </td>
                    </tr>
                    <tr>
                        <td>Hauteur Max.:</td>
                        <td>
                            {{ $expedition->heightItem }} cm
                        </td>
                    </tr>
                    <tr>
                        <td>Largeur Max.:</td>
                        <td>
                            {{ $expedition->widthItem }} cm
                        </td>
                    </tr>
                    <tr>
                        <td>Poid Max.:</td>
                        <td>
                            {{ $expedition->weightItem }} cm
                        </td>
                    </tr>
                    <tr>
                        <td>Volume Max.:</td>
                        <td>
                            {{ $expedition->volumeItem }} cm
                        </td>
                    </tr>
                </table>
                <center>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#del_expedition">Supprimer cet expedition</a>
                </center>
            </div>
            
            <div class="modal fade" id="del_expedition" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-left">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Suppression</h4>
                        </div>
                        <div class="modal-body">
                            Voulez-vous vraiment supprimer cet expedition ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Non !</button>
                            <a href="{{ route('admin_expedition_delete', array('expedition' => $expedition->id)) }}" class="btn btn-primary">Supprimer !</a>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection