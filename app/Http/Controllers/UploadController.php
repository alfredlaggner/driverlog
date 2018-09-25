<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
    {

        public function __construct()

            {

      //          $this->middleware('auth');

            }


        public function fileUpload(Request $request)

            {

                $this->validate($request, [

                 //   'csv_file' => 'required|file'
                ]);

                $csv = $request->file('csv');
                $input['csvname'] = time() . '.' . 'csv';

                $destinationPath = public_path('/csv');

                $csv->move($destinationPath, $input['csvname']);


                $this->postImage->add($input);


                return back()->with('success', 'CSV Upload successful');

            }
    }   //
