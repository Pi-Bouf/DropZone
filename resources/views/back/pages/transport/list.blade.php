@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                Les transports
            </header>
            <div class="panel-body table-responsive">
                @if($option == "NBRSEARCHED")
                <i><b>{{ $userSearchCount }}</b> utilisateurs trouvés !</i>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Utilisateur</th>
                            <th>Départ</th>
                            <th>Arrivée</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transports as $transport)
                        <tr>
                            <td><a href="{{ route('admin_transport_detail', array('transport' => $transport->id)) }}">{{ $transport->id }}</a></td>
                            <td><a href="{{ route('admin_user_detail', array('user' => $transport->user->id)) }}">{{ $transport->user->login }}</a></td>
                            <td>{{ $transport->villeDepart->ville->name }}</td>
                            <td>{{ $transport->villeArrivee->ville->name }}</td>
                            <td>@if($transport->natureTransport) <span class="badge bg-green">Régulier</span> @else <span class="badge bg-blue">Ponctuel</span> @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($option == "PAGINATE")
                <div class="text-center">
                    <?php echo $transports->links(); ?>
                </div>
                @endif
            </div>
        </section>


    </div>
    <!--end col-6 -->
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Statistiques
            </header>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Transports</th>
                        <th>Nombre</th>
                    </tr>
                    <tr>
                        <td>En attente</td>
                        <td>{{ Transport::waiting()->count() }}</td>
                    </tr>
                    <tr>
                        <td>Effectué</td>
                        <td>{{ Transport::OK()->count() }}</td>
                    </tr>
                    <tr>
                        <td>Ponctuel</td>
                        <td>{{ Transport::ponctuel()->count() }}</td>
                    </tr>
                    <tr>
                        <td>Régulier</td>
                        <td>{{ Transport::regulier()->count() }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>

</div>
@endsection