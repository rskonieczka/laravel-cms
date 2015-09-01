<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Post\Entities\Post;
Use Modules\Category\Entities\Category;
use Modules\Site\Entities\Site;
Use Redirect, Validator, Input;

class PostController extends AdminController
{

    private $post;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Site
     */
    private $site;

    public function __construct(Post $post, Category $category, Site $site)
    {
        parent::__construct();
        $this->post = $post;
        $this->category = $category;
        $this->site = $site;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('post::index');
    }

    public function getDatatable(){
        $post = $this->post->leftJoin('categories','posts.category_id','=','categories.id')
            ->select(array('posts.id', 'categories.name AS category_name', 'posts.title', 'posts.created_at'));
        return \Datatables::of($post)
            ->edit_column('category_name', function($row) {
                if(!empty($row->category_name))
                    return "{$row->category_name}";
                else
                    return "-";
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.post.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć aktualność?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.post.destroy\', array( $id )) }}">Usuń</a>
                        ')
            ->make();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $categories = $this->category->where('parent', 0)->orderBy('site_id', 'asc')->orderBy('lang', 'asc')->orderBy('weight', 'asc')->get()->toArray();
        foreach($categories as $category){
            $site = $this->site->where('id', $category['site_id'])->first()->toArray();
            $cat[$category['id']] = $site['name'].' -> '.$category['lang'].' - '.$category['name'];
            $childs = $this->category->where('parent', $category['id'])->get()->toArray();
            if(!empty($childs)){
                foreach($childs as $k => $child){
                    $cat[$child['id']] = $site['name'].' -> '.$category['lang'].' --- '.$child['name'];
                }
            }
        }
        $select = array( 0 => '-' );
        $select = $select + $cat;

        return View::make('post::create')->with('select', $select );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->post->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.post.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'title' => Input::get('title'),
                'content' => Input::get('content'),
                'category_id' => Input::get('category_id'),
                'tags' => Input::get('tags'),
                'badges' => Input::get('badges'),
                'parameters' => Input::get('parameters'),
                'photo' => $this->uploadFile()
            );
            $post = $this->post->create($data);
            $post->save();
            return Redirect::route('admin.post.index')->with('message', 'Dodano nową aktalność ' . $post->name);
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
        $categories = $this->category->where('id', '!=', $id)->where('parent', 0)->orderBy('site_id', 'asc')->orderBy('lang', 'asc')->orderBy('weight', 'asc')->get()->toArray();
        foreach($categories as $category){
            $site = $this->site->where('id', $category['site_id'])->first()->toArray();
            $cat[$category['id']] = $site['name'].' -> '.$category['lang'].' - '.$category['name'];
            $childs = $this->category->where('id', '!=', $id)->where('parent', $category['id'])->get()->toArray();
            if(!empty($childs)){
                foreach($childs as $k => $child){
                    $cat[$child['id']] = $site['name'].' -> '.$category['lang'].' --- '.$child['name'];
                }
            }
        }
        $select = array( 0 => '-' );
        $select = $select + $cat;

        $post = $this->post->find($id);
        return View::make('post::edit')->with('post', $post)->with('select', $select);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->post->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.post.edit', ['id' => $id])
                ->withErrors($validator);
        } else {

            $post = $this->post->find($id);
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->category_id = Input::get('category_id');
            $post->tags = Input::get('tags');
            $post->badges = Input::get('badges');
            $post->parameters = Input::get('parameters');
            $post->photo = $this->uploadFile($post->photo);
            $post->save();

            return Redirect::route('admin.post.index')->with('message', 'Edytowano aktualność - ' . $post->title);

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->post->find($id);
        $post->delete();
        return Redirect::route('admin.post.index')->with('message', 'Usunięto aktualność ' . $post->name);
    }


    private function uploadFile($oldPhoto = false){
        $destinationPath = public_path().'/uploads/posts';
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
            Redirect::route('admin.post.edit')
                ->withErrors('Nieporawny rozmiar lub format zdjęcia');
            return false;
        }
    }


}