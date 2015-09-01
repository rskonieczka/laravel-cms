<?php namespace Modules\Kontaktperson\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
use Modules\Kontaktperson\Entities\Kontaktperson;
use Modules\Category\Entities\Category;
use Modules\Site\Entities\Site;
Use Redirect, Validator, Input;

class KontaktpersonController extends AdminController {

    private $kontaktperson;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Site
     */
    private $site;

    public function __construct(Kontaktperson $kontaktperson, Category $category, Site $site)
    {
        parent::__construct();
        $this->kontaktperson = $kontaktperson;
        $this->category = $category;
        $this->site = $site;
    }

	public function index()
	{
		return View::make('kontaktperson::index');
	}

    public function getDatatable(){
        $kontaktperson = $this->kontaktperson->select(
            array(
                'kontaktperson.id',
                'kontaktperson.name',
                'kontaktperson.email',
                'kontaktperson.phone',
                'kontaktperson.title',
                'kontaktperson.section',
                'kontaktperson.created_at'
            )
        );
        return \Datatables::of($kontaktperson)
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.kontaktperson.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć osobe kontaktową?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.kontaktperson.destroy\', array( $id )) }}">Usuń</a>
                        ')
            ->make();
    }

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

        return View::make('kontaktperson::create')->with('select', $select);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->kontaktperson->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.kontaktperson.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'title' => Input::get('title'),
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'section' => Input::get('section'),
                'category_id' => Input::get('category_id')
            );
            $kontaktperson = $this->kontaktperson->create($data);
            $kontaktperson->save();

            return Redirect::route('admin.kontaktperson.index')->with('message', 'Dodano nowy wpis do bazy wiedzy ' . $kontaktperson->name);
        }
    }

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

        $kontaktperson = $this->kontaktperson->find($id);
        return View::make('kontaktperson::edit')->with('kontaktperson', $kontaktperson)->with('select', $select);
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->kontaktperson->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.kontaktperson.edit')
                ->withErrors($validator);
        } else {
            $kontaktperson = $this->kontaktperson->find($id);
            $kontaktperson->title = Input::get('title');
            $kontaktperson->name = Input::get('name');
            $kontaktperson->email = Input::get('email');
            $kontaktperson->phone = Input::get('phone');
            $kontaktperson->section = Input::get('section');
            $kontaktperson->category_id = Input::get('category_id');
            $kontaktperson->save();

            return Redirect::route('admin.kontaktperson.index')->with('message', 'Edytowano osobę kontaktową - ' . $kontaktperson->name);
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
        $kontaktperson = $this->kontaktperson->find($id);
        $kontaktperson->delete();
        return Redirect::route('admin.kontaktperson.index')->with('message', 'Usunięto osobę kontaktową ' . $kontaktperson->name);
    }
	
}