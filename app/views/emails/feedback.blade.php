<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    <p>
        Сообщение от {{ $name }}
        @if(isset($email))
            &lt;{{ $email }}&gt;
        @endif
    </p>
    @if (isset($content))
        <p>
            {{ Helper::nl2br($content) }}
        </p>
    @endif
</div>
</body>
</html>