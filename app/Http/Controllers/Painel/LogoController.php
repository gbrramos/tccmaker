<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Logo;
use RW940cms\Models\Media;

use RW940cms\Criteria\StatusCriteria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input as Input;

class LogoController extends Controller
{
    public function uploadLogo(Request $request)
    {
        $arrayFile = array();
        $files = Request(['imagePath']);
        foreach ($files as $file) {
            $e = explode(".", $file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e);
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('uploads/img/logos/', $fileName);

            Media::create([
                'file'=>$fileName,
                'type'=>end($e),
                'folder'=>'uploads/img/logos']);

        }
        return response()->json($arrayFile);
    }

    public function dropLogo(Request $request)
    {
        $data = $request->all();
        $file = Request(['imagePath']);
        $e = explode(".", $file->getClientOriginalName());
        $n = str_replace(end($e), "", $file->getClientOriginalName());
        $newName = Str::slug($n, "-") .".".end($e);
        $fileName = time(). "-". $newName;
        unlink("uploads/img/logos/".$fileName);
     
    }

    public function uploadProfile(Request $request)
    {
        $arrayFile = array();
        $files = Request(['imagePath']);
        foreach ($files as $file) {
            $e = explode(".", $file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e);
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('uploads/img/profiles/', $fileName);

            Media::create([
                'file'=>$fileName,
                'type'=>end($e),
                'folder'=>'uploads/img/profiles']);

        }
        return response()->json($arrayFile);
    }
}
