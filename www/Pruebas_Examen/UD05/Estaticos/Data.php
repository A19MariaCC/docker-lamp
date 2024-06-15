<?php

class Data
{
    private static $calendario = "Calendario gregoriano";
    private static $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    private static $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    public static function getCalendar()
    {
        return self::$calendario;
    }

    public static function getHora()
    {
        return date('H:i:s');
    }

    public static function getDataHora()
    {
        $diaSemana = self::$dias[date('w')]; // Obtener el nombre del día de la semana
        return "Usamos el calendario: " . self::getCalendar() . "\nHoy es " . $diaSemana . " " . self::getData() . " y son las " . self::getHora();
    }

    private static function getData()
    {
        $ano = date('Y');
        $mes = self::$meses[date('n') - 1]; // Obtener el nombre del mes
        $dia = date('d');
        return $dia . " de " . $mes . " del " . $ano;
    }
}