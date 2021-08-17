<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Laravel ]]></title>
        <link><![CDATA[ https://laravrl.blog/feed ]]></link>
        <description><![CDATA[ Laravel From Scrach ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title }}]]></title>
                <link>{{ $post->slug }}</link>
                <slug><![CDATA[{!! $post->slug !!}]]></slug>
                <description><![CDATA[{!! $post->body !!}]]></description>
                <category>{{ $post->category->pluck('name') }}</category>
                <author><![CDATA[{{ $post->author->username  }}]]></author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>