<?php 
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EmailRequest as StoreRequest;
use App\Http\Requests\EmailRequest as UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Email;
use App\Notifications\SendCustomEmail;

use Prologue\Alerts\Facades\Alert;

class EmailCrudController extends CrudController {


	public function setup() {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Email");
        $this->crud->setRoute("admin/email");
        $this->crud->setEntityNameStrings('Сообщение', 'Emails');

        /*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'email',
                                'label' => 'Email',
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Title',
                            ]);
        $this->crud->addField([
                                'name' => 'body',
                                'label' => 'Body',
                                'type' => 'ckeditor',
                            ]);    
        $this->crud->allowAccess(['list', 'create', 'delete']);
        // $this->crud->removeButton('update');  
        $this->crud->denyAccess('update');              
    }

	public function store(StoreRequest $request)
	{
        // $request['script'] = response()->json($request['script']);
		// return parent::storeCrud($request);
        $users = Email::all();
        foreach ($users as $user) {
            $user->notify(new SendCustomEmail($request['title'], $request['body']));
        }   
        Alert::success('Рассылка произведена')->flash();
        return redirect(url('admin/email'));
	}

	public function update(UpdateRequest $request)
	{
		// return parent::updateCrud($request);
	}
}