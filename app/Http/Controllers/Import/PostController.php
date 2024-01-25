<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Csv;
use Validator;

class PostController extends Controller
{
    public static function form(){
        return view('import.form');
    }

    public static function store(Request $request){
        $data = array();

        $validator = Validator::make($request->all(), [
        'file' => 'required|mimes:csv,txt,pdf'
        ]);

        if ($validator->fails()) {

        $data['success'] = 0;
        $data['error'] = $validator->errors()->first('file');

        }else{
        if($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $location = 'csv';
            $file->move($location,$filename);
            $filepath = url('csv/'.$filename);
            $data['success'] = 1;
            $data['message'] = 'Uploaded Successfully!';
            $data['filepath'] = $filepath;
            $data['extension'] = $extension;
        }else{
            $data['success'] = 2;
            $data['message'] = 'File not uploaded.'; 
        }
        }

        $csvdata = [];
        $name = [];
        $email = [];
        
        if (($open = fopen(public_path() . "/csv/".$filename, "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $name[] = $data[0];
                $email[] = $data[1];
                $csvdata[] = $data;
            }
            fclose($open);
        }

        foreach ($csvdata as $key => $item) {
            $data['name'] = $name[$key];
            $data['email'] = $email[$key];
        
            $model = new Csv();
            $result = $model->createOrUpdate($data);
        }
    }
}
