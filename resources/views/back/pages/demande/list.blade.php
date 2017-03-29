@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                Demande de transport
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Transport</th>
                            <th>Utilisateur</th>
                            <th>Texte</th>
                            <th>Cout</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($demandeTransport as $transport)
                        <tr>
                            <td><a class="btn btn-danger" data-toggle="modal" data-target="#del_demande_transport_{{ $transport->id }}"><i class="fa fa-trash-o"></i></a></td>
                            <td><a target="_blank" href="{{ route('admin_transport_detail', array('transport' => $transport->id)) }}">{{ $transport->id }}</a></td>
                            <td><a target="_blank" href="{{ route('admin_user_detail', array('user' => $transport->user->id)) }}">{{ $transport->user->login }}</a></td>
                            <td>{{ mb_strimwidth($transport->text, 0, 200, "...") }}</td>
                            <td>{{ $transport->cost }}€</td>
                            <td>
                                @if($demande->isAccepted == 0)
                                <span class="badge bg-orange">En attente</span>
                                @elseif($demande->isAccepted == 1)
                                <span class="badge bg-red">Refusé</span>
                                @elseif($demande->isAccepted == 2)
                                <span class="badge bg-green">Accepté</span>
                                @elseif($demande->isAccepted == 3)
                                <span class="badge bg-blue">Effectué</span>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="del_demande_transport_{{ $transport->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-left">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Suppression</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-quote-left"></i><i> {{ $transport->text }} </i><i class="fa fa-quote-right"></i>
                                        <br /><br />
                                        Voulez-vous vraiment supprimer cette demande ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non !</button>
                                        <a href="{{ route('admin_demandetransport_delete', array('demandetransport' => $transport->id)) }}" class="btn btn-primary">Supprimer !</a>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo $demandeTransport->links(); ?>
                </div>
            </div>
        </section>

    </div>
    <!--end col-6 -->
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                Demande d'expedition
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Expedition</th>
                            <th>Utilisateur</th>
                            <th>Texte</th>
                            <th>Prix proposé</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($demandeExpedition as $expedition)
                        <tr>
                            <td><a class="btn btn-danger" data-toggle="modal" data-target="#del_demande_expedition_{{ $expedition->id }}"><i class="fa fa-trash-o"></i></a></td>
                            <td><a target="_blank" href="{{ route('admin_expedition_detail', array('expedition' => $expedition->id)) }}">{{ $expedition->id }}</a></td>
                            <td><a target="_blank" href="{{ route('admin_user_detail', array('user' => $expedition->user->id)) }}">{{ $expedition->user->login }}</a></td>
                            <td>{{ mb_strimwidth($expedition->propositionText, 0, 200, "...") }}</td>
                            <td>{{ $expedition->prixAsked }}€</td>
                        </tr>
                        <div class="modal fade" id="del_demande_expedition_{{ $expedition->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-left">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Suppression</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-quote-left"></i><i> {{ $expedition->propositionText }} </i><i class="fa fa-quote-right"></i>
                                        <br /><br />
                                        Voulez-vous vraiment supprimer cette demande ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non !</button>
                                        <a href="{{ route('admin_demandeexpedition_delete', array('demandeexpedition' => $expedition->id)) }}" class="btn btn-primary">Supprimer !</a>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo $demandeExpedition->links(); ?>
                </div>
            </div>
        </section>


    </div>

</div>
@endsection