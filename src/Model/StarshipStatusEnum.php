<?php

namespace App\Model;

enum StarshipStatusEnum: string
{
    case WAITING = 'waiting';
    case IN_PROGRES = 'in progres';
    case COMPLETED = 'comlpeted';

}
