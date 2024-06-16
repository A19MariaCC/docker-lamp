<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $edad;
    private $provincia;
    private $password;

    public function __construct($id, $nombre, $apellidos, $edad, $provincia, $password)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->provincia = $provincia;
        $this->password = $password;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    private function testInput($datos)
    {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    public function limpiarAtributos()
    {
        $this->nombre = $this->testInput($this->nombre);
        $this->apellidos = $this->testInput($this->apellidos);
        $this->edad = $this->testInput($this->edad);
        $this->provincia = $this->testInput($this->provincia);
        $this->password = $this->testInput($this->password);
    }

    public function isEmpty()
    {
        if (empty($this->nombre) || empty($this->apellidos) || empty($this->edad) || empty($this->provincia) || empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }
}