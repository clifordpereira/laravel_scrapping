<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlObservers\CrawlObserver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use GuzzleHttp\Exception\RequestException; 
use Symfony\Component\DomCrawler\Crawler as DomCrawler; 
use App\Models\ScrapedData;

class ScrapeData extends Command
{
    protected $signature = 'scrape:data';
    protected $description = 'Scrape data from website';

    public function handle()
    {
        Crawler::create()
            ->setCrawlObserver(new class () extends CrawlObserver {
                public function crawled(
                    UriInterface $url,
                    ResponseInterface $response,
                    ?UriInterface $foundOnUrl = null,
                    ?string $linkText = null
                ): void {
                    $html = (string) $response->getBody();

                    $domCrawler = new DomCrawler($html);

$styleTagContent = ".ae{background-color:#ddd}.af{font-size:14px}.ag{padding:0}.ah{position:relative}.ai{background-color:#222}.aj{padding:0 15px}.ak{margin:0 auto}.al{max-width:960px}.am{padding:20px 0}.an{text-align:left}.ao{display:block}.ap{color:#ddd}.aq{text-decoration:none}.ar{font-family:Spinnaker}.as:hover{text-decoration:underline}.at{font-size:1em}.au{font-weight:normal}.av{margin-left:auto}.aw{margin-right:auto}.ax{max-width:100%}.ay{background-image:url(https://storage.pinecast.net/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/afb12dcf-3d94-4739-9b2d-89a2b1ec793d/JameelCast.jpg)}.az{background-position:center top}.b0{background-size:cover}.b1{background-color:rgba(0, 0, 0, 0.5)}.b2{padding:50px 0 30px}.b3{font-size:18px}.b4{font-weight:500}.b5{font-family:Inika}.b6{font-size:36px}.b7{font-weight:600}.b8{line-height:30px}.b9{text-transform:uppercase}.ba{margin:25px 0 50px}.bb{border-width:0}.bc{width:100%}.bd{margin:20px 0}.be{background-color:#fff}.bf{padding:20px}.bg{-webkit-box-align:center;align-items:center}.bh{display:-webkit-box;display:-moz-box;display:-ms-flexbox;display:-webkit-flex;display:flex}.bi{font-size:20px}.bj{flex:1 1}.bk{white-space:nowrap}.bn{margin-left:8px}.bo{height:40px}.br:last-child{margin-bottom:0}.bu{flex:0 0 300px}.bv{height:300px}.bw{width:300px}.bx{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/adae0c60-03aa-4d5b-9054-b3a6ebf33e77/JameelCastthom.jpg)}.by{max-width:calc(100% - 300px)}.bz{padding:30px 20px}.c2{-webkit-box-orient:vertical;-webkit-box-direction:normal;flex-direction:column}.c3{color:#c0392b}.c4{display:-webkit-box}.c5{font-size:30px}.c6{color:inherit}.c7{text-decoration:underline}.c8{margin:0 0 0.5em}.c9{overflow:hidden}.ca{-webkit-line-clamp:2}.cb{-webkit-box-orient:vertical}.cc{text-overflow:ellipsis}.cd{font-size:16px}.ce{line-height:16px}.cf{margin:-0.5em 0 0.5em}.cg:empty{display:none}.ch{font-size:12px}.ci{line-height:18px}.cj{margin-bottom:20px}.ck{-webkit-line-clamp:4}.cl{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/603d9059-84da-4c5e-be09-2d5f8fd3b53a/JameelCasttim.jpg)}.cm{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/1b0b3261-e691-4b0f-bbb7-d50ccbdb821e/JameelCastbin__1_.jpg)}.cn{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/db0aedba-8cf6-4180-a43c-ec7ee9eaef6f/JameelCastpatrick.jpg)}.co{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/51b24487-aa3d-4709-899e-b855b87dbe75/JameelCastkatharina.jpg)}.cp{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/3fa782cb-2457-4ce0-8ac3-fd404ae922e5/JameelCastnim.jpg)}.cq{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/3b8c4795-b7fb-4ea7-a9a2-8839f6b8d89a/JameelCasttristan.jpg)}.cr{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/0ee67207-8e7a-4a18-ac90-67381a702d2b/JameelCastanne.jpg)}.cs{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/45866daa-56f0-458e-b312-432821098795/JameelCastNeil.jpg)}.ct{background-image:url(https://storage.pinecast.net/cdn-cgi/image/w=300,h=300,fit=cover,metadata=none,quality=90/podcasts/667a5844-b839-444b-a842-f8ae23d7f8a6/artwork/abfdc037-0ed7-4978-8a68-3ed2e698e83a/JameelCast.jpg)}.cu{padding:40px 0}.cv{-webkit-box-lines:multiple;flex-wrap:wrap}.cw{-webkit-box-pack:center;justify-content:center}.cx{background-color:#bbb}.cy{padding:100px 0}.cz{color:#444}.d0{padding-left:15px}.d1{padding-right:15px}.d2{text-align:center}
";

                    $domCrawler->filter('article')->each(function ($article) use ($styleTagContent) {
                        $title = $article->filter('h1')->text();
                        $episodeNotes = $article->filter('div > div')->first()->html();
                        $audioUrl = $article->filter('iframe')->attr('src');
                        $imageUrl = $this->extractImageUrl($article, $styleTagContent);

                        ScrapedData::create([
                            'title' => $title,
                            'episode_notes' => $episodeNotes,
                            'audio_url' => $audioUrl,
                            'image_url' => $imageUrl,
                        ]);
                    });
                }

                private function extractImageUrl($article, $styleTagContent): ?string
                {
                    // $classAttribute = $article->filter('[aria-label="img"]')->attr('class');
                    $classAttribute = "bu bv bw cl b0";
                    preg_match('/bu bv bw (\w+)/', $classAttribute, $matches);
                    $imageClass = $matches[1] ?? null;
                    if ($imageClass) {
                        // extract the background-image URL
                        preg_match('/\.' . $imageClass . '{background-image:url\((.*?)\)}/', $styleTagContent, $matches);
                        
                        return $matches[1] ?? null;
                    }
                    return null;
                }

                public function crawlFailed(
                    UriInterface $url,
                    RequestException $requestException,
                    ?UriInterface $foundOnUrl = null,
                    ?string $linkText = null
                ): void {
                    // Handle failed crawls
                }
            })
            ->startCrawling('https://jameelcast.pinecast.co/');
    }
}




