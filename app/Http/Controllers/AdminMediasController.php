<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
      $file = $request->file('file');

      $name = time().$file->getClientOriginalName();

      $file->move('images',$name);

      Photo::create(["file"=>$name]);

    }

    public function destroy($id)
    {
		$photo = Photo::findOrFail($id);
		if(file_exists(public_path().$photo->file)){
			unlink(public_path().$photo->file); 
		}
        $photo->delete();
        //return redirect('/admin/media');
    }

    public function deleteMedia(Request $request)
    {
        
        if(isset($request->delete_single) && !empty($request->photo)){
            $this->destroy($request->photo);
        }

        if(isset($request->delete_all) && !empty($request->photo)){
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {
                $this->destroy($photo->id);
            }
        } 

        return redirect()->back();      
    }
}
