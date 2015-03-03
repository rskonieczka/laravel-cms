<?php namespace Modules\Product\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Category\Entities\Category;
Use Modules\Product\Entities\Product;
Use Redirect, Input, Validator;

class ProductController extends AdminController {

	private $product;

	public function __construct(Product $product){
		$this->product = $product;
		parent::__construct();
	}

	public function index()
	{
		return View::make('product::index');
	}

	public function getDatatable(){
		$product = $this->product->leftJoin('categories','products.category_id','=','categories.id')
			->select(array('products.id', 'categories.name AS category_name', 'products.photo AS product_photo', 'products.name', 'products.price', 'products.created_at'));
		return \Datatables::of($product)
			->edit_column('category_name', function($row) {
				if(!empty($row->category_name))
					return "{$row->category_name}";
				else
					return "-";
			})
			->edit_column('product_photo', function($row) {
				$photoArr = explode('.', $row->product_photo);
				if (!empty($row->product_photo) && in_array($photoArr[1], array('jpg', 'jpeg', 'gif', 'png'))){
					$thumb = \Imagecache::get('products/'.$row->product_photo, 'medialist')->img;
					$url = \URL::to("/uploads/products/{$row->product_photo}");
					return "<div id=\"geturl\" data-url=\"$url\">$thumb</div>";
				}
				else
					return "-";
			})
			->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.product.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć produkt?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.product.destroy\', array( $id )) }}">Usuń</a>
                        ')
			->make();
	}

	public function create()
	{
		$categories = Category::all();
		$select = array( 0 => '-' );
		$select = $select + $categories->lists('name','id');

		return View::make('product::create')->with('select', $select );
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), $this->product->rules);
		if ($validator->fails()) {
			return Redirect::route('admin.product.create')
				->withErrors($validator)->withInput();
		} else {

			$data = array(
				'name' => Input::get('name'),
				'desc' => Input::get('desc'),
				'price' => Input::get('price'),
				'category_id' => Input::get('category_id'),
				'photo' => $this->uploadFile()
			);
			$product = $this->product->create($data);
			$product->save();
			return Redirect::route('admin.product.index')->with('message', 'Dodano nowy produkt ' . $product->name);
		}
	}

	public function edit($id)
	{
		$categories = Category::all();
		$select = array( 0 => '-' );
		$select = $select + $categories->lists('name','id');

		$product = $this->product->find($id);
		return View::make('product::edit')->with('product', $product)->with('select', $select);
	}

	public function update($id)
	{
		$validator = Validator::make(Input::all(), $this->product->rules);
		if ($validator->fails()) {
			return Redirect::route('admin.panel.edit')
				->withErrors($validator);
		} else {

			$product = $this->product->find($id);
			$product->name = Input::get('name');
			$product->price = Input::get('price');
			$product->desc = Input::get('desc');
			$product->category_id = Input::get('category_id');
			$product->photo = $this->uploadFile($product->photo);
			$product->save();

			return Redirect::route('admin.product.index')->with('message', 'Edytowano produkt - ' . $product->name);

		}
	}

	public function destroy($id)
	{
		$product = $this->product->find($id);
		$product->delete();
		return Redirect::route('admin.product.index')->with('message', 'Usunięto produkt ' . $product->name);
	}

	private function uploadFile($oldPhoto = false){
		$destinationPath = public_path().'/uploads/products';
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
			Redirect::route('admin.product.edit')
				->withErrors('Nieporawny rozmiar lub format zdjęcia');
			return false;
		}
	}
	
}