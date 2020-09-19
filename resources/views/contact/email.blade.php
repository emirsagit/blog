@component('mail::message')
{{ $request->name }} size bir mesaj gönderdi.
 <br>
<h4>Mesaj:</h4>
{{ $request->body }}

<br>
@isset($request->tel)
<h4>Telefon:</h4>
{{ $request->tel }}
@endisset

<br>
Bu maile doğrudan yanıt vererek {{ $request->name }} ile iletişime geçebilirsiniz...
<br>
Teşekkürler,<br>
{{ config('app.name') }}

@endcomponent
