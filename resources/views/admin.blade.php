@extends('layouts.app')
@section('head')
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('content')
    <header id="header">
        <div class="container">
        <div class="row">
            <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
            </div>
            <div class="col-md-2">
            
            </div>
        </div>
        </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Later I will do monthly report to myself</h3>
              </div>
            </div>

        </div>
      </div>
    </section>

@endsection
