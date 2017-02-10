@extends('layouts.app', [ 'menu_style' => 'scroll',
'includesJs' => [],
'includesCss' => [] ])
@section('content')
            Profil de {{$user->lastName}}
            Update du profil à compléter

@endsection
