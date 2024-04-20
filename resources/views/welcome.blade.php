<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">

                        <h1>Machine Test - Laravel Scrapping</h1>
                    </header>

                    <main class="mt-6">                        
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <pre>
                                After creating a database, set its details in .env file,
                                
                                RUN php artisan migrate # for creating new table for storing straped data
                                RUN php artisan scrape:data # for scrapping the data through command
                                And visit <a href="{{ url('/scraped-data') }}">Scraped Data</a>

                                # If you want to empty the table,
                                RUN php artisan scraped-data:truncate
                            </pre>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
