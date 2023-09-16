<meta property="og:url" content="{{ cache()->remember('server_url', 600, function() { return setting('server_url', config('app.url')); }) }}" />
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{ cache()->remember('server_name', 600, function() { return setting('server_name', config('app.name', 'Laravel')); }) }}"/>
<meta property="og:title" content="{{ cache()->remember('server_name', 600, function() { return setting('server_name', config('app.name', 'Laravel')); }) }} - @yield('title')" />
<meta property="og:image" content="{{ asset(Storage::url(cache()->remember('server_logo', 600, function() { return setting('server_logo', ''); }))) }}" />
<meta property="og:image:secure_url" content="{{ asset(Storage::url(cache()->remember('server_logo', 600, function() { return setting('server_logo', ''); }))) }}" />
