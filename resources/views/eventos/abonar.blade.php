<form action="{{ route('eventos.abonar', $evento->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="montoAbonado">Monto Abonado:</label>
      <input type="number" name="montoAbonado" id="montoAbonado" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Realizar Abono</button>
  </form>
