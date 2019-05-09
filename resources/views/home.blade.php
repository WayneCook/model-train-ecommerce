@extends('layouts.app')

@section('content')

<div class="small-nav">
  <div class="small-nav-wrapper">

    <cart-icon></cart-icon>
  </div>
  <nav-menu :fontcolor='"hsla(210, 57%, 20%, 0.82)"' :categories="{{ $categories }}" class="menu small-menu">
  </nav-menu>

</div>

<div class="row animatedParent animateOnce">

    <div class="col-sm-6 hero-train-column">
      <div class="heroContent">
        <h1 class="hero-title">MODEL TRAIN SETS</h1>
        <p>Welcome to Dimitr'is Online Train Shop. We Carry everything a modeler needs to build their dream model train Layout!</p>
        <button type="button" class="hvr-outline-in btn-custom-green" name="button">SHOP NOW!</button>
      </div>
    </div>

    <div class="col-sm-6 hero-layout-column">
      <div class="heroContent">
      <h1 class="hero-title">LAYOUT AND SUPPLIES</h1>
      <p>Welcome to Dimitr'is Online Train Shop. We Carry everything a modeler needs to build their dream model train Layout!</p>
      <button type="button" class="hvr-outline-in btn-custom-green" name="button" style=''>SHOP NOW!</button>
    </div>
  </div>
</div>

<shopping-cart>
  {{-- <template slot="emptyCartImage"></template> --}}
</shopping-cart>

<product-slider :heading='"Featured Products"' :products='{{ $featuredProducts }}'></product-slider>

<section class="aboutTrains row">
<div class="aboutTrainsWrapper">

  <div class="aboutContainer animatedParent">
    <p class="animated fadeInDown">LETS WORK ON</p>
    <h1 class="animated fadeInDown">YOUR RAILROAD</h1>
    <hr class="animated rotateInUpLeft">

</div>
</div>
</section>



  <div class="subscribe-section row ">
    <p>BE THE FIRST TO KNOW | SUBSCRIBE TO OUR NEWSLETTER </p>
    <form>
      <div class="input-group">
          <input class="text-input-custom" type="text" name="" value="" placeholder="Enter your email">
          <input class="btn-custom-green" type="submit" name="subscribe" value="SUBSCRIBE">
      </div>
  </form>
  </div>

<div class="info-section">

  <section class="row info-section-container">

    {{-- <span class="flaticons flaticon-spy"></span> --}}

    <div class="col-lg col-md-6 col-sm-12">
      <div class="info-box">
        <span class="info-icons flaticon-gift-card"></span>
        <h4>Gift cards<span class="check-icon flaticon-check-mark"></span></h4>
        <p>sdf sdfsdfgr hyjh yjrtgwwd qwdqwwd wefwefw</p>
      </div>
    </div>

    <div class="col-lg col-md-6 col-sm-12">
      <div class="info-box">
        <span class="info-icons flaticon-delivery-man"></span>
        <h4>Free Shipping<span class="check-icon flaticon-check-mark"></span></h4>
        <p>sdf sdfsdfgr hyjh yjrtgwwd qwdqwwd wefwefw</p>
      </div>
    </div>

    <div class="col-lg col-md-6 col-sm-12">
      <div class="info-box">
        <span class="info-icons flaticon-fast-delivery"></span>
        <h4>Fast Delivery<span class="check-icon flaticon-check-mark"></span></h4>
        <p>sdf sdfsdfgr hyjh yjrtgwwd qwdqwwd wefwefw</p>
      </div>
    </div>

    <div class="col-lg col-md-6 col-sm-12">
      <div class="info-box">
        <span class="info-icons flaticon-world"></span>
        <h4>Ship Anywhere<span class="check-icon flaticon-check-mark"></span></h4>
        <p>sdf sdfsdfgr hyjh yjrtgwwd qwdqwwd wefwefw</p>
      </div>
    </div>

  </section>
</div>

<section class="inspire-section row">

    <div class="col-6 inspire-box inspire-first">
      <div class="text-wrapper">

      <h1>GET INSPIRED</h1>
      <p>Visit our blog for all things model trains.</p>
      <button href="####" class="btn-custom-green">VISIT BLOG</button>

    </div>
    </div>

    <div class="col-6 inspire-box image-box">

      {{-- <iframe src="https://www.youtube.com/embed/R669l5CA1YA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

    </div>

</section>

<div class="videos-outer">

  <div class="videos-wrapper">
    <div class="inspire-images-container row">

      <div class="col-md-6 col-sm-6 col-12 col-lg">
        <video-modal :image-url="'../images/sierra-lines-logo.png'">
            <iframe slot="body" src="https://www.youtube.com/embed/R669l5CA1YA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </video-modal>
      </div>

      <div class="col-md-6 col-sm-6 col-12 col-lg">
        <video-modal :image-url="'../images/wunderland-logo.png'">
            <iframe slot="body" src="https://www.youtube.com/embed/R669l5CA1YA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </video-modal>
      </div>

      <div class="col-md-6 col-sm-6 col-12 col-lg">
        <video-modal :image-url="'../images/roadside-logo.png'">
            <iframe slot="body" src="https://www.youtube.com/embed/R669l5CA1YA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </video-modal>
      </div>

      <div class="col-md-6 col-sm-6 col-12 col-lg">
        <video-modal :image-url="'../images/comrc-logo.png'">
            <iframe slot="body" src="https://www.youtube.com/embed/R669l5CA1YA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </video-modal>
      </div>
    </div>
  </div>
</div>

<product-slider :heading='"On Sale Now"' :products='{{ $featuredProducts }}'></product-slider>

<div class="footer-wrapper">
  <div class="logo-wrapper">

    <img class="footerLogo" src="{{ asset('images/train_logo.svg') }}" alt="">
  </div>
<div class="footer-inner">

<footer class="footer-container row">
  <div class="col-lg col-md-6 col-sm-12">
    <section class="footer-section">
      <h1>Dimitri Trains</h1>
      <ul>
        <li><p>1888-248-4209</p>
        <p>1044 Main ST<br>
        Monrovia, Ca 91016</p></li>
        <li><a href="###">Contact Us</a></li>
        <li><p>2019 Dimitri Train. All Rights Reserved.</p></li>
      </ul>
    </section>
  </div>

  <div class="col-lg col-md-6 col-sm-12">
    <section class="footer-section">
      <h1>Who We Are</h1>
      <ul>
        <li>
            <a href="###">Gift Certificates</a>
        </li>
        <li>
            <a href="###">Shipping &amp; Returns</a>
        </li>
        <li>
            <a href="###">Order Status</a>
        </li>
        <li>
            <a href="###">Privacy Policy</a>
        </li>
      </ul>
    </section>
  </div>

  <div class="col-lg col-md-6 col-sm-12">

    <section class="footer-section">
      <h1>Who We Are</h1>
      <ul>
        <li>
            <a href="###">Gift Certificates</a>
        </li>
        <li>
            <a href="###">Shipping &amp; Returns</a>
        </li>
        <li>
            <a href="###">Order Status</a>
        </li>
        <li>
            <a href="###">Privacy Policy</a>
        </li>
      </ul>
    </section>
  </div>

  <div class="col-lg col-md-6 col-sm-12">
    <section class="footer-section">
      <h1>Who We Are</h1>
      <ul>
        <li>
            <a href="###">Gift Certificates</a>
        </li>
        <li>
            <a href="###">Shipping &amp; Returns</a>
        </li>
        <li>
            <a href="###">Order Status</a>
        </li>
        <li>
            <a href="###">Privacy Policy</a>
        </li>
      </ul>
    </section>
  </div>

</footer>
</div>
</div>





@endsection

@section('scripts')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


  <script src="{{ asset('js/css3-animate-it.js') }}"></script>

  <script type="text/javascript">


  //When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      var smallMenu = document.getElementsByClassName('small-nav')[0];

    if (document.body.scrollTop > 143 || document.documentElement.scrollTop > 143) {
      smallMenu.classList.add('show-small-nav');
    } else {
      smallMenu.classList.remove('show-small-nav');

      }
    }




  </script>

@endsection
