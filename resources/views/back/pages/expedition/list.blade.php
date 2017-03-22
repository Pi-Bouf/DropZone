@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                Les transports
            </header>
            <div class="panel-body table-responsive">
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
                    @foreach($expeditions as $expedition)
                        <tr>
                           <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($option == "PAGINATE")
                <div class="text-center">
                    <?php echo $expeditions->links(); ?>
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
                        <td>0</td>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>

</div>
@endsection