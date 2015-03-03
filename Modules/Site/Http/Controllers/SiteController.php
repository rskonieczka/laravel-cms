<?php

namespace Modules\Site\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Site\Entities\Site;
Use Redirect, Input, Validator;

class SiteController extends AdminController
{

    private $site;

    public function __construct(Site $site){
        $this->site = $site;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {        return View::make('site::index');
    }

    public function getDatatable(){
        $site = $this->site
            ->select(array('sites.id', 'sites.name', 'sites.domain', 'sites.theme', 'sites.created_at'));
        return \Datatables::of($site)
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.site.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć stronę?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.site.destroy\', array( $id )) }}">Usuń</a>
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
        return View::make('site::create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->site->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.site.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'name' => Input::get('name'),
                'domain' => Input::get('domain'),
                'theme' => Input::get('theme'),
            );
            $site = $this->site->create($data);
            $site->save();
            return Redirect::route('admin.site.index')->with('message', 'Dodano nową stronę ' . $site->title);
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
        $site = $this->site->find($id);
        return View::make('site::edit')->with('site', $site);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->site->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.site.edit')
                ->withErrors($validator);
        } else {
            $site = $this->site->find($id);
            $site->name = Input::get('name');
            $site->domain = Input::get('domain');
            $site->theme = Input::get('theme');
            $site->save();
            return Redirect::route('admin.site.index')->with('message', 'Edytowano stronę - ' . $site->name);
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
        $site = $this->site->find($id);
        $site->delete();
        return Redirect::route('admin.site.index')->with('message', 'Usunięto stronę ' . $site->name);
    }


}
