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

    protected $appends = [
        'status',
        'color'
    ];

    // mutators

    function setNameAttribute($value) {
        $this->attributes['name'] = mb_strtoupper($value);
    }

    function setSocialNameAttribute($value) {
        $this->attributes['socialName'] = mb_strtoupper($value);
    }

     // accessors

    function getChooseNameAttribute() {
        if($this->attributes['socialName']) {
            $chooseName = $this->attributes['socialName'];
        }
        else {
            $chooseName = $this->attributes['name'];
        }
        return $chooseName;
    }

    function getOrganizationAttribute() {
        $sintomasOrganizados = json_decode($this->attributes['sintomas']);
        sort($sintomasOrganizados);
        return $sintomasOrganizados;
    }

    protected function defineStatus(array $status) {
        if(isset($this->attributes['sintomas'])) {
            $info = json_decode($this->attributes['sintomas']);
            $contar = count($info);
            if($contar >= 1 && $contar <= 5) {
                $status = $this->attributes['status'] = $status[0];
            }elseif($contar >= 6 && $contar <= 9) {
                $status = $this->attributes['status'] = $status[1];
            }elseif($contar >= 10) {
                $status = $this->attributes['status'] = $status[2];
            }
        }else {
            $status = $this->attributes['status'] = $status[0];
        }
        return $status;
    }

    function getColorAttribute() {
        return $this->defineStatus([
            'safe',
            'bg-warning',
            'bg-danger',
        ]);
    }

    function getStatusAttribute() {
        return $this->defineStatus([
            'SINTOMAS INSUFICIENTES',
            'POTENCIAL INFECTADO',
            'POSSÍVEL INFECTADO'
        ]);
    }
}
