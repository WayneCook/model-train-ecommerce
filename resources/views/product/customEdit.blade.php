@extends('backpack::layout')

@section('head')
	<link href="{{ asset('css/dropzone/dropzone.css') }}" rel="stylesheet"/>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<style media="screen">
	.dz-progress {
		/* progress bar covers file name */
		display: none !important;
		}

		/* .dz-image img{
			width: 100%;
			height: 100%;
		} */
	</style>
	@endsection

@section('header')
	<section class="content-header">
	  <h1>
        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
        <small>{!! $crud->getSubheading() ?? trans('backpack::crud.edit').' '.$crud->entity_name !!}.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'),'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.edit') }}</li>
	  </ol>
	</section>
@endsection

@section('content')


	<h1>{{$crud->entry->id}}</h1>


@if ($crud->hasAccess('list'))
	<a href="{{ url($crud->route) }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a>
@endif

<div class="row m-t-20">
	<div class="{{ $crud->getEditContentClass() }}">
		<!-- Default box -->

		@include('crud::inc.grouped_errors')

		  <form method="post"
		  		action="{{ url($crud->route.'/'.$entry->getKey()) }}"
				@if ($crud->hasUploadFields('update', $entry->getKey()))
				enctype="multipart/form-data"
				@endif
		  		>
		  {!! csrf_field() !!}
		  {!! method_field('PUT') !!}
		  <div class="col-md-12">
		  	@if ($crud->model->translationEnabled())
		    <div class="row m-b-10">
		    	<!-- Single button -->
				<div class="btn-group pull-right">
				  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    {{trans('backpack::crud.language')}}: {{ $crud->model->getAvailableLocales()[$crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()] }} &nbsp; <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				  	@foreach ($crud->model->getAvailableLocales() as $key => $locale)
					  	<li><a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a></li>
				  	@endforeach
				  </ul>
				</div>
		    </div>
		    @endif
		    <div class="row display-flex-wrap">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      @if(view()->exists('vendor.backpack.crud.form_content'))
		      	@include('vendor.backpack.crud.form_content', ['fields' => $fields, 'action' => 'edit'])

					@else
		      	@include('crud::form_content', ['fields' => $fields, 'action' => 'edit'])
		      @endif



					{{-- Custom image upload section --}}
					<!-- IMPORTANT enctype attribute! -->


		    </div><!-- /.box-body -->

				<div class="dropzone" style="border:1px solid #000;">

					<center> <h3 >Dropzone Sortable Demo</h3> </center>
				</div>

            <div class="">

                @include('crud::inc.form_save_buttons')

		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
		  </form>
	</div>
</div>





{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="{{ asset('js/dropzone/dropzone.js') }}"></script> --}}

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}
{{-- <script src="{{ asset('js/sortable/sortable.js') }}"></script> --}}


    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

<script type="text/javascript">

Dropzone.autoDiscover = false;

// var mockFile = { name: 'sassdf.jpeg', size: 05, type: 'jpeg', url: 'https://66.media.tumblr.com/a1bd01cb09ee22123416dcb7e55870a5/tumblr_n0ii1mJabf1tr51jmo1_1280.jpg'};


// var myDropzone = new Dropzone();

var myDropzone = $(".dropzone").dropzone({
	url: "/file/post",
	autoProcessQueue: false,
	init: function () {
	    var mockFile = { name: 'sassdf.jpeg', size: 05, type: 'jpeg', url: '{{asset('images/product/default_product.jpg')}}'};
			// Call the default addedfile event handler
			this.emit("addedfile", mockFile);

			// And optionally show the thumbnail of the file:
			// this.emit("thumbnail", mockFile, mockFile.url);
			// Or if the file on your server is not yet in the right
			// size, you can let Dropzone download and resize it
			// callback and crossOrigin are optional.
			this.createThumbnailFromUrl(mockFile, mockFile.url);

			// Make sure that there is no progress bar, etc...
			this.emit("complete", mockFile);

			// If you use the maxFiles option, make sure you adjust it to the
			// correct amount:
			var existingFileCount = 1; // The number of files already uploaded
			// this.options.maxFiles = this.options.maxFiles - existingFileCount;
	}

});

// Create the mock file:
// var mockFile = { name: "Filename", size: 12345 };







$(function(){
		$(".dropzone").sortable({
			 items:'.dz-preview',
			 cursor: 'move',
			 opacity: 0.5,
			 containment: '.dropzone',
			 distance: 20,
			 tolerance: 'pointer'
		});
});





</script>



@endsection
