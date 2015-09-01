<?php namespace Modules\Knowledge\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Knowledge\Entities\Knowledge;
Use Modules\Category\Entities\Category;
Use Redirect, Validator, Input;

class KnowledgeController extends AdminController {

    private $knowledge;

    public function __construct(Knowledge $knowledge)
    {
        parent::__construct();
        $this->knowledge = $knowledge;
    }

	public function index()
	{
		return View::make('knowledge::index');
	}

    public function getDatatable(){
        $knowledge = $this->knowledge->leftJoin('categories','knowledge.category_id','=','categories.id')
            ->select(array('knowledge.id', 'categories.name AS category_name', 'knowledge.title', 'knowledge.created_at'));
        return \Datatables::of($knowledge)
            ->edit_column('category_name', function($row) {
                if(!empty($row->category_name))
                    return "{$row->category_name}";
                else
                    return "-";
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.knowledge.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć post?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.knowledge.destroy\', array( $id )) }}">Usuń</a>
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
        $categories = Category::all();
        $select = array( 0 => '-' );
        $select = $select + $categories->lists('name','id');

        return View::make('knowledge::create')->with('select', $select );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->knowledge->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.knowledge.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'title' => Input::get('title'),
                'content' => Input::get('content'),
                'causes' => Input::get('causes'),
                'prevention' => Input::get('prevention'),
                'repair' => Input::get('repair'),
                'movie' => Input::get('movie'),
                'lang' => Input::get('lang')
            );
            $knowledge = $this->knowledge->create($data);
            $knowledge->save();

            if(Input::get('files')) {
                $updatedItems = array();
                foreach (Input::get('files') as $photo) {
                    $updatedItems[$photo['media_id']] = (array(
                        'weight'=>$photo['weight'],
                        'title'=>$photo['title'],
                    ));
                }
                $knowledge->media()->sync($updatedItems);
            }

            return Redirect::route('admin.knowledge.index')->with('message', 'Dodano nowy wpis do bazy wiedzy ' . $knowledge->title);
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
        $categories = Category::all();
        $select = array( 0 => '-' );
        $select = $select + $categories->lists('name','id');

        $knowledge = $this->knowledge->find($id);

        $mediaListData = $knowledge->media;
        return View::make('knowledge::edit')->with('knowledge', $knowledge)->with('select', $select)->with('mediaListData', $mediaListData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->knowledge->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.knowledge.edit')
                ->withErrors($validator);
        } else {

            $knowledge = $this->knowledge->find($id);
            $knowledge->title = Input::get('title');
            $knowledge->content = Input::get('content');
            $knowledge->causes = Input::get('causes');
            $knowledge->prevention = Input::get('prevention');
            $knowledge->repair = Input::get('repair');
            $knowledge->movie = Input::get('movie');
            $knowledge->lang = Input::get('lang');
            $knowledge->save();

            if(Input::get('files')){
                $updatedItems = array();
                foreach(Input::get('files') as $photo){
                    $updatedItems[$photo['media_id']] = (array(
                        'weight'=>$photo['weight'],
                        'title'=>$photo['title'],
                    ));
                }
                $knowledge->media()->sync($updatedItems);
            }else{
                $knowledge->media()->sync(array());
            }

            return Redirect::route('admin.knowledge.index')->with('message', 'Edytowano post - ' . $knowledge->title);

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
        $knowledge = $this->knowledge->find($id);
        $knowledge->delete();
        return Redirect::route('admin.knowledge.index')->with('message', 'Usunięto post ' . $knowledge->title);
    }
	
}