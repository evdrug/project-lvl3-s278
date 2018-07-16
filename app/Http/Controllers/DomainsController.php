<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 16.07.18
 * Time: 22:53
 */

namespace App\Http\Controllers;

use App\Domains;
use Illuminate\Http\Request;

class DomainsController extends Controller
{

    public function viewDomens()
    {
        $domains = Domains::all();
        return view('domains',['domains' => $domains]);

    }

    public function addDomens(Request $request)
    {
        $this->validate($request, [
            'site' => 'required|url|max:255'
        ]);

        $domains = new Domains;
        $domains->name = $request->site;
        $domains->save();
        return redirect('/domains');
    }
}
