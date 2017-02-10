@extends('layouts.app', [ 'menu_style' => 'static', 'page_title' => 'DropZone - Ajout transport' ]) @section('content')


<h1>Proposer un transport</h1>

<form method="POST">
    <label class="labelForm" for="villeDepart">Ville départ : </label><br/>
    <input type="text" id="villeDepart" name="villeDepart"><br/><br/>
    <label class="labelForm" for="villeDepart">Ville arrivée : </label><br/>
    <input type="text" id="villeArrivee" name="villeDepart"><br/><br/>


</form>



@endsection
