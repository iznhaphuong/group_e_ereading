<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $UUID;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->UUID = 1;
        View::share('UUID', $this->UUID);
    }

    public function getUUID()
    {
        return $this->UUID;
    }
}
