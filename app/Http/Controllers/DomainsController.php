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

    public function index()
    {
        $domains = Domains::all();
        return view('domains', ['domains' => $domains]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'site' => 'required|url|max:255'
        ]);

        $domains = new Domains;
        $domains->name = $request->site;
        $domains->save();
        $id = $domains->id;
        return redirect()->route('domains.show', ['id' => $id]);
    }

    public function show($id)
    {
        $domainId = (int)$id;
        $domain = Domains::where('id', $domainId)->first();
        if (empty($domain)) {
            return view('404');
        }

        return view('domainId', ['domain' => $domain]);
    }
}
