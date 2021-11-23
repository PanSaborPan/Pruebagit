<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'Id_usuario';

    use HasFactory;

    public static function updateData($id, $data)
    {
        DB::table('usuarios')->where('Id_usuario', $id)->update($data);
    }

    public static function deleteData($id = 0)
    {
        DB::table('usuarios')->where('Id_usuario', '=', $id)->delete();
    }
}
