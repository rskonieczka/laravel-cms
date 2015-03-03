<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Media\Entities\Media;
Use Redirect, Input;

class MediaController extends AdminController
{

    private $media;
    private $dt_param;

    public function __construct(Media $media)
    {
        parent::__construct();
        $this->media = $media;
    }

    /**
     * Display a listing of the resource.
     * GET /admin/media
     *
     * @return Response
     */
    public function index()
    {
        return View::make('media::index');
    }

    public function getDatatable($param = false)
    {
        $this->dt_param = $param;
        $media = $this->media->select('media.id', 'media.realname as filename', 'media.name', 'media.type as filetype', 'media.created_at');
        return \Datatables::of($media)
            ->edit_column('filename', function ($row) {
                if (!empty($row->filename) && in_array($row->filetype, array('jpg', 'jpeg', 'gif', 'png'))){
                    $thumb = \Imagecache::get('media/'.$row->filename, 'medialist')->img;
                    $url = \URL::to("/uploads/media/{$row->filename}");
                    return "<div id=\"geturl\" data-url=\"$url\">$thumb</div>";
                }
                else
                    return "-";
            })
            ->add_column('operations', function($row){
                if($this->dt_param === 'selectable'){
                     return "<button class='btn btn-flat btn-sm btn-success' id='add' style='padding:1px 5px;'><i class=\"fa fa-share\"></i></button>";
                }
                $url = \URL::route( 'admin.media.destroy', array( $row->id ));
                return "
                    <a data-method=\"delete\" data-confirm=\"Czy napewno usunąć plik?\" class=\"btn btn-sm btn-flat btn-danger\" href=\"$url\">Usuń</a>
                    ";

            })
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
        return View::make('media::create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/media
     *
     * @return Response
     */
    public function store()
    {
        $fileData = $this->uploadFile();
        if (is_array($fileData)) {
            $media = $this->media->create($fileData);
            $media->save();
            return Redirect::route('admin.media.index')->with('message', 'Dodano nowy plik ' . $media->name);
        }
        return Redirect::route('admin.media.index')
            ->withErrors('Nieporawny rozmiar lub format pliku');

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
        return Redirect::route('admin.media.index');
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
        return Redirect::route('admin.media.index');
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
        $media = $this->media->find($id);
        $filepath = public_path() . '/uploads/media/' . $media->realname;
        if (\File::exists($filepath)) {
            \File::delete($filepath);
            $media->delete();
            return Redirect::route('admin.media.index')->with('message', 'Usunięto plik ' . $media->name);
        }
        return Redirect::route('admin.media.index')->with('error', 'Nie można zlokalizować pliku: ' . $filepath);
    }

    private function uploadFile()
    {
        $destinationPath = public_path() . '/uploads/media';
        $file = \Input::file('file');
        if (!isset($file))
            return false;

        if ($file->isValid()) {
            $realname = str_random(12);
            $name = $file->getClientOriginalName();
            $type = $file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $realname . '.' . $type);

            if ($upload_success) {
                return array(
                    'name' => $name,
                    'realname' => $realname.'.'.$type,
                    'type' => $type);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}