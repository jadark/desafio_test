@component('mail::message')
<p style="text-align: center">
    <strong>Gracias por enviar un comentario</strong>
</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
