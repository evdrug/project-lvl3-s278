<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 16.07.18
 * Time: 22:53
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function addDomens(Request $request)
    {
        $this->validate($request, [
            'site' => 'required|url|max:255'
        ]);

        
        return redirect('/domains');
    }
}
