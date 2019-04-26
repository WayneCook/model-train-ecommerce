<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SubCategoryRequest as StoreRequest;
use App\Http\Requests\SubCategoryRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use App\Models\Category;

/**
 * Class SubCategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SubCategoryCrudController extends CrudController
{
    public function setup()
    {

      $this->crud->addField([
         'name' => 'categories_id',
         'label' => 'Category',
         'type' => 'select',
         'entity' => 'categories',
         'attribute' => 'name',
         'model' => "App\Models\Category"
      ], 'both');


        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\SubCategory');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/sub-category');
        $this->crud->setEntityNameStrings('subcategory', 'sub categories');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in SubCategoryRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
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
