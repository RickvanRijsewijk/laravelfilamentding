<!DOCTYPE html>
<html>
    <head>
        <title>{{ $email->subject }}</title>
    </head>
    <body>
        {!! $body !!}
        <br>
        <a href="{{ $unsubscribeUrl }}" style="padding: 10px 20px; background-color: red; color: white; text-decoration: none; border-radius: 5px;">Unsubscribe</a>
    </body>
</html>