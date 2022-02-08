<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $casts = [
        'sintomas' => 'array'
    ];

    protected $fillable = [
        'name',
        'age',
        'cpf',
        'number',
        'image',
        'sintomas',
        'socialName'
    ];

    // mutators

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtoupper($value);
    }

    public function setSocialNameAttribute($value)
    {
        $this->attributes['socialName'] = mb_strtoupper($value);
    }

     // accessors

    public function getChooseNameAttribute()
    {
        if($this->attributes['socialName']){
            $chooseName = $this->attributes['socialName'];
        }
        else{
            $chooseName = $this->attributes['name'];
        }
        return $chooseName;
    }

    public function getOrganizationAttribute()
    {
        $sintomasOrganizados = json_decode($this->attributes['sintomas']);
        sort($sintomasOrganizados);
        return $sintomasOrganizados;
    }

    protected function defineStatus(array $status) {
        if($this->attributes['sintomas']){
            $info = json_decode($this->attributes['sintomas']);
            $contar = count($info);
            if($contar >= 1 && $contar <= 5){
                $status = $this->attributes['color'] = $status[0];
            }elseif($contar >= 6 && $contar <= 9){
                $status = $this->attributes['color'] = $status[1];
            }elseif($contar >= 10){
                $status = $this->attributes['color'] = $status[2];
            }
        }else{
            $status = $this->attributes['color'] = $status[0];
        }
        return $status;
    }

    public function getColorAttribute()
    {
        return $this->defineStatus([
            'safe',
            'bg-warning',
            'bg-danger',
        ]);
    }

    public function getStatusAttribute()
    {
        return $this->defineStatus([
            'Sintomas insuficientes',
            'Potencial infectado',
            'Possível infectado'
        ]);
    }
}
