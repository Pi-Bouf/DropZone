@extends('layouts.app', [
'menu_style' => 'static',
'page_title' => 'DropZone - Affiche du transport',
'includesJs' => [''],
'includesCss' => ['']])
@section('content')
<style>
body{
    color:black;
}
</style>
haha : 
<br>
{{$transport->id}}
@endsection
