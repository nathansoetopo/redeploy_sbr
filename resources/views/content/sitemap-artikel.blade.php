<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>https://www.yamahasumberbarurejeki.co.id/</loc>
        <lastmod>2022-07-03T05:37:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://www.yamahasumberbarurejeki.co.id/produk</loc>
        <lastmod>2022-07-03T05:37:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://www.yamahasumberbarurejeki.co.id/dealer</loc>
        <lastmod>2022-07-03T05:37:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://www.yamahasumberbarurejeki.co.id/accesories</loc>
        <lastmod>2022-07-03T05:37:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://www.yamahasumberbarurejeki.co.id/yamalube</loc>
        <lastmod>2022-07-03T05:37:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://www.yamahasumberbarurejeki.co.id/contact</loc>
        <lastmod>2022-07-03T05:37:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    @foreach ($artikel as $a)
        <url>
            <loc>{{ env('APP_URL') }}artikel/{{ $a->slug }}</loc>
            <lastmod>{{ $a->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    @foreach ($region as $r)
    <url>
        <loc>{{ env('APP_URL') }}produk/list-motor/{{ $r->id }}</loc>
        <lastmod>{{ $a->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach

    @foreach ($region as $r)
    <url>
        <loc>{{ env('APP_URL') }}dealer/list-dealer/{{ $r->id }}</loc>
        <lastmod>{{ $a->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach

    @foreach ($motor as $m)
    <url>
        <loc>{{ env('APP_URL') }}produk/list-motor/detail/{{ $m->id }}</loc>
        <lastmod>{{ $a->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach
  
</urlset>