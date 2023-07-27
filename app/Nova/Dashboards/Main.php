<?php

namespace App\Nova\Dashboards;

use Acme\Analytics\Analytics;
use App\Nova\Metrics\NewPages;
use App\Nova\Metrics\NewUser;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{

    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NewPages(),
            new NewUser()
        ];
    }
}
