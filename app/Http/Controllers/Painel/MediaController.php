<?php
namespace RW940cms\Http\Controllers\Painel;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RW940cms\Models\Media;
use RW940cms\Http\Requests;
use URL;
use Illuminate\Support\Str;
use Image;
use File;
class MediaController extends Controller
{
	
	    public function index(Request $request,$folder = null){
	    	
	    	/*$absoluteFolderPath = $_SERVER['DOCUMENT_ROOT'] . '/img/parceiros/';
	   	 	$fnames = scandir($absoluteFolderPath);
	   	 	$arrayDir = [];
	   	 	$arrayFile = [];
	   	 	foreach ($fnames as $key => $value) {
	   	 		if(is_dir($absoluteFolderPath . $value)){
					if($value != '.' or $value != '..'){
						$arrayDir[] = $value;
					}
	   	 		}
	   	 		if(!is_dir($absoluteFolderPath . $value)){
	   	 			$ext = explode('.', $value);
	   	 			$ext = end($ext);
	   	 			$media = Media::create(['file'=>$value,'type'=>$ext,'folder_parent'=>'img/','folder'=>'parceiros/']);
	   	 		}
	   	 	}
	*/
	   	 	$folders = [];
			if(!$folder){
				$folder = "uploads";
			}
			//$folderAtual = $folder;
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);
			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			/*$foldersAll = Media::select('folder')->where('folder','!=',$folderAtual)->groupBy('folder')->get();
			foreach ($foldersAll as $key => $value) {
				
					$folders[] = $value->folder;
				
			}
			*/
			$foldersScan = scandir('uploads');
			foreach ($foldersScan as $key => $value) {
					if(is_dir('uploads/'. $value) && $value != "." && $value != ".."){
						$folders[] = $value;
					}
			}
   	 	return view("orientador.media.index",compact('files','folders','folderAtual','folder_parent'));
    }
    public function listaFiles(Request $request){
    	$data = $request->all();
    	$folderAtual = $data['folder'];
    	//dd($folderAtual);
    		$arquivos = scandir('uploads/'.$folderAtual);
			foreach ($arquivos as $key => $value) {
					if(!is_dir('uploads/'.$folderAtual ."/". $value) && $value != "." && $value != ".."){
						$ext = explode('.',$value);
						Media::firstOrCreate(['file' =>  $value,'folder'=>$folderAtual."/",'type'=>end($ext)]);
					}
			}
   		$files = Media::where(['folder'=>$folderAtual.'/'])->orderBy('id','desc')->paginate(20);
			foreach ($files as $key => $file) {
				
					if(!file_exists("uploads//".$file->folder_parent.$file->folder.$file->file)){
						Media::where(['id'=>$file->id])->delete();
						unset($files[$key]);
					}
				
			}
			
		return view("orientador.media._lista-files",compact('files','folderAtual'));
    }
    public function newFolder(Request $request){
    	$data = $request->all();
    	if($data['folder_pai'] != "uploads/"){
    		$path = public_path()."/uploads/".$data['folder_pai']."/".$data['name_folder'];
    		File::makeDirectory($path);

    	}else{
    		$path = public_path()."/".$data['folder_pai']."/".$data['name_folder'];
    		File::makeDirectory($path);
    	}

    		$folders = [];
			$folder = "uploads";
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			
			$foldersScan = scandir('uploads');
			foreach ($foldersScan as $key => $value) {
					if(is_dir('uploads/'. $value) && $value != "." && $value != ".."){
						$folders[] = $value;
					}
			}
   	 	return view("orientador.media._pastas",compact('folders','folderAtual'));

    }
     public function moveFile(Request $request){
        $arrayFile = array();
        $data = $request->all();
        $files = $request->file;
      	$folder = $data['folder'];
      	$folder_parent = $data['folder_parent'];
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n,"-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move("uploads/".$folder,$fileName);
            if(@is_array(getimagesize("uploads/".$folder."/".$fileName))){
	            Image::configure(array('driver' => 'imagick'));
	            $image = Image::make("uploads/".$folder."/".$fileName)->resize(1300, null,function ($constraint) {
	                $constraint->aspectRatio();
	            });
	            $image->save("uploads/".$folder."/".$fileName,100);
	            $media = Media::create(['file'=>$fileName,'type'=>end($e),'folder_parent'=>$folder_parent,'folder'=>$folder]);
        	}
        }
        return response()->json($arrayFile);
    }
    public function deleteFile(Request $request){
        $data = $request->all();
       foreach ($data['file'] as $key => $value) {
      	$file = Media::where(['id'=>$value])->first();
        Media::where(['id'=>$value])->delete();
        $del = unlink("uploads/".$file->folder_parent . $file->folder .$file->file);
        if($del){
            return response()->json(['status'=>'deletado']);
        }
            }
    }
    public function getFile(Request $request,$id){
      
     
        $file = Media::find($id);
        $file->fullpatch = URL::to('/')."/uploads/".$file->folder_parent.$file->folder.$file->file;
       
        return response()->json($file);
       
    }
	    public function popUp(Request $request,$folder = null){
	   	 	//$folders = [];
			if(!$folder){
				$folder = "uploads";
			}
			$folderAtual = $folder.'/';
			$files = Media::where(['folder'=>$folderAtual])->orderBy('id','desc')->paginate(20);
			
			$folder_parent = "";
			if(isset($files[0]->folder_parent)){
				$folder_parent = $files[0]->folder_parent;
			}	
			$foldersAll = Media::select('folder')->where('folder','!=',$folderAtual)->groupBy('folder')->get();
			foreach ($foldersAll as $key => $value) {
				
					$folders[] = $value->folder;
				
			}
			$folders = scandir('uploads');
			foreach ($folders as $key => $value) {
					if($value == "." || $value == ".."){
						unset($folders[$key]);
					}
			}
   	 		return view("orientador.media.include_media",compact('files','folders','folderAtual','folder_parent'));
    	}
}
