<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Home - Farm</title>
</head>

<body>
  <!-- Navbar start -->
  <div class="row">
    <div class="col-lg-12">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('/') }}"><img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="logo" height="80px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ route('/') }}">Home</a>
              <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('about') }}">About us</a>
              <a class="nav-link {{ (request()->is('agro')) ? 'active' : '' }}" href="{{ route('agro') }}">Agro</a>
              <a class="nav-link {{ (request()->is('dairy')) ? 'active' : '' }}" href="{{ route('dairy') }}">Dairy</a>
              <a class="nav-link {{ (request()->is('dairyProduct')) ? 'active' : '' }}" href="{{ route('dairyProduct') }}">Dairy Product</a>
              <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a>

              @if(session()->has('user_id'))
              <a class="nav-link {{ (request()->is('cart')) ? 'active' : '' }}" href="{{ route('cart') }}">Cart</a>
              <!-- <a class="nav-link" href="{{ route('order.details') }}">Order Details</a> -->
              <a class="nav-link {{ (request()->is('profile/all')) ? 'active' : '' }}" href="{{ route('profile.details') }}">Profile Details</a>
              <a class="nav-link" href="{{ route('customer.logout') }}">Logout</a>
              @else
              <a class="nav-link {{ (request()->is('registration')) ? 'active' : '' }}" href="{{ route('registration') }}">Registration/Login</a>
              @endif

            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Navbar start -->


  @yield('content')

  <div class="container-fluid">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.8570476020873!2d91.8229467142696!3d22.359025946412324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd91c97fb2bc5%3A0xac991a4f97e0ee7b!2sSIMCO%20MART!5e0!3m2!1sen!2sbd!4v1644585413474!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>

  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-5">
          <h6>About</h6>
          <p style="text-align: justify;">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>

        <div class="col-xs-6 col-md-4">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li><a href="{{ route('agro') }}">Agro</a></li>
            <li><a href="{{ route('dairy') }}">Dairy</a></li>
            <li><a href="{{ route('dairyProduct') }}">Dairy Product</a></li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="http://scanfcode.com/about/">About Us</a></li>
            <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
            <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
            <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
            <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by
            <a href="{{ route('/') }}">COWFARM</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a class="insta" href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>

</html>