<?php

namespace App\Http\Controllers\Admin;
use App;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Repositories\ImageRepository;
use App\Models\Product;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */

class ProductCrudController extends CrudController
{

    private $image;

    public function setup()
    {


        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */

        $this->crud->setEditView('product/customEdit');
        $this->crud->setCreateView('product/customCreate');

        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');


        $this->crud->addField([
           'name' => 'name',
           'label' => 'Name',
           'type' => 'text',
           // 'tab' => 'Details'
        ], 'both');


        $this->crud->addField([
           'name' => 'description',
           'label' => 'Description',
           'type' => 'summernote',
           // 'tab' => 'Description'
        ], 'both');



        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');


        $this->crud->addField([
           'name' => 'main_image',
           'label' => 'Product Image',
           'type' => 'upload',

           'upload' => true,
           'attributes' => [
             'placeholder' => 'Some text when empty',
             'class' => 'fileInput',
           ],
        ], 'both');

    }

    public function store(StoreRequest $request)
    {

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here

        if ($request->hasFile('main_image')) {

            $this->crud->model->storeProductImage($request, $this->crud->entry->id);
      }

        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here

        // $this->ImageRepository->test($request);
        if ($request->hasFile('main_image')) {

            $this->crud->model->storeProductImage($request, $this->crud->entry->id);
        }


        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
