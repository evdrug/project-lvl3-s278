<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 16.07.18
 * Time: 22:53
 */

namespace App\Http\Controllers;

use App\Domain;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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
        try {
            $client = new Client();
            $res = $client->request('GET', $request->name);
            $domain->update([
                'name' => $request->name,
                'content_length' => $res->getHeader('content-length')[0],
                'body' => $res->getBody(),
                'code_response' => $res->getStatusCode()
                ]);
        } catch (\Exception $e) {
            $errors = $e;
        }
        return redirect()->route('domains.show', ['id' => $id]);
    }

    public function show($id)
    {
        $domainId = (int)$id;
        $domain = Domain::where('id', $domainId)->first();
        if (empty($domain)) {
            abort(404);
        }

        return view('domainId', ['domain' => $domain]);
    }

    public function destroy($id)
    {
        $domainId = (int)$id;
        $domain = Domain::find($domainId);
        if (empty($domain)) {
            abort(404);
        }
        $domain->delete();

        return redirect()->route('domains.index');
    }
}
