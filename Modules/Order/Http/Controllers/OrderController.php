<?php namespace Modules\Order\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Order\Entities\Order;
Use Modules\Category\Entities\Category;
Use Redirect, Validator, Input;
class OrderController extends AdminController {

	private $order;

	public function __construct(Order $order){
		$this->order = $order;
		parent::__construct();
	}

	public function index()
	{
		return View::make('order::index');
	}

    public function getDatatable(){
        $orders = $this->order->select(
            array('orders.id', 'categories.name AS category_name', 'orders.photo AS product_photo', 'orders.name', 'orders.price', 'orders.created_at')
        );
        return \Datatables::of($orders)
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
	
}