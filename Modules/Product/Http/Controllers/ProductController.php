<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
use Modules\Category\Entities\Category;
use Modules\Media\Entities\Media;
Use Modules\Product\Entities\Product;
use Modules\Site\Entities\Site;
Use Redirect, Validator, Input;

class ProductController extends AdminController
{

    /**
     * @var Product
     */
    private $product;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Site
     */
    private $site;
    /**
     * @var Media
     */
    private $media;

    public function __construct(Product $product, Category $category, Site $site, Media $media)
    {
        parent::__construct();
        $this->product = $product;
        $this->category = $category;
        $this->site = $site;
        $this->media = $media;
    }

    public function index()
    {
        return View::make('product::index');
    }

    public function getDatatable()
    {
        $product = $this->product->select(array('products.id', 'products.novol_id', 'products.name', 'products.voc', 'products.tech_card', 'products.char_card', 'products.created_at'));
        return \Datatables::of($product)
            ->edit_column('voc', function ($row) {
                return str_limit($row->voc, 38);
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.product.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć produkt?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.product.destroy\', array( $id )) }}">Usuń</a>
                        ')
            ->make();
    }


    public function create()
    {
        $categories = $this->category->where('parent', 0)->orderBy('site_id', 'asc')->orderBy('lang', 'asc')->orderBy('weight', 'asc')->get()->toArray();
        foreach ($categories as $category) {
            $site = $this->site->where('id', $category['site_id'])->first()->toArray();
            $cat[$category['id']] = $site['name'] . ' -> ' . $category['lang'] . ' - ' . $category['name'];
            $childs = $this->category->where('parent', $category['id'])->get()->toArray();
            if (!empty($childs)) {
                foreach ($childs as $k => $child) {
                    $cat[$child['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - ' . $child['name'];
                    $childss = $this->category->where('parent', $child['id'])->get()->toArray();
                    if (!empty($childss)) {
                        foreach ($childss as $k => $child2) {
                            $cat[$child2['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - '.$child['name'].' - ' . $child2['name'];
                        }
                    }
                }
            }
        }
        $select = array(0 => '-');
        $select = $select + $cat;

        $productsRelated = $this->product->orderBy('name')->orderBy('created_at', 'desc')->get()->lists('name', 'id');

        return View::make('product::create')->with('select', $select)->with('productsRelated', $productsRelated);
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
                'description' => Input::get('description'),
                'category_id' => Input::get('category_id'),
                'brief' => Input::get('brief'),
                'icons' => Input::get('icons'),
                'table' => Input::get('table'),
                'table_mobile' => Input::get('table_mobile'),
                'special' => Input::get('special'),
                'voc' => Input::get('voc'),
                'tech_card' => $this->uploadCard('tech_card'),
                'char_card' => $this->uploadCard('char_card')
            );
            $product = $this->product->create($data);
            $product->save();

            if (Input::get('files')) {
                $updatedItems = array();
                foreach (Input::get('files') as $photo) {
                    $updatedItems[$photo['media_id']] = (array(
                        'weight' => $photo['weight'],
                        'title' => $photo['title']
                    ));
                }
                $product->media()->sync($updatedItems);
            } else {
                $product->media()->sync(array());
            }

            if(Input::get('products_related')){
                $product->related()->sync(Input::get('products_related'));
            }

            if (Input::get('gallery')) {
                $updatedItems = array();
                foreach (Input::get('gallery') as $photo) {
                    $updatedItems[$photo['media_id']] = (array(
                        'weight' => $photo['weight']
                    ));
                }
                $product->gallery()->sync($updatedItems);
            } else {
                $product->gallery()->sync(array());
            }

            $product->category()->sync(Input::get('category_id'));

            return Redirect::route('admin.product.index')->with('message', 'Dodano nowy produkt ' . $product->name);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->category->where('parent', 0)->orderBy('site_id', 'asc')->orderBy('lang', 'asc')->orderBy('weight', 'asc')->get()->toArray();
        foreach ($categories as $category) {
            $site = $this->site->where('id', $category['site_id'])->first()->toArray();
            $cat[$category['id']] = $site['name'] . ' -> ' . $category['lang'] . ' - ' . $category['name'];
            $childs = $this->category->where('parent', $category['id'])->get()->toArray();
            if (!empty($childs)) {
                foreach ($childs as $k => $child) {
                    $cat[$child['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - ' . $child['name'];
                    $childss = $this->category->where('parent', $child['id'])->get()->toArray();
                    if (!empty($childss)) {
                        foreach ($childss as $k => $child2) {
                            $cat[$child2['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - '.$child['name'].' - ' . $child2['name'];
                        }
                    }
                }
            }
        }
        $select = array(0 => '-');
        $select = $select + $cat;

        $productsRelated = $this->product->orderBy('name')->orderBy('created_at', 'desc')->get();
        foreach($productsRelated as $k => &$related){
            $relatedLists[$related->id] = '[ '.$related->novol_id.' ] '.$related->name;
        }

        $product = $this->product->find($id);
        $mediaListData = $product->media;
        return View::make('product::edit')->with('product', $product)->with('select', $select)
            ->with('relatedLists', $relatedLists)->with('mediaListData', $mediaListData);
    }

    /**
     * Update the specified resource in storage.
     * PUT /admin/media/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->product->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.product.edit', ['id' => $id])
                ->withErrors($validator);
        } else {
            $product = $this->product->find($id);
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->brief = Input::get('brief');
            $product->icons = Input::get('icons');
            $product->table = Input::get('table');
            $product->table_mobile = Input::get('table_mobile');
            $product->voc = Input::get('voc');
            $product->special = Input::get('special');
            $product->tech_card = $this->uploadCard('tech_card', $product->tech_card);
            $product->char_card = $this->uploadCard('char_card', $product->char_card);
            $product->save();

            if (Input::get('files')) {
                $updatedItems = array();
                foreach (Input::get('files') as $photo) {
                    $updatedItems[$photo['media_id']] = (array(
                        'weight' => $photo['weight'],
                        'title' => $photo['title']
                    ));
                }
                $product->media()->sync($updatedItems);
            } else {
                $product->media()->sync(array());
            }

            if (Input::get('category_id'))
                $product->category()->sync(Input::get('category_id'));
            else
                $product->category()->sync(array());

            if(Input::get('products_related')){
                $product->related()->sync(Input::get('products_related'));
            }

            if($this->product->find($id+1)){
                return Redirect::route('admin.product.edit', [$id+1])->with('message', 'Edytowano produkt ');
            }
            return Redirect::route('admin.product.edit', [$id])->with('message', 'Edytowano produkt ');
        }
    }

    private function uploadCard($type, $oldPhoto = false)
    {
        if ($type == 'tech_card') {
            $destinationPath = public_path() . '/karty/tech';
        } else {
            $destinationPath = public_path() . '/karty/bezp';
        }

        $file = \Input::file($type);
        if (!isset($file))
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
        } else {
            Redirect::route('admin.product.edit')
                ->withErrors('Nieporawny rozmiar lub format zdjęcia');
            return false;
        }
    }

    public function deletephoto($mediaId, $productId)
    {
        $product = $this->product->find($productId);
        $media = $this->media->find($mediaId);
        $filepath = public_path() . '/uploads/product_gallery/' . $media->realname;
        if (\File::exists($filepath)) {
            \File::delete($filepath);
        }
        $product->gallery()->detach(array($mediaId));
        return 'true';
    }

    public function insertphoto($productId)
    {
        $product = $this->product->find($productId);
        foreach(\Input::file('gallery') as $k => $file){
            $media = $this->media->create(['file' => $file, 'directory' => 'product_gallery']);
        }
        $product->gallery()->attach(array($media->id));
        return 'true';
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return Redirect::route('admin.product.index')->with('message', 'Usunięto produkt ');
    }
}