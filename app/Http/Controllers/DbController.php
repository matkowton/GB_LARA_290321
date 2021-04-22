<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use \DB;

class DbController extends Controller
{
    public function index()
    {
       /* $sql = "
            CREATE TABLE test (
                id int PRIMARY KEY AUTO_INCREMENT,
                content varchar(50)
            )
        ";
        dd(DB::unprepared($sql));*/

      /*  $sql = "INSERT INTO test (content) VALUES (:content)";
        $result = DB::insert($sql, [':content' => 'test']);
        dd($result);*/

        /*$sql = "SELECT * FROM test WHERE id = :id";
        $result = DB::select($sql, [':id' => 2]);
        dd($result);*/

        $result = DB::table('test')
            ->where('id',3)
            ->get();

        dd($result);
    }
}
