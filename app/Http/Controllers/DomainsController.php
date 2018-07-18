<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 16.07.18
 * Time: 22:53
 */

namespace App\Http\Controllers;

use App\Domain;
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

        try {
            $client = new Client();
            $res = $client->request('GET', $request->name);
            $body = $res->getBody();

            $document = new Document($body->getContents());
            $header = $document->find('h1')
                ? $document->find('h1')[0]->text()
                : null;
            $keywords = $document->find('meta[name=keywords]')
                ? $document->find('meta[name=keywords]')[0]->attr('content')
                : null ;
            $description = $document->find('meta[name=description]')
                ? $document->find('meta[name=description]')[0]->attr('content')
                : null;
            $contentLength = $res->getHeader('content-length')
                    ?$res->getHeader('content-length')[0]
                    : null;

            $id = Domain::create([
                'name' => $request->name,
                'content_length' => $contentLength,
                'body' => $body,
                'code_response' => $res->getStatusCode(),
                'header' => $header,
                'keywords' => $keywords,
                'description' => $description
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('index', ['errors' => [$message] , 'url' => $request->name]);
        }
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
