<!DOCTYPE html>
<html>

<head>
    <title>BLOG-KU | @yield('title')</title>

        {{--* bootstrap css --}}
        <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        {{--* end bootstrap css --}}

        {{--* bootstrap js --}}
        <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}">
        {{--* end bootsrap js --}}
    </script>

        {{--* font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{--* end font awesome cdn --}}

        {{--! ck Editor --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.0/classic/ckeditor.js"></script>

</head>

<body>

  @include('layouts.app.header')
    <div class="container my-4">

        @yield('content')

      @include('layouts.app.footer')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">

      $(document).ready(function () {

      window.setTimeout(function() {
          $(".alert").fadeTo(1000, 0).slideUp(300, function(){
              $(this).remove();
          });
      }, 4000);

      });
      </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
@yield('script')

</html>
