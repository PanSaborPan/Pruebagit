<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ventas extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'Folio';

    use HasFactory;

    public static function updateData($id, $data)
    {
        DB::table('ventas')->where('Folio', $id)->update($data);
    }

    public static function deleteData($id = 0)
    {
        DB::table('ventas')->where('Folio', '=', $id)->delete();
    }
}
