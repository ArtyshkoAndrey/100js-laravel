<?php 
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DayRequest as StoreRequest;
use App\Http\Requests\DayRequest as UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Notifications\NewDay;
use App\Models\Email;
use App\Models\Day;

class DayCrudController extends CrudController {

	public function setup() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Day");
        $this->crud->setRoute("admin/day");
        $this->crud->setEntityNameStrings('День', 'Дни');

        /*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Title',
                            ]);
        $this->crud->addColumn([
                                'name' => 'short_description',
                                'label' => 'Short Description',
                            ]);
        $this->crud->addColumn([
                                'name' => 'slug',
                                'label' => 'Slug',
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Title',
                            ]);
        $this->crud->addField([
                                'name' => 'body',
                                'label' => 'Body',
                                'type' => 'browse',
                            ]);
        $this->crud->addField([
                                'name' => 'short_description',
                                'label' => 'Short Description',
                                'type' => 'ckeditor',
                            ]);
        $this->crud->addField([
                                'name' => 'git_link',
                                'label' => 'GitHub link',
                                'default' => 'https://github.com/',
                            ]);
        $this->crud->addField([
                                'name' => 'meta_description',
                                'label' => 'Meta Description',
                            ]);
        $this->crud->addField([
                                'name' => 'meta_keywords',
                                'label' => 'Meta Keywords',
                            ]);
        $this->crud->addField([
                                'name' => 'user_id',
                                'label' => 'Администратор',
                                'default' => Auth::id(),
                                'type' => 'text',
                                'attributes' => [
                                    'readonly'=>'readonly',
                                ],
                                'readonly'=>'readonly',
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => "Slug (URL)",
                                'type' => 'text',
                                'hint' => 'Will be automatically generated from your title, if left empty.',
                            ]);                        
    }

	public function store(StoreRequest $request)
	{
        Cache::forget('days');
        $emails = Email::all();
        parent::storeCrud($request);
        $slug = Day::orderBy('created_at', 'desc')->first();
        foreach ($emails as $email) {
            $email->notify(new NewDay($request->title, $slug->slug, $request->short_description));
        }
        return \Redirect::to('admin\day');
	}

	public function update(UpdateRequest $request)
	{
        Cache::forget('days');
		return parent::updateCrud($request);
	}
}