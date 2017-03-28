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
<div class="row">

    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                Work Progress
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project</th>
                            <th>Manager</th>
                            <!-- <th>Client</th> -->
                            <th>Deadline</th>
                            <!-- <th>Price</th> -->
                            <th>Status</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Facebook</td>
                            <td>Mark</td>
                            <!-- <td>Steve</td> -->
                            <td>10/10/2014</td>
                            <!-- <td>$1500</td> -->
                            <td><span class="label label-danger">in progress</span></td>
                            <td><span class="badge badge-info">50%</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Twitter</td>
                            <td>Evan</td>
                            <!-- <td>Darren</td> -->
                            <td>10/8/2014</td>
                            <!-- <td>$1500</td> -->
                            <td><span class="label label-success">completed</span></td>
                            <td><span class="badge badge-success">100%</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Google</td>
                            <td>Larry</td>
                            <!-- <td>Nick</td> -->
                            <td>10/12/2014</td>
                            <!-- <td>$2000</td> -->
                            <td><span class="label label-warning">in progress</span></td>
                            <td><span class="badge badge-warning">75%</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>LinkedIn</td>
                            <td>Allen</td>
                            <!-- <td>Rock</td> -->
                            <td>10/01/2015</td>
                            <!-- <td>$2000</td> -->
                            <td><span class="label label-info">in progress</span></td>
                            <td><span class="badge badge-info">65%</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Tumblr</td>
                            <td>David</td>
                            <!-- <td>HHH</td> -->
                            <td>01/11/2014</td>
                            <!-- <td>$2000</td> -->
                            <td><span class="label label-warning">in progress</span></td>
                            <td><span class="badge badge-danger">95%</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Tesla</td>
                            <td>Musk</td>
                            <!-- <td>HHH</td> -->
                            <td>01/11/2014</td>
                            <!-- <td>$2000</td> -->
                            <td><span class="label label-info">in progress</span></td>
                            <td><span class="badge badge-success">95%</span></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Ghost</td>
                            <td>XXX</td>
                            <!-- <td>HHH</td> -->
                            <td>01/11/2014</td>
                            <!-- <td>$2000</td> -->
                            <td><span class="label label-info">in progress</span></td>
                            <td><span class="badge badge-success">95%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


    </div>
    <!--end col-6 -->
    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                Twitter Feed
            </header>
            <div class="panel-body">
                <div class="twt-area">
                    <form action="#" method="post">
                        <textarea class="form-control" name="profile-tweet" placeholder="Share something on Twitter.." rows="3"></textarea>

                        <div class="clearfix">
                            <button class="btn btn-sm btn-primary pull-right" type="submit">
                <i class="fa fa-twitter"></i> Tweet
              </button>
                            <a class="btn btn-link btn-icon fa fa-location-arrow" data-original-title="Add Location" data-placement="bottom" data-toggle="tooltip" href="#" style="text-decoration:none;" title=""></a>
                            <a class="btn btn-link btn-icon fa fa-camera" data-original-title="Add Photo" data-placement="bottom" data-toggle="tooltip" href="#" style="text-decoration:none;" title=""></a>
                        </div>
                    </form>
                </div>
                <ul class="media-list">
                    <li class="media">
                        <a href="#" class="pull-left">
                            <img src="backoff/img/26115.jpg" alt="Avatar" class="img-circle" width="64" height="64">
                        </a>
                        <div class="media-body">
                            <span class="text-muted pull-right">
<small><em>30 min ago</em></small>
</span>
                            <a href="page_ready_user_profile.php">
                                <strong>John Doe</strong>
                            </a>
                            <p>
                                In hac <a href="#">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.
                                <a href="#" class="text-danger">
                                    <strong>#dev</strong>
                                </a>
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <a href="#" class="pull-left">
                            <img src="img/26115.jpg" alt="Avatar" class="img-circle" width="64" height="64">
                        </a>
                        <div class="media-body">
                            <span class="text-muted pull-right">
<small><em>30 min ago</em></small>
</span>
                            <a href="page_ready_user_profile.php">
                                <strong>John Doe</strong>
                            </a>
                            <p>
                                In hac <a href="#">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.
                                <a href="#" class="text-danger">
                                    <strong>#design</strong>
                                </a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>

</div>
<div class="row">
    <div class="col-md-5">
        <div class="panel">
            <header class="panel-heading">
                Teammates
            </header>

            <ul class="list-group teammates">
                <li class="list-group-item">
                    <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
                    <span class="pull-right label label-danger inline m-t-15">Admin</span>
                    <a href="">Damon Parker</a>
                </li>
                <li class="list-group-item">
                    <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
                    <span class="pull-right label label-info inline m-t-15">Member</span>
                    <a href="">Joe Waston</a>
                </li>
                <li class="list-group-item">
                    <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
                    <span class="pull-right label label-warning inline m-t-15">Editor</span>
                    <a href="">Jannie Dvis</a>
                </li>
                <li class="list-group-item">
                    <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
                    <span class="pull-right label label-warning inline m-t-15">Editor</span>
                    <a href="">Emma Welson</a>
                </li>
                <li class="list-group-item">
                    <a href=""><img src="img/26115.jpg" width="50" height="50"></a>
                    <span class="pull-right label label-success inline m-t-15">Subscriber</span>
                    <a href="">Emma Welson</a>
                </li>
            </ul>
            <div class="panel-footer bg-white">
                <!-- <span class="pull-right badge badge-info">32</span> -->
                <button class="btn btn-primary btn-addon btn-sm">
          <i class="fa fa-plus"></i> Add Teammate
        </button>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <section class="panel tasks-widget">
            <header class="panel-heading">
                Todo list
            </header>
            <div class="panel-body">

                <div class="task-content">

                    <ul class="task-list">
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey list-child" />
                                <!-- <input type="checkbox" class="square-grey"/> -->
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Director is Modern Dashboard</span>
                                <span class="label label-success">2 Days</span>
                                <div class="pull-right hidden-phone">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey" />
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Fully Responsive & Bootstrap 3.0.2 Compatible</span>
                                <span class="label label-danger">Done</span>
                                <div class="pull-right hidden-phone">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey" />
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Latest Design Concept</span>
                                <span class="label label-warning">Company</span>
                                <div class="pull-right hidden-phone">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey" />
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Write well documentation for this theme</span>
                                <span class="label label-primary">3 Days</span>
                                <div class="pull-right hidden-phone">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey" />
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Don't bother to download this Dashbord</span>
                                <span class="label label-inverse">Now</span>
                                <div class="pull-right">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey" />
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Give feedback for the template</span>
                                <span class="label label-success">2 Days</span>
                                <div class="pull-right hidden-phone">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="task-checkbox">
                                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                <input type="checkbox" class="flat-grey" />
                            </div>
                            <div class="task-title">
                                <span class="task-title-sp">Tell your friends about this admin template</span>
                                <span class="label label-danger">Now</span>
                                <div class="pull-right hidden-phone">
                                    <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class=" add-task-row">
                    <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a>
                    <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
                </div>
            </div>
        </section>
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