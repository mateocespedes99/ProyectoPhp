<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello from LARAVEL</title>
</head>
<body>
    @dump($errors)
    @if (session()->has('error'))
    <div class="alert alert-danger">
    <!-- agrego a la sesion 'error' en caso de tenerlo -->
        {{session()->get('error')}}
    </div>
    @endif

    @if (isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    @yield('content')
</body>
</html>
