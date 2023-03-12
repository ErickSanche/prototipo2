<?php

namespace App\Models;

class Paquete
{
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;

    static public function  all(){
        $arreglo = session('arreglo', []);
        return $arreglo;
    }

    public function save(){
        $arreglo = session('arreglo', []);
        $arreglo[$this->id] = [
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
        ];
        session(['arreglo'=>$arreglo]);
        return true;
    }

    static public function  find($id){
        $arreglo = session('arreglo', []);
        if(isset($arreglo[$id])){
            $nuevo = new Paquete();
            $nuevo->id = $id;
            $nuevo->nombre = $arreglo[$id]['nombre'];
            $nuevo->precio = $arreglo[$id]['precio'];
            $nuevo->descripcion = $arreglo[$id]['descripcion'];
            return $nuevo;
        }else{
            return null;
        }
    }

    public function delete(){
        $arreglo = session('arreglo', []);
        unset($arreglo[$this->id]);
        session(['arreglo'=>$arreglo]);
    }
}
