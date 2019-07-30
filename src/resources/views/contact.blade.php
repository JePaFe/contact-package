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
<form action="{{ route('contact') }}" method="post">
    @csrf
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="message">Message: </label>
        <textarea name="message" id="message"></textarea>
    </div>
    <div>
        <input type="submit">
    </div>
</form>
</body>
</html>
