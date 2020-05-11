<?php

namespace Ostap\EditableTable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;

class UpdateModel extends Controller
{
    public function __invoke($resource, Request $request)
    {
        app(Crypt::decrypt($request->model))
            ->find($resource)
            ->update($request->except('model'));

        return response()->noContent();
    }
}