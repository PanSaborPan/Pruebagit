<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class clientes extends Model
{
    use HasFactory;

    public static function updateData($id, $data)
    {
        DB::table('clientes')->where('Id_cliente', $id)->update($data);
    }

    public static function deleteData($id = 0)
    {
        DB::table('clientes')->where('Id_cliente', '=', $id)->delete();
    }
}
