<?php

// Definición de la clase anónima
$figura = new class {
    public $base;
    public $altura;

    public function area()
    {
        return ($this->base * $this->altura) / 2;
    }

    public function perimetro()
    {
        return 2 * $this->base + 2 * $this->altura;
    }
};

// Definir propiedades para un objeto figura
$figura->base = 5;
$figura->altura = 4;

// Calcular y mostrar área y perímetro
echo "Área del figura: " . $figura->area() . "\n";
echo "Perímetro del figura: " . $figura->perimetro() . "\n";

// Definir propiedades para otro objeto figura
$figura->base = 3;
$figura->altura = 7;

// Calcular y mostrar área y perímetro
echo "Área del figura: " . $figura->area() . "\n";
echo "Perímetro del figura: " . $figura->perimetro() . "\n";