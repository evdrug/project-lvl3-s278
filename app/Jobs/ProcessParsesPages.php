<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 19.07.18
 * Time: 20:56
 */

namespace App\Jobs;

use App\Domain;
use DiDom\Document;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ProcessParsesPages extends Job
{
    protected $domain;

    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }

    public function handle()
    {
        try {
            $client = new Client();
            $res = $client->request('GET', $this->domain->name);
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

            $this->domain->update([
                'content_length' => $contentLength,
                'body' => $body,
                'code_response' => $res->getStatusCode(),
                'header' => $header,
                'keywords' => $keywords,
                'description' => $description
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            Log::error($message);
//            return view('index', ['errors' => [$message] , 'url' => $request->name]);
        }
    }
}