@extends('layouts.app')

@section('css')

@endsection

@section('content')


<div class="small-nav">
    <div class="small-nav-wrapper">
      <cart-icon></cart-icon>
    </div>

    <nav-menu :fontcolor='"hsla(210, 57%, 20%, 0.82)"' :categories="{{ $categories }}" class="menu small-menu"></nav-menu>

  </div>

<search-filters :category="{{ $category->toJson() }}" :subcategory="{{ $subCategory->toJson() }}"></search-filters>
<shopping-cart></shopping-cart>


@endsection

@section('scripts')

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
