<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class proveedor extends Model
{
    protected $table = 'proveedor';
    use HasFactory;


    public static function updateData($id, $data)
    {
        DB::table('proveedor')->where('Id_proveedor', $id)->update($data);
    }

    public static function deleteData($id = 0)
    {
        DB::table('proveedor')->where('Id_proveedor', '=', $id)->delete();
    }
}
