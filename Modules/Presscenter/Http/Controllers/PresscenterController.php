<?php namespace Modules\Presscenter\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Presscenter\Entities\Presscenter;
Use Modules\Category\Entities\Category;
Use Redirect, Validator, Input;

class PresscenterController extends AdminController {

	private $presscenter;

	public function __construct(Presscenter $presscenter){
		$this->presscenter = $presscenter;
		parent::__construct();
	}

	public function index()
	{
		return View::make('presscenter::index');
	}

	public function getDatatable(){
		$post = $this->presscenter->leftJoin('categories','presscenter.category_id','=','categories.id')
			->select(array('presscenter.id', 'categories.name AS category_name', 'presscenter.title', 'presscenter.created_at'));
		return \Datatables::of($post)
			->edit_column('category_name', function($row) {
				if(!empty($row->category_name))
					return "{$row->category_name}";
				else
					return "-";
			})
			->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.presscenter.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć aktualność?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.presscenter.destroy\', array( $id )) }}">Usuń</a>
                        ')
			->make();
	}

	public function create()
	{
		$categories = Category::all();
		$select = array( 0 => '-' );
		$select = $select + $categories->lists('name','id');

		return View::make('presscenter::create')->with('select', $select );
	}



	public function store()
	{
		$validator = Validator::make(Input::all(), $this->presscenter->rules);
		if ($validator->fails()) {
			return Redirect::route('admin.presscenter.create')
				->withErrors($validator)->withInput();
		} else {

			$data = array(
				'title' => Input::get('title'),
				'content' => Input::get('content'),
				'category_id' => Input::get('category_id'),
				'file' => $this->uploadFile()
			);
			$post = $this->presscenter->create($data);
			$post->save();
			return Redirect::route('admin.presscenter.index')->with('message', 'Dodano nowy plik ' . $post->name);
		}
	}

	public function edit($id)
	{
		$categories = Category::all();
		$select = array( 0 => '-' );
		$select = $select + $categories->lists('name','id');

		$presscenter = $this->presscenter->find($id);
		return View::make('presscenter::edit')->with('presscenter', $presscenter)->with('select', $select);
	}

	public function update($id)
	{
		$validator = Validator::make(Input::all(), $this->presscenter->rules);
		if ($validator->fails()) {
			return Redirect::route('admin.presscenter.edit')
				->withErrors($validator);
		} else {

			$presscenter = $this->presscenter->find($id);
			$presscenter->title = Input::get('title');
			$presscenter->content = Input::get('content');
			$presscenter->category_id = Input::get('category_id');
			$presscenter->file = $this->uploadFile($presscenter->file);
			$presscenter->save();

			return Redirect::route('admin.presscenter.index')->with('message', 'Edytowano plik - ' . $presscenter->title);

		}
	}

	public function destroy($id)
	{
		$presscenter = $this->presscenter->find($id);
		$presscenter->delete();
		return Redirect::route('admin.presscenter.index')->with('message', 'Usunięto plik ' . $presscenter->name);
	}

	private function uploadFile($oldPhoto = false){
		$destinationPath = public_path().'/uploads/presscenter';
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
			Redirect::route('admin.presscenter.edit')
				->withErrors('Nieporawny rozmiar lub format pliku');
			return false;
		}
	}
	
}