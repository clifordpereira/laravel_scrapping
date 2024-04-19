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

                    $domCrawler->filter('article')->each(function ($article) {
                        $title = $article->filter('h1')->text();
                        $episodeNotes = $article->filter('div > div')->first()->html(); // Assuming episode notes are in the first div inside the article
                        $audioUrl = $article->filter('iframe')->attr('src');

                        ScrapedData::create([
                            'title' => $title,
                            'episode_notes' => $episodeNotes,
                            'audio_url' => $audioUrl,
                            # to do - add image url
                        ]);
                    });
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




