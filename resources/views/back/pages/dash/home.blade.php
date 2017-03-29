@extends('back.app') @section('content')

<div class="row" style="margin-bottom:5px;">
    <div class="col-md-3">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
            <div class="sm-st-info">
                <span>{{ $userCount }}</span> Utilisateurs
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-violet"><i class="fa fa-truck"></i></span>
            <div class="sm-st-info">
                <span>{{ Transport::all()->count() }}</span> Transports
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-blue"><i class="fa fa-archive"></i></span>
            <div class="sm-st-info">
                <span>{{ Expedition::all()->count() }}</span> Expeditions
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
            <div class="sm-st-info">
                <span>{{ DemandeExpedition::all()->count() + DemandeTransport::all()->count() }}</span> Demandes Transport/Expeditions
            </div>
        </div>
    </div>
</div>

<!-- Main row -->
<div class="row">

    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Graphique d'activité
            </header>
            <div class="panel-body">
                <canvas id="inscription" width="600" height="250"></canvas>
            </div>
        </section>
        <!--earning graph end-->

    </div>
    <div class="col-lg-4">

        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Graphique de notation
            </header>
            <div class="panel-body">
                <canvas id="avis" width="600" height="330"></canvas>
            </div>
        </section>
        <!--earning graph end-->

        <!--chat start
        <section class="panel">
            <header class="panel-heading">
                Notifications
            </header>
            <div class="panel-body" id="noti-box">

                <div class="alert alert-block alert-danger">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                </div>
                <div class="alert alert-success">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Well done!</strong> You successfully read this important alert message.
                </div>
                <div class="alert alert-info">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                </div>
                <div class="alert alert-warning">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Warning!</strong> Best check yo self, you're not looking too good.
                </div>


                <div class="alert alert-block alert-danger">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                </div>
                <div class="alert alert-success">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Well done!</strong> You successfully read this important alert message.
                </div>
                <div class="alert alert-info">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                </div>
                <div class="alert alert-warning">
                    <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
          </button>
                    <strong>Warning!</strong> Best check yo self, you're not looking too good.
                </div>



            </div>
        </section>
        -->


    </div>


</div>
<!-- row end -->

@section('graph')
<script type="text/javascript">
    $(function() {
        "use strict";
        //BAR CHART
        var data_inscription = {
            labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
            datasets: [{
                label: "Utilisateur inscrit",
                backgroundColor: "rgba(255,0,0,0.1)",
                borderColor: "rgba(255,0,0,0.4)",
                pointBackgroundColor: "rgba(255,0,0,0.6)",
                pointBorderColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255,255,0,1)",
                data: [{{ $tabUser }}]
            }, {
                label: "Transports inscrit",
                backgroundColor: "rgba(75,0,130,0.1)",
                borderColor: "rgba(75,0,130,0.4)",
                pointBackgroundColor: "rgba(75,0,130,0.6)",
                pointBorderColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255,255,0,1)",
                data: [{{ $tabTransport }}]
            }, {
                label: "Expeditions inscrites",
                backgroundColor: "rgba(0,191,255,0.1)",
                borderColor: "rgba(0,191,255,0.4)",
                pointBackgroundColor: "rgba(0,191,255,0.6)",
                pointBorderColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255,255,0,1)",
                data: [{{ $tabExpedition }}],
            }, {
                label: "Demandes",
                backgroundColor: "rgba(0, 255, 0,0.1)",
                borderColor: "rgba(0, 255, 0,0.4)",
                pointBackgroundColor: "rgba(0, 255, 0,0.6)",
                pointBorderColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255,255,0,1)",
                data: [{{ $tabDemande }}]
            }]
        };
        new Chart(document.getElementById("inscription").getContext("2d"), {
            type: 'line',
            data: data_inscription,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });

        var data_avis = {
            labels: ["1 étoile", "2 étoiles", "3 étoiles", "4 étoiles", "5 étoiles"],
            datasets: [{
                label: "Note",
                borderColor: "rgba(255, 255, 255,1)",
                pointBackgroundColor: "rgba(255, 53, 139,0.6)",
                pointBorderColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255,255,0,1)",
                data: [{{ $tabNote }}],
                backgroundColor: [
                    "#FF6384",
                    "#4BC0C0",
                    "#FFCE56",
                    "#BB62FF",
                    "#36A2EB"
                ],
            }]
        };

        new Chart(document.getElementById("avis").getContext("2d"), {
            type: 'doughnut',
            data: data_avis,
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });

    });
    // Chart.defaults.global.responsive = true;
</script>
@endsection @endsection