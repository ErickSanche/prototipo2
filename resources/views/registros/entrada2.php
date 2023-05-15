<!DOCTYPE html>
<html lang="en">
<body>
    <form action="{{ route('validar') }}" method="post">
        @csrf
        <label for='usuario'>usuario</label>
        <input type='text' name='usuario' value='jdocente'>
        <label for='clave'>clave</label>
        <input type='text' name='password' value='password'>
        <input type="submit" value="Validar">
    </form>
</body>
</html>
