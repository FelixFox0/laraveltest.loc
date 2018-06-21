<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usersfile;
use Illuminate\Support\Facades\Storage;

class UsersfileController extends Controller
{
    public function index()
    {
        return view('file', ['files' => Usersfile::all()]);
    }

    public function create(Request $request)
    {
        $rules = [
            'url' => 'url|active_url|unique:usersfiles|Urlfile'
        ];
        $this->validate($request, $rules);

            Storage::disk('public')->put(basename($request->url), file_get_contents($request->url), 'public');
            $file = new Usersfile();
            $file->mime_type = mime_content_type(storage_path('app/public/' . basename($request->url)));
            $file->url = $request->url;
            $file->path = asset('storage/app/public/' . basename($request->url));
            $file->save();

            $json = $file;
            $json->error = '';
        return response()->json($json);
    }

    public function destroy($id)
    {
        $delete_file = Storage::disk('public')->delete(basename(Usersfile::find($id)->path));
        $delete_field = Usersfile::destroy($id);
        if($delete_file && $delete_field){
            return 'destroy complete';
        }else{
            return 'destroy fail';
        }
    }
    
}
