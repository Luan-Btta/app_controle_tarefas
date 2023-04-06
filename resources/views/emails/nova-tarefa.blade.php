<x-mail::message>
# {{ $tarefa }}

Data limete para conclusão: {{ $data_conclusao }}

<x-mail::button :url="$url">
Visualizar tarefa
</x-mail::button>

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
