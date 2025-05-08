<?php

namespace App\Enums;

enum ServiceStatus: string
{
    case Operational  = 'operational';
    case Maintenance  = 'under_maintenance';
    case Unresponsive = 'unresponsive';
    case Critical     = 'critical';
}
