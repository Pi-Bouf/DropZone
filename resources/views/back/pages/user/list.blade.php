@extends('back.app') @section('content')

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
@endsection