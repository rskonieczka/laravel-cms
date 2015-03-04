<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\User\Entities\Group;
Use Redirect, Input, Validator, Sentry;

class GroupController extends AdminController
{

    private $group;

    public function __construct(Group $group){
        $this->group = $group;
        parent::__construct();
    }

    public function index()
    {
        return View::make('user::group.index');
    }

    public function createFromEmail(){
        dd('sdfsdfdsf');
    }

    public function getDatatable(){
        $group = $this->group
            ->select(array('groups.id', 'groups.name', 'groups.permissions as group_permissions', 'groups.created_at'));
        return \Datatables::of($group)
            /*->edit_column('group_permissions', function($row) {
                $permissions = json_decode($row->group_permissions, true);
                $form = [
                    'backend' => 0,
                    'frontend' => 0
                ];
                $form = array_merge($form, $permissions);
                $str = "";
                foreach($form as $k => $element){
                    $checked = ($element === 1) ? "checked" : "" ;
                    $str .= "<div class='form-group'><div class='checkbox'><label><input type='checkbox' value='1' name='group[{$row->id}]' {$checked} />{$k}</label></div></div><br />";
                }
                return $str;
            })*/
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.group.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć użytkownika?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.group.destroy\', array( $id )) }}">Usuń</a>
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
        return View::make('user::group.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try
        {
            $data = array(
                'name' => Input::get('name'),
                'permissions' => json_decode(Input::get('permissions'), true)
            );
            $group = Sentry::createGroup($data);

            return Redirect::route('admin.group.index')->with('message', 'Dodano nową grupę ' . $group->name);
        }
        catch (\Exception $e)
        {
            return Redirect::route('admin.group.create')
                ->withErrors($e->getMessage())->withInput();
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
        $group = Sentry::findGroupById($id);
        return View::make('user::group.edit')->with('group', $group);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        try
        {
            $group = Sentry::findGroupById($id);

            $group->name = Input::get('name');
            $group->permissions = json_decode(Input::get('permissions'), true);

            if ($group->save())
            {
                return Redirect::route('admin.group.index')->with('message', 'Pomyślnie edytowano grupę ' . $group->name);
            }
            else
            {
                return Redirect::route('admin.group.index')
                    ->withErrors('Nie można edytować grupy');
            }
        }
        catch (\Exception $e)
        {
            return Redirect::route('admin.group.index')
                ->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try
        {
            // Find the user using the user id
            $group = Sentry::findGroupById($id);
            // Delete the user
            $group->delete();
            return Redirect::route('admin.group.index')->with('message', 'Usunięto użytkownika ' . $group->email);
        }
        catch (\Exception $e)
        {
            return Redirect::route('admin.group.index')
                ->withErrors($e->getMessage());
        }

    }



}
