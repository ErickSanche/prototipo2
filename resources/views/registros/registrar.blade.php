<form action="{{ route('registrar') }}" method="POST" class="p-4 bg-light rounded">
    @csrf

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <div class="form-group">
      <label for="completo">Nombre completo:</label>
      <input type="text" class="form-control @error('completo') is-invalid @enderror" name="completo" id="completo" required>
      @error('completo')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="usuario">Usuario:</label>
      <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" id="usuario" required>
      @error('usuario')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
      @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="tipo">Tipo de usuario:</label>
      <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo" required>
        <option value="cliente">Cliente</option>
        <option value="administrador">Administrador</option>
      </select>
      @error('tipo')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
