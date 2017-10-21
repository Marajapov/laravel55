<div class="col s3">
  <h5>Популярные</h5>
  @foreach($popular as $row)
  <div class="col s12 m12">
    <div class="card">
      <div class="card-image">
        <img src="{{asset("flats/main_img/")}}/{{$row->main_img}}">
        <span class="card-title">{{ $row->getName() }}</span>
        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <?php echo substr($row->description, 0,30);?>...
      </div>
    </div>
  </div>
  @endforeach

  <div class="col s12 m12">
    <div class="card">
      <div class="card-image">
        <img src="http://materializecss.com/images/sample-1.jpg">
        <span class="card-title">Card Title</span>
        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>I am a very simple card. I am goods of information.</p>
      </div>
    </div>
  </div>

</div>
