<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Gallery\Entities\Gallery;
Use Modules\Category\Entities\Category;
use Modules\Site\Entities\Site;
Use Redirect, Validator, Input;

class GalleryController extends AdminController
{

    private $gallery;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Site
     */
    private $site;

    public function __construct(Gallery $gallery, Category $category, Site $site)
    {
        parent::__construct();
        $this->gallery = $gallery;
        $this->category = $category;
        $this->site = $site;
    }

    /**
     * Display a listing of the resource.
     * GET /admin/media
     *
     * @return Response
     */
    public function index()
    {
        return View::make('gallery::index');
    }

    public function getDatatable()
    {
        $gallery = $this->gallery->leftJoin('categories','galleries.category_id','=','categories.id')
            ->select(array('galleries.id', 'galleries.title', 'galleries.key', 'categories.name AS category_name', 'galleries.created_at'));
        return \Datatables::of($gallery)
            ->edit_column('category_name', function($row) {
                if(!empty($row->category_name))
                    return "{$row->category_name}";
                else
                    return "-";
            })
            ->add_column('operations', '
                            <a class="btn btn-sm btn-flat btn-success" href="{{ URL::route( \'admin.gallery.edit\', array( $id )) }}">Edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć plik?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.gallery.destroy\', array( $id )) }}">Usuń</a>
                        ')
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin/media/create
     *
     * @return Response
     */
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
        $select = array( 0 => '-' );
        $select = $select + $cat;

        return View::make('gallery::create')->with('select', $select );
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/media
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->gallery->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.gallery.create')
                ->withErrors($validator)->withInput();
        } else {
            $gallery = new Gallery(Input::all());
            $gallery->save();
            if(Input::get('photo')) {
                $updatedItems = array();
                foreach (Input::get('photo') as $photo) {
                    $updatedItems[$photo['media_id']] = (array(
                        'weight'=>$photo['weight'],
                        'link'=>$photo['link'],
                        'title'=>$photo['title'],
                        'content'=>$photo['content']
                    ));
                }
                $gallery->media()->sync($updatedItems);
            }
            $gallery->push();
            return Redirect::route('admin.gallery.index')->with('message', 'Dodano nową galerię ' . $gallery->title);
        }

    }

    /**
     * Display the specified resource.
     * GET /admin/media/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Redirect::route('admin.media.index');
    }

    /**
     * Show the form for editing the specified resource.
     * GET /admin/media/{id}/edit
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
        $select = array( 0 => '-' );
        $select = $select + $cat;

        $gallery = $this->gallery->find($id);

        $mediaListData = $gallery->media;


        return View::make('gallery::edit')->with('select', $select )->with('gallery', $gallery)->with('mediaListData', $mediaListData);
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
        $validator = Validator::make(Input::all(), $this->gallery->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.gallery.edit')
                ->withErrors($validator);
        } else {
            $gallery = $this->gallery->find($id);
            $gallery->title = Input::get('title');
            $gallery->key = Input::get('key');
            $gallery->category_id = Input::get('category_id');
            $gallery->save();

            if(Input::get('photo')){
                $updatedItems = array();
                foreach(Input::get('photo') as $photo){
                    $updatedItems[$photo['media_id']] = (array(
                        'weight'=>$photo['weight'],
                        'link'=>$photo['link'],
                        'title'=>$photo['title'],
                        'content'=>$photo['content']
                    ));
                }
                $gallery->media()->sync($updatedItems);
            }else{
                $gallery->media()->sync(array());
            }


            return Redirect::route('admin.gallery.index')->with('message', 'Dodano nową galerię ' . $gallery->title);
        }
        return Redirect::route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /admin/media/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $gallery = $this->gallery->find($id);
        $gallery->media()->detach($gallery->media_id);
        $gallery->delete();
        return Redirect::route('admin.gallery.index')->with('message', 'Usunięto galerię ' . $gallery->title);
    }

}