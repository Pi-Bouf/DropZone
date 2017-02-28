@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Profil
            </header>
            <div class="panel-body">
                {{ $actualUser->firstName }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Informations complémentaires
            </header>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <td>Data inscription</td>
                        <td><span class="badge bg-green">{{ $actualUser->created_at }}</span></td>
                    </tr>
                    <tr>
                        <td>Data inscription</td>
                        <td><span class="badge bg-green">{{ $actualUser->created_at }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection