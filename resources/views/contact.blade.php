<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
<h1>Contact</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
<form action="{{ route('contact') }}" method="post">
    @csrf
    <input type="hidden" id="recaptcha-response" name="recaptcha-response">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="message">Message: </label>
        <textarea name="message" id="message">{{ old('message') }}</textarea>
    </div>
    <div>
        <input type="submit">
    </div>
</form>
<script src="https://www.google.com/recaptcha/api.js?render={!! config('contact.api_site_key') !!}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{!! config('contact.api_site_key') !!}', {action: 'contact'}).then(function(token) {
            document.getElementById('recaptcha-response').value = token;
        });
    });
</script>
</body>
</html>
