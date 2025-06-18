<!-- resources/views/emails/link_formulario.blade.php -->

<h1>Olá, {{ $nome }}!</h1>
<p>Você recebeu um convite para preencher um formulário. Clique no link abaixo:</p>
<p><a href="{{ $link }}">{{ $link }}</a></p>
<p>Obrigado!</p>
