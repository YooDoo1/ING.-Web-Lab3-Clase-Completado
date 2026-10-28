<?php
class Empleado {
    private $nombre;
    private $cedula;
    private $edad;
    private $sueldoBruto;
    private $seguroSocial;
    private $impuestoRenta;
    private $sueldoNeto;

    public function __construct($nombre, $cedula, $edad, $sueldoBruto,
                                $seguroSocial, $impuestoRenta) {
        $this->nombre = $nombre;
        $this->cedula = $cedula;
        $this->edad = $edad;
        $this->sueldoBruto = $sueldoBruto;
        $this->seguroSocial = $seguroSocial;
        $this->impuestoRenta = $impuestoRenta;
    }

    public function CalcularSS() {
        $this->seguroSocial = $this->sueldoBruto * 0.125;
    }

    public function CalcularIR() {
        // Se elige la tasa segun el sueldo anual.
        if ($this->sueldoBruto < 11000) {
            $this->impuestoRenta = 0;
        } elseif ($this->sueldoBruto < 50000) {
            $this->impuestoRenta = $this->sueldoBruto * 0.15;
        } else {
            $this->impuestoRenta = $this->sueldoBruto * 0.25;
        }
    }

    public function setSueldoNeto() {
        $this->sueldoNeto = $this->sueldoBruto - $this->seguroSocial
                            - $this->impuestoRenta;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getSueldoBruto() {
        return $this->sueldoBruto;
    }

    public function getSeguroSocial() {
        return $this->seguroSocial;
    }

    public function getImpuestoRenta() {
        return $this->impuestoRenta;
    }

    public function getSueldoNeto() {
        return $this->sueldoNeto;
    }
}

echo "DATOS DEL EMPLEADO\n";
$nombre = readline("Nombre: ");
$cedula = readline("Cedula: ");
$edad = (int) readline("Edad: ");
$sueldoBruto = (float) readline("Sueldo bruto anual: ");

if ($sueldoBruto < 0) {
    echo "El sueldo no puede ser negativo.\n";
} else {
    $empleado = new Empleado($nombre, $cedula, $edad, $sueldoBruto, 0, 0);
    // Primero se calculan los descuentos y luego el sueldo neto.
    $empleado->CalcularSS();
    $empleado->CalcularIR();
    $empleado->setSueldoNeto();

    echo "\nRESUMEN ANUAL\n";
    echo "Nombre: " . $empleado->getNombre() . "\n";
    echo "Cedula: " . $empleado->getCedula() . "\n";
    echo "Edad: " . $empleado->getEdad() . "\n";
    echo "Sueldo bruto: $" . $empleado->getSueldoBruto() . "\n";
    echo "Seguro social: $" . $empleado->getSeguroSocial() . "\n";
    echo "Impuesto sobre la renta: $" . $empleado->getImpuestoRenta() . "\n";
    echo "Sueldo neto: $" . $empleado->getSueldoNeto() . "\n";
}

class Cilindro {
    private $radio;
    private $altura;
    private $pi = 3.1416;

    public function __construct($radio, $altura) {
        $this->radio = $radio;
        $this->altura = $altura;
    }

    public function calcularAreaLateral() {
        return 2 * $this->pi * $this->radio * $this->altura;
    }

    public function calcularAreaTotal() {
        // Al area lateral se le suman las dos bases.
        return $this->calcularAreaLateral()
               + 2 * $this->pi * $this->radio * $this->radio;
    }

    public function calcularVolumen() {
        return $this->pi * $this->radio * $this->radio * $this->altura;
    }
}

echo "\nAREA Y VOLUMEN DEL CILINDRO\n";
$radio = (float) readline("Radio en cm: ");
$altura = (float) readline("Altura en cm: ");

if ($radio <= 0 || $altura <= 0) {
    echo "El radio y la altura deben ser mayores que cero.\n";
} else {
    $cilindro = new Cilindro($radio, $altura);
    echo "\nArea lateral: " . $cilindro->calcularAreaLateral() . " cm2\n";
    echo "Area total: " . $cilindro->calcularAreaTotal() . " cm2\n";
    echo "Volumen: " . $cilindro->calcularVolumen() . " cm3\n";
}
?>
