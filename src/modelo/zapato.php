<?php
    class Zapato{
        private $codigo;
        private $descripcion;
        private $modelo;
        private $color;
        private $precio_compra;
        private $precio_venta;
        private $existencia;
        private $imagen;
        private $id_proveedor;

        public function __construct($codigo, $descripcion, $modelo, $color, $precio_compra, $precio_venta, 
                                    $existencia, $imagen, $id_proveedor){
            $this->codigo=$codigo;
            $this->descripcion=$descripcion;
            $this->modelo=$modelo;
            $this->color=$color;
            $this->precio_compra=$precio_compra;
            $this->precio_venta=$precio_venta;
            $this->existencia=$existencia;
            $this->imagen=$imagen;
            $this->id_proveedor=$id_proveedor;

        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function getColor(){
            return $this->color;
        }

        public function getPrecioCompra(){
            return $this->precio_compra;
        }

        public function getPrecioVenta(){
            return $this->precio_venta;
        }

        public function getExistencia(){
            return $this->existencia;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function getIdProveedor(){
            return $this->id_proveedor;
        }
    }
?>
