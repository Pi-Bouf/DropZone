@extends('back.app') @section('content')
<style>
    .stepwizard {
        /* весь блок */
        display: table;
        width: 30px;
        margin-left: auto;
        margin-right: auto;
        /* ограничимся шириной .btn-square */
        height: 400px;
        /* высота */
        position: relative;
    }
    
    .stepwizard-row {
        display: table-row;
    }
    
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    
    .stepwizard-row:before {
        /* линия */
        position: absolute;
        top: 0px;
        /* если нужно довести донизу – вместо него поставь bottom:0px ;*/
        content: " ";
        width: 1px;
        height: 70%;
        /* т.к. занимает 2 "ячейки" */
        background-color: #ccc;
    }
    
    .stepwizard-step {
        /* каждый из 3-ёх */
        display: table-cell;
        text-align: center;
        position: relative;
        left: -15px;
        z-index: 1;
    }
    
    .btn-square {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        /* цифры внутри */
    }
</style>
<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <header class="panel-heading">
                Transport
            </header>
            <div class="panel-body">
                <div class="text-center">
                    <h4><b>{{ $transport->villeDepart->ville->name }} </b> <span style="margin: 10px">&#8620;</span> <b> {{ $transport->villeArrivee->ville->name }}</b></h4>
                </div>

                <div class="stepwizard">
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-default btn-square">1</button>
                        </div>
                    </div>
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-primary btn-square"></button>
                        </div>
                    </div>
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-primary btn-square">2</button>
                        </div>
                    </div>
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-primary btn-square">2</button>
                        </div>
                    </div>
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-default btn-square">2</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Informations
            </header>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Utilisateur</th>
                        <td><a href="{{ route('admin_user_detail', array('user' => $transport->user->id)) }}">{{ $transport->user->login }}</a></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>@if($transport->natureTransport) Régulier @else Ponctuel @endif</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection