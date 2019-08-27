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


    public function setup()
    {

        // $this->crud->enableReorder('attribute_name', 0);
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

        $this->crud->addField([  // Select
           'label' => "Category",
           'type' => 'select',
           'name' => 'category_id', // the db column for the foreign key
           'entity' => 'category', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Category",
        ]);

        $this->crud->addField([  // Select
           'label' => "Sub-Category",
           'type' => 'select',
           'name' => 'sub_category_id', // the db column for the foreign key
           'entity' => 'subCategory', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\SubCategory",
        ]);

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



        $this->crud->addColumn([
         'name' => 'main_image', // The db column name
         'label' => "Image", // Table column heading
         'type' => 'image',
         'prefix' => 'images/thumbnails/',
         // optional width/height if 25px is not ok with you
         'height' => '60px',
         'width' => '60px',
         ])->makeFirstColumn();

         $this->crud->addColumn([
            // 1-n relationship
            'label' => "Category", // Table column heading
            'type' => "select",
            'name' => 'categories_id', // the column that contains the ID of that connected entity;
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model
         ]);

         $this->crud->addColumn([
            'name' => 'description',
            'visibleInTable' => false,
         ]);

        $this->crud->addColumn([
           'name' => 'sub_categories_id',
           'visibleInTable' => false,
        ]);

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

        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here

        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
