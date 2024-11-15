<?php

namespace App\Model;

enum StarshipStatusEnum: string
{
    case WAITING = 'OCZEKIWANIE';
    case IN_PROGRESS = 'W TRAKCIE REALIZACJI';
    case COMPLETED = 'ZREALIZOWANE';

}
