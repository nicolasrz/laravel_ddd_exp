<?php

namespace App\Presentation\Web\Action\User;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use function view;

class GetLoginAction extends Controller
{
    public function __invoke(Request $request)
    {
        return view('user.login');
    }

}
