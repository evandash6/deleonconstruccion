<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Paypal extends BaseConfig
{
    public $clientId  = 'AXarSFX7TnszUfirf56e48CZ45yea9Aj5K_6nDQEyuaO7v2dTwaNeI1vbTcHhwq_9Cbtg7BB1BXqKs2p';
    public $secret    = 'EAr1dJaTRhYvyKa3RSBgDITWe4k4PULQ6vyjsW5JgW9VvkY9eps8gVUS-8eqDDMe5MpeIh5u2RbYbzZ4';
    public $mode      = 'sandbox'; // Cambia a "live" en producción //sandbox desarrollo
}
?>