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
        $domains = Domains::paginate(5);
        return view('domains', ['domains' => $domains]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|url|max:255'
        ]);

        $domain = new Domains;
        $domain->name = $request->name;
        $domain->save();
        $id = $domain->id;
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

    public function destroy($id)
    {
        $domainId = (int)$id;
        $domain = Domains::find($domainId);
        if (empty($domain)) {
            return view('404');
        }
        $domain->delete();

        return redirect()->route('domains.index');
    }
}
