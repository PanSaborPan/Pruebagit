<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class productos extends Model
{
    use HasFactory;


    public static function updateData($id, $data)
    {
        DB::table('productos')->where('SKU', $id)->update($data);
    }

    public static function deleteData($id = 0)
    {
        DB::table('productos')->where('SKU', '=', $id)->delete();
    }
}
