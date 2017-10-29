@extends('layouts.master')
@section('title','С У Т К И : База объявлений гостиничнего бизнеса')
@section('content')
@include('partials.header')
@include('partials.search')
<div class="section">
  <div class="row">
    <div class="col s9">
      <!-- Promo Content 1 goes here -->
      <h5>Последние объявления</h5>
      <div class="row">
        @foreach($flats as $row)
        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="{{asset("flats/main_img/")}}/{{$row->main_img}}">
              <span class="card-title">{{ $row->getName() }}</span>
              <a href="{{ route('detail',$row)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">open_in_new</i></a>
            </div>
            <div class="card-content">
              <?php echo substr($row->description, 0,30);?>...
            </div>
          </div>
        </div>
        @endforeach

        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very</p>
            </div>
          </div>
        </div>

        <div class="col s16 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.</p>
            </div>
          </div>
        </div>

        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.</p>
            </div>
          </div>
        </div>

        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.</p>
            </div>
          </div>
        </div>
      </div><!-- end row-->

      <div class="divider"></div>

      <h5>Все отели</h5>
      <div class="row">
        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <?php echo substr('Lorem ipsum dolor sit amet, conse', 0,20);?>...
            </div>
          </div>
        </div>

        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very</p>
            </div>
          </div>
        </div>

        <div class="col s16 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.</p>
            </div>
          </div>
        </div>

        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.</p>
            </div>
          </div>
        </div>

        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.</p>
            </div>
          </div>
        </div>
      </div><!-- end row-->

    </div>

      @include('partials.popular')

  </div>
</div><!-- end of class section-->
<div class="divider"></div>
<div class="section">
  <h5>Section 2</h5>
  <p>Stuff</p>
</div>
@endsection

@section('footer')
@include('partials.footer')
@endsection
