<?php

namespace app\Helpers;

use App\Helpers\Contracts\RocketShipContract;

class RocketShip implements RocketShipContract
{

    public function blastOff()
    {

        return 'Houston, we have ignition';

    }

}