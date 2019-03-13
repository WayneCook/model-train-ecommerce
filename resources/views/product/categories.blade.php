@extends('layouts.app')

@section('content')


  <category-card :categories='{!!json_encode($subCategories)!!}'></category-card>



@endsection
