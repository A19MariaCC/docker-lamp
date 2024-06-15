<?php
$o = new class(17, 3) {
    private $x;
	private $y;

    function __construct($x,$y) {
        $this->x = $x;
		$this->y = $y;
    }

    function multiply() {
        return $this->x * $this->y;
    }

    function exponential() {
        return pow($this->x,$this->y);
    }

};

echo $o->multiply();
echo $o->exponential();

?>