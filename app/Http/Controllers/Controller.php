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

    protected $UUID = 1;
    protected static $history;

    public function __construct()
    {
        // Fetch the Site Settings object
        View::share('UUID', $this->UUID);
        // View::share('history', $this->history);
        View::share('history', self::$history);
    }
    // public function setBaseHistory($his) {
    //     $this->history = $his;
    //     View::share('history', $this->history);
    // }
    public static function setBaseHistory($his)
    {
        self::$history = $his;
        View::share('history', self::$history);
    }
    // public function getBaseHistory() {
    //     return $this->history;
    // }
    public static function getBaseHistory()
    {
        return self::$history;
    }

    public function setUUID($uuid)
    {
        $this->uuid = $uuid;
    }
    public function getUUID()
    {
        return $this->UUID;
    }
}
