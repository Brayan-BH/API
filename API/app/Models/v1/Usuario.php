<?php
 
namespace App\Models\v1;
 
use Illuminate\Database\Eloquent\Model; //ORM de laravel
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class Usuario extends Model
{
    use HasUUID;
    use SoftDeletes;
    
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $keyType = 'string';// convierte a entero
    protected $uuidFieldName = 'id';    
}
