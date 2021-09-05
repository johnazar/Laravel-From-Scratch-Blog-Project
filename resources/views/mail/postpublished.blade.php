@component('mail::message')
# Introduction

The body of your message.
<h3>{{ $post['title'] }}</h3>
<h3>{{ $post['body'] }}</h3>

@component('mail::button', ['url' => $post->path()])
Read more
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
  