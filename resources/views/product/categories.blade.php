@extends('layouts.app')

@section('content')

  <div class="small-nav">
    <div class="small-nav-wrapper">

      <cart-icon></cart-icon>
    </div>
    <nav-menu :fontcolor='"hsla(210, 57%, 20%, 0.82)"' :categories="{{ $categories }}" class="menu small-menu">
    </nav-menu>

  </div>

<div class="category-hero-container saturate" style='background-image: url("images/category/{{$category->image}}")'>

  <div class="hero-content">
      <h1 class="">{{ strtoupper($category->name) }}</h1>
      <p>{{ $category->description }}</p>
  </div>

</div>

<div class="page-heading">
  <center>
    <h1>Shop {{ $category->name }}</h1>
  </center>
</div>

  <category-component :categories='{!!json_encode($category->subCategories)!!}'></category-component>

  <shopping-cart></shopping-cart>

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
