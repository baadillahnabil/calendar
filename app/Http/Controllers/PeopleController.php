<?php

namespace App\Http\Controllers;

use File;
use Response;
use View;

class PeopleController extends Controller
{
    public function index()
    {
//        Storage::disk('local')->put('file.txt', 'Contents');
//
//        $data = json_encode(['Example 1', 'Example 2', 'Example 3',]);
//        $fileName = time() . '_datafile.json';
//        File::put(public_path('/upload/' . $fileName), $data);
//        return Response::download(public_path('/upload/' . $fileName));
//
//        $fileText = "This is some text\nThis test belongs to my file download\nBooyah";
//        $myName = "ThisDownload.txt";
//        $headers = ['Content-type'=>'text/plain', 'test'=>'YoYo', 'Content-Disposition'=>sprintf('attachment; filename="%s"', $myName),'X-BooYAH'=>'WorkyWorky','Content-Length'=>sizeof($fileText)];
//        return Response::make($fileText, 200, $headers);
//
//
//        $file = File::get(public_path('storage/1-1-2017.txt'));
////        $data = explode('|', $file);
//
//        $data = preg_split('/\n|\r\n?/', $file);
//        $data2 = explode('|', $data[2]);
//
//
//
//        // you can access it like array. ex $data[0] = 1 , $data[1] = Nabil , $data[1] = 1995
//
//        return $data2;
//
//
//        $user = [
//            '1|Nabil|1995-',
//            '2|Nabil|1995-',
//            '3|Nabil|1995-',
//            '4|Nabil|2001-',
//        ];
//        $dir = public_path('storage/');  //make sure to put it bellow what the server can reach.
//        File::put($dir . 'Nabil.txt', $user);

        // get the file
        $file = '';
        $date = [];
        for ($month = 0; $month <= 12; $month++) {
            for ($day = 0; $day <= 31; $day++) {
                if (file_exists(public_path('storage/' . $day . '-' . $month . '-2017.txt'))) {
                    $file = File::get(public_path('storage/' . $day . '-' . $month . '-2017.txt'));
                    $data = preg_split('/\n|\r\n?/', $file);
                    $date[count($date)] = [
                        $day . '-' . $month,
                        array_slice($data, 0, count($data) - 1, true)
                    ];
                }
            }
        }

        // send the array of data
        return $date;
    }

    public function create($day, $month, $people_id)
    {
        //
    }

    public function show($day, $month, $people_id)
    {

    }

    public function edit($day, $month, $people_id)
    {
        //
    }

    public function destroy($day, $month, $people_id)
    {
        //
    }
}
