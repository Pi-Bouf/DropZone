@extends('back.app') @section('content')

<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Recherche d'utilisateur
            </header>
            <div class="panel-body">
                <form class="form-horizontal tasi-form" method="post" action="{{ route('admin_user_list_search_post') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Rechercher</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="toSearch" placeholder="Nom, prénom, email...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Attribut</label>
                        <div class="col-sm-8">
                            <label class="checkbox-inline"><input type="checkbox" name="checked" value="option1"> Vérifié</label>
                            <label class="checkbox-inline"><input type="checkbox" name="notChecked" value="option2"> Pas vérifié</label>
                            <label class="checkbox-inline"><input type="checkbox" name="banned" value="option3"> Bannis</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Inscription depuis</label>
                        <div class="col-lg-8">
                            <select class="form-control m-b-4" name="dateSince">
                                <option value="start">Depuis le début</option>
                                <option value="j/1">1 Jour</option>
                                <option value="j/2">2 Jours</option>
                                <option value="j/3">3 Jours</option>
                                <option value="j/4">4 Jours</option>
                                <option value="j/5">5 Jours</option>
                                <option value="s/1">1 Semaine</option>
                                <option value="s/2">2 Semaine</option>
                                <option value="s/3">3 Semaine</option>
                                <option value="s/4">4 Semaine</option>
                                <option value="m/1">1 Mois</option>
                                <option value="m/2">2 Mois</option>
                                <option value="m/3">3 Mois</option>
                                <option value="m/4">4 Mois</option>
                                <option value="m/5">5 Mois</option>
                                <option value="m/6">6 Mois</option>
                                <option value="m/7">7 Mois</option>
                                <option value="m/8">8 Mois</option>
                                <option value="m/9">9 Mois</option>
                                <option value="m/10">10 Mois</option>
                                <option value="m/11">11 Mois</option>
                                <option value="a/1">1 An</option>
                                <option value="a/2">2 An</option>
                                </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Go !</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                Les utilisateurs
            </header>
            <div class="panel-body table-responsive">
                @if($option == "NBRSEARCHED")
                <i><b>{{ $userSearchCount }}</b> utilisateurs trouvés !</i> @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Création</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userList as $oneUser)
                        <tr>
                            <td><a href="{{ route('admin_user_detail', array('user' => $oneUser->id)) }}">{{ $oneUser->id }}</a></td>
                            <td>{{ $oneUser->firstName }}</td>
                            <td>{{ $oneUser->lastName }}</td>
                            <td>{{ $oneUser->email }}</td>
                            <td>{{ $oneUser->created_at }}</td>
                            <td>
                                @if($oneUser->isChecked)
                                <span class="label label-success">OK</span> @elseif($oneUser->isBanned)
                                <span class="label label-danger">Bannis</span> @else
                                <span class="label label-info">En attente...</span> @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($option == "PAGINATE")
                <div class="text-center">
                    <?php echo $userList->links(); ?>
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
                        <th>Utilisateurs</th>
                        <th>Nombre</th>
                    </tr>
                    <tr>
                        <td>Vérifiés</td>
                        <td><span class="badge bg-green">{{ $userChecked }}</span></td>
                    </tr>
                    <tr>
                        <td>Pas vérifiés</td>
                        <td><span class="badge bg-red">{{ $userNotChecked }}</span></td>
                    </tr>
                    <tr>
                        <td>Bloqués</td>
                        <td><span class="badge bg-red">{{ $userBanned }}</span></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><span class="badge bg-blue">{{ $userCount }}</span></td>
                    </tr>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>

</div>
@endsection