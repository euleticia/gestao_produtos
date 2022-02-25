<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RModel extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = true; //created_at and updated_at
    public $incrementing = true; //tabelas trabalhando com auto incremento
    protected $fillable = []; // atributos que a classe vai guardar no model

    public function beforeSave(){
        return true;
    }

    public function save(array $options = [])
    {
        try{

            if(!$this->beforeSave()){
                return false;
            }

            return parent::save($options);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}

