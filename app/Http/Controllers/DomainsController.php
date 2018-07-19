<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 16.07.18
 * Time: 22:53
 */

namespace App\Http\Controllers;

use App\Domain;
use App\Jobs\ProcessParsesPages;
use DiDom\Document;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DomainsController extends Controller
{

    public function index()
    {
        $domains = Domain::paginate(5);
        return view('domains', ['domains' => $domains]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|url|max:255'
        ]);

        $domain = new Domain;
        $domain->name = $request->name;
        $domain->save();
        $id = $domain->id;
        dispatch(new ProcessParsesPages($domain));
        return redirect()->route('domains.show', ['id' => $id]);
    }

    public function show($id)
    {
        $domainId = (int)$id;
        $domain = Domain::findOrFail($domainId);
        return view('domainId', ['domain' => $domain]);
    }

    public function destroy($id)
    {
        $domainId = (int)$id;
        $domain = Domain::findOrFail($domainId);
        $domain->delete();
        return redirect()->route('domains.index');
    }
}
