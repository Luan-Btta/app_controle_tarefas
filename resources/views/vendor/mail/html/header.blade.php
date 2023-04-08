@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Controle de Tarefas')
<img src="http://localhost/img/logo.png" class="logo" alt="App Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
