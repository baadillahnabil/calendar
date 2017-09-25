<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Response;
use View;

class PeopleController extends Controller
{
    public function index()
    {
        // get the file
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

    public function add(Request $request)
    {
        $new_text = $request->name . '|' . $request->yearBirth . PHP_EOL;
        $path = 'storage/' . $request->day . '-' . $request->month . '-2017.txt';
        file_put_contents(public_path($path), $new_text, FILE_APPEND | LOCK_EX);

        return 'Data Added Successfully';
    }

    public function edit($day, $month, $people_id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $path = 'storage/' . $request->day . '-' . $request->month . '-2017.txt';
        $row_id = $request->rowId - 1;

        $data = file($path); //file in to an array
        unset($data[$row_id]);

        $new_data = implode('', $data);
        file_put_contents(public_path($path), $new_data, LOCK_EX);

        return 'Data Deleted Successfully';
    }
}
