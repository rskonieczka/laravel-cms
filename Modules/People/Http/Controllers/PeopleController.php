<?php namespace Modules\People\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\People\Entities\People;
Use Redirect, Input, Validator;

class PeopleController extends AdminController {

    private $people;

    public function __construct(People $people)
    {
        parent::__construct();
        $this->people = $people;
    }

	public function index()
	{
		return View::make('people::index');
	}

    public function getDatatable(){
        $people = $this->people->select(array('people.id', 'people.photo AS photo', 'people.name', 'people.created_at'));
        return \Datatables::of($people)
            ->edit_column('photo', function ($row) {
                    $thumb = \Imagecache::get('people/'.$row->photo, 'medialist')->img;
                    $url = \URL::to("/uploads/people/{$row->photo}");
                    return "<div id=\"geturl\" data-url=\"$url\">$thumb</div>";
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.people.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć uczestnika?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.people.destroy\', array( $id )) }}">Usuń</a>
                        ')
            ->make();
    }

    public function create()
    {
        return View::make('people::create');
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), $this->people->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.people.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'name' => Input::get('name'),
                'desc' => Input::get('desc'),
                'photo' => $this->uploadFile()
            );
            $people = $this->people->create($data);
            $people->save();
            return Redirect::route('admin.people.index')->with('message', 'Dodano nowego uczestnika ' . $people->name);
        }
    }

    public function edit($id)
    {
        $people = $this->people->find($id);
        return View::make('people::edit')->with('people', $people);
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->people->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.people.edit')
                ->withErrors($validator);
        } else {

            $people = $this->people->find($id);
            $people->name = Input::get('name');
            $people->desc = Input::get('desc');
            $people->photo = $this->uploadFile($people->photo);
            $people->save();

            return Redirect::route('admin.people.index')->with('message', 'Edytowano uczestnika - ' . $people->name);

        }
    }

    public function destroy($id)
    {
        $people = $this->people->find($id);
        $people->delete();
        return Redirect::route('admin.people.index')->with('message', 'Usunięto uczestnika ' . $people->name);
    }

    private function uploadFile($oldPhoto = false){
        $destinationPath = public_path().'/uploads/people';
        $file = \Input::file('photo');
        if(!isset($file))
            return $oldPhoto;

        if ($file->isValid()) {
            $filename = str_random(12);
            $extension = $file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $filename . '.' . $extension);

            if ($upload_success) {
                return $filename . '.' . $extension;
            } else {
                return false;
            }
        }else{
            Redirect::route('admin.people.edit')
                ->withErrors('Nieporawny rozmiar lub format zdjęcia');
            return false;
        }
    }


}