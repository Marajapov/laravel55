  <footer class="page-footer orange">
   <div class="container">
     <div class="row">
       <div class="col l6 s12">
         <h5 class="white-text">Footer Content</h5>
         <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
       </div>
       <div class="col l4 offset-l2 s12">
         <h5 class="white-text">Links</h5>
         <ul>
           <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
           <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
         </ul>
       </div>
     </div>
   </div>
   <div class="footer-copyright">
     <div class="container">
     Copyright &copy; {{ date('Y')}}
     <a class="grey-text text-lighten-4 right" target="_blank" href="https://www.webdesign.kg">AS Web Design</a>
     </div>
   </div>
  </footer>


  @section('script')
  <script>
  $(document).ready(function() {
    $('select').material_select();
    $('.carousel').carousel({
      fullWidth: true,
      indicators: true
    });

    $('.carousel.carousel-slider').carousel({fullWidth:true});
  });
  </script>
  @endsection
