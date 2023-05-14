<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Nombre completo:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="username">Nombre de usuario:</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required>
        </div>


        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div>
            <label for="user_type">Tipo de usuario:</label>
            <select name="user_type" id="user_type" required>
                <option value="usuario">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
