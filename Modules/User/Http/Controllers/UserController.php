<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\User\Entities\User;
Use Redirect, Input, Validator, Sentry;

class UserController extends AdminController
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
        parent::__construct();
    }

	public function index()
	{
		return View::make('user::user.index');
	}

    public function createFromEmail(){
        dd('sdfsdfdsf');
    }

    public function getDatatable(){
        $user = $this->user
            ->select(array('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.id as user_group', 'users.last_login',
                'users.created_at', 'users.activated as user_activated'));
        return \Datatables::of($user)
            ->edit_column('user_activated', function($row) {
                if(!empty($row->user_activated))
                    return "<input type=\"checkbox\" value=\"1\" checked />";
                else
                    return "<input type=\"checkbox\" value=\"1\" />";
            })
            ->edit_column('user_group', function($row) {
                $user = \Sentry::findUserById($row->user_group);
                $userGroup = $user->getGroups()->first();
                return $userGroup->name;
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.user.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć użytkownika?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.user.destroy\', array( $id )) }}">Usuń</a>
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
        $allGroups = Sentry::findAllGroups();
        foreach($allGroups as $group){
            $groups[$group->id] = $group->name;
        }
        return View::make('user::user.create')->with('groups', $groups);
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
            if(Input::get('password') != Input::get('password2'))
                return Redirect::route('admin.user.create')
                    ->withErrors('Hasła są różne.')->withInput();

            $data = array(
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => Input::get('activated'),
            );
            $user = Sentry::createUser($data);

            // Find the group using the group id
            $group = Sentry::findGroupById(Input::get('group_id'));

            // Assign the group to the user
            $user->addGroup($group);

            return Redirect::route('admin.user.index')->with('message', 'Dodano nowego użytkownika ' . $user->email);
        }
        catch (\Exception $e)
        {
            return Redirect::route('admin.user.create')
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
        $user = Sentry::findUserById($id);
        $allGroups = Sentry::findAllGroups();
        foreach($allGroups as $group){
            $groups[$group->id] = $group->name;
        }
        $userGroup = $user->getGroups()->first();
        return View::make('user::user.edit')->with('user', $user)->with('groups', $groups)->with('userGroup', $userGroup->id);
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
            if(Input::get('password') != Input::get('password2'))
                return Redirect::route('admin.user.create')
                    ->withErrors('Hasła są różne.')->withInput();

            // Find the user using the user id
            $user = Sentry::findUserById($id);

            // Update the user details
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->activated = Input::get('activated');
            if(Input::get('password') != '')
                $user->password = Input::get('password');

            // Update the user
            if ($user->save())
            {
                $userGroups = $user->getGroups();
                foreach($userGroups as $userGroup){
                    $user->removeGroup(Sentry::findGroupById($userGroup->id));
                }
                $user->addGroup(Sentry::findGroupById(Input::get('group_id')));

                return Redirect::route('admin.user.index')->with('message', 'Pomyślnie edytowano użytkownika ' . $user->email);
            }
            else
            {
                return Redirect::route('admin.user.index')
                    ->withErrors('Nie można edytować użytkownika');
            }
        }
        catch (\Exception $e)
        {
            return Redirect::route('admin.user.index')
                ->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById($id);
            // Delete the user
            $user->delete();
            return Redirect::route('admin.user.index')->with('message', 'Usunięto użytkownika ' . $user->email);
        }
        catch (\Exception $e)
        {
            return Redirect::route('admin.user.index')
                ->withErrors($e->getMessage());
        }

    }



}
