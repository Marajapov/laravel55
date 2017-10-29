@extends('layouts.master')
@section('title', $row->getName().' - С У Т К И : База объявлений гостиничнего бизнеса' )
@section('content')
@include('partials.header')
@include('partials.search')
<div class="section">
  <div class="row">

    <div class="col s12 m6 l6 xl6">
      <!-- Promo Content 1 goes here -->
      <h5>{{ $row->getName() }}</h5>
      <div class="row">
        <div class="col s12 m12 l12 xl12">
          @if($row->flat_photos() !== null)
          <div class="carousel carousel-slider">
              @foreach($row->flat_photos() as $photo)
                <a href="#{{ $photo->getId()}}!" class="carousel-item">
                  <img src="{{ asset('photos/main_img')}}/{{ $photo->image }}" alt="">
                </a>
              @endforeach
          </div>
          @else
          <img src="{{ asset('flats/main_img')}}/{{ $row->main_img }}" alt="" width="100%" class="materialboxed" data-caption="{{ $row->getName() }}">
          @endif
        </div>

      </div><!-- end row-->

    </div>

    <div class="col s12 m6 l6 xl6">
      <h5>Описание</h5>
      <ul class="collection">
        <li class="collection-item avatar">
         <i class="material-icons circle orange">attach_money</i>
         <h5>{{ $row->price24 }}</h5>
        </li>
        <li class="collection-item avatar">
         <i class="material-icons circle blue">description</i>
         <span class="title">{{ $row->description }}</span>
        </li>
       <li class="collection-item avatar">
         <i class="material-icons circle green">room_service</i>
         <ul class="collection">
           @foreach($row->flat_inventories() as $inventory)
              <li class="collection-item">
                <img src="{{ asset('inventories') }}/{{ $inventory->img }}" alt="{{ $inventory->getName() }}"> - {{ $inventory->getName() }}
                <i class="material-icons">check_box</i>
              </li>
           @endforeach
         </ul>
        </li>
      </ul>
    </div>


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
