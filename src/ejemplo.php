<?php

class Vehiculo{};
class Coche extends Vehiculo{};


class Tienda{
    public function getDatos($id): Vehiculo{
        return new Vehiculo();
    }
}

class TiendaDeCoches extends Tienda{
    public function getDatos($id): Vehiculo{
        return new Coche();
    }
}

$someArray['key'] = $someArray['key'] ?? 'foo';