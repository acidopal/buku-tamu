<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bukutamu;

class BukuTamuController extends Controller
{
    protected $bukutamuModel;
    
    public function __construct(Bukutamu $bukutamu) {
        $this->bukutamuModel = $bukutamu;
    }

    public function show()
    {   
        $bukutamus = $this->bukutamuModel->all();
        
        return view('bukutamu.show', compact('bukutamus'));
    }

    public function store(Request $request)
    {   
         $bukutamuData = $request->except(['_token']);
         //parse base64 to png
         if(!empty($_POST['foto_bukutamu'])){
            $encoded_data = $_POST['foto_bukutamu'];
            $binary_data = base64_decode( $encoded_data );

            $namafoto = "tamu-".uniqid().".png";
            $result = file_put_contents( 'images/'.$namafoto, $binary_data );
            if (!$result) die("Could not save image!  Check file permissions.");
         }
        $bukutamuData['foto_bukutamu'] = $namafoto;

        if($this->bukutamuModel->create($bukutamuData)){
            $j['title'] = "Sukses";
            $j['text'] = "<b>".$bukutamuData['nama_ortu']."</b> telah mengisi buku tamu!";
            $j['type'] = "success";
        }else{
            $errors_message='';
            foreach ($errors->all() as $message) {
                $errors_message .= "$message </br>";
            }
            $j['title'] = "error";
            $j['text'] = "ERROR : <b>$message</b>";
            $j['type'] = "error";
        }
       
        return response()->json($j);
    }

    public function destroy(Request $request, $idBukutamu)
    {
        $bukutamu = $this->bukutamuModel->find($idBukutamu);
    	if($bukutamu) {
    		$bukutamu->delete();
    		return redirect()->back();
    	}
    }
}
