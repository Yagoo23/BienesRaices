<?php

namespace App;

class Propiedad extends ActiveRecord{
   protected static $tabla = 'propiedades';
   protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorID'];

   
   public $id;
   public $titulo;
   public $precio;
   public $imagen;
   public $descripcion;
   public $habitaciones;
   public $wc;
   public $estacionamiento;
   public $creado;
   public $vendedorID;

   public function __construct($args = [])
   {
       $this->id = $args['id'] ?? null;
       $this->titulo = $args['titulo'] ?? '';
       $this->precio = $args['precio'] ?? '';
       $this->imagen = $args['imagen'] ?? '';
       $this->descripcion = $args['descripcion'] ?? '';
       $this->habitaciones = $args['habitaciones'] ?? '';
       $this->wc = $args['wc'] ?? '';
       $this->estacionamiento = $args['estacionamiento'] ?? '';
       $this->creado = date('Y/m/d');
       $this->vendedorID = $args['vendedorID'] ?? '';
   }

   public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un título.";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio.";
        }
        if (strlen(!$this->descripcion) > 50) {
            self::$errores[] = "La descripción es obligatoria. Debe tener al menos 50 caracteres.";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "El número de habitaciones es obligatorio.";
        }
        if (!$this->wc) {
            self::$errores[] = "El número de baños es obligatorio.";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "El número de estacionamientos es obligatorio.";
        }
        if (!$this->vendedorID) {
            self::$errores[] = "Elige un vendedor.";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen de la propiedad es obligatoria.";
        }
        // //Validar por tamaño (1M máximo)
        // $medida = 1000 * 1000;

        // if ($this->imagen['size'] > $medida) {
        //     self::$errores[] = "La imagen es muy pesada.";
        // }
        return self::$errores;
    }

}
