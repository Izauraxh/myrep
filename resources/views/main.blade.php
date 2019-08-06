 @include('_head')
 <div id="app">
 @include('_nav')
<div id="app">
<div class="container">

 @include('_messages')
 @yield('content')
</div><!--end of container-->
</div>

<footer class="footer">
 <div class="footer-copyright text-center ">© 2018 Copyright:
      <a href="#"> Music blog</a>
     <a href="https://www.facebook.com/Music-Fan-Club-Albania-143032439172153/?ref=br_rs" target="_blank"> <i class="fab fa-facebook"></i></a>
     <i class="fab fa-instagram"></i>
      <a href="https://plus.google.com/u/0/+IzzyLessons"> <i class="fab fa-google-plus-square"></i></a>

    </div>
  </footer>
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     
         
   <!-- Optional JavaScript  -->
   <script src="{{ asset('js/app.js') }}"></script>
    
   <!-- {!!Html::script('js/parsley.min.js')!!}-->
    <!--Scripts --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
           
    @yield('scripts')
   
    
    
   
    </body>
  </html>
  