@extends('backpack::layout')

@push('after_styles')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<style media="screen">
		.file-preview-image {
  		width: 100%;
		}

    .well {
      display: none;
    }
	</style>
@endpush

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
		    </div><!-- /.box-body -->

            <div class="">

                @include('crud::inc.form_save_buttons')

		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
		  </form>
	</div>
</div>

@push('after_scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/fileinput.min.js"></script>
  <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/themes/fas/theme.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/locales/pt-BR.js"></script>
  <script type="text/javascript">

  $(document).ready(function(){

    var uploadedImages = false;

    if ("{{$crud->entry->image}}" != "") {
      var uploadedImages = ['<img src="/images/category/{{ $crud->entry->image }}" class="file-preview-image" alt="Desert" title="Desert">'];
    }

    $(".fileInput").fileinput({
      showUpload: false,
			initialPreview: uploadedImages,
      maxFileCount: 1,
			initialPreviewConfig: [
	    {
        caption: "{{ $crud->entry->original_image_name }}",
        url: '/image/deleteOldCategoryImage', // server delete action
        key: 100,
        extra: {id: {{ $crud->entry->id }}}
	    }],
    });

    $(".fileInput").on("filepredelete", function() {
       var abort = true;
       if (confirm("Are you sure you want to delete this image?")) {
           abort = false;
       }
       return abort; // you can also send any data/object that you can receive on `filecustomerror` event
     });
    })
  </script>

  @endpush
@endsection
