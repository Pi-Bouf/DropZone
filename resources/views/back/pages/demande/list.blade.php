@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                Les expeditions
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Utilisateur</th>
                            <th>Départ</th>
                            <th>Arrivée</th>
                            <th>Cout</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($expeditions as $expedition)
                        <tr>
                            <td><a href="{{ route('admin_expedition_detail', array('expedition' => $expedition->id)) }}">{{ $expedition->id }}</a></td>
                            <td><a href="{{ route('admin_user_detail', array('user' => $expedition->user->id)) }}">{{ $expedition->user->login }}</a></td>
                            <td>{{ $expedition->villeDep->name }}</td>
                            <td>{{ $expedition->villeArr->name }}</td>
                            <td>{{ $expedition->costMax }}€</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo $expeditions->links(); ?>
                </div>
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
                        <th>Expeditions</th>
                        <th>Nombre</th>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ Expedition::all()->count() }}</td>
                    </tr>
                    <tr>
                        <td>Demande d'expeditions</td>
                        <td>{{ DemandeExpedition::all()->count() }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>

</div>
@endsection