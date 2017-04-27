<?php

namespace App\Http\Controllers;

use App\Traits\CaptureIpTrait;
use File;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Validator;
use View;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activated');
        $this->middleware('role:admin');
    }

    /**
     * Display admin settinfs page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [

        ];
        return View('pages.admin.settings.index', compact($data));

    }

}
