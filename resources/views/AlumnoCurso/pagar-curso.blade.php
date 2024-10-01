<div class="modal fade" id="pagarCurso{{ $detalle->id }}" tabindex="-1"
    aria-labelledby="pagarCursoLabel{{ $detalle->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pagarCursoLabel{{ $detalle->id }}">
                    <strong>Pagar Curso:</strong> {{ $detalle->nombrecurso ?? '-' }}
                </h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('AlumnoCurso.pagar', $detalle->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input name="alumnocurso_id" value="{{ $detalle->id }}" hidden>
                    <input name="alumno_id" value="{{ $detalle->Alumnos_id }}" hidden>
                    <input name="curso_id" value="{{ $detalle->cursos_id }}" hidden>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <strong>Alumno:</strong>
                            <span>{{ $detalle->Nombres }} {{ $detalle->Apellidos }}</span>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-4">
                            <strong>Total a Pagar:</strong>
                            <span>{{ $detalle->precio }}</span>
                        </div>
                        <div class="col-sm-4">
                            <strong>A Cuenta:</strong>
                            <span>{{ $detalle->a_cuenta }}</span>
                        </div>
                        <div class="col-sm-4">
                            <strong>Saldo:</strong>
                            <span>{{ $detalle->precio - $detalle->a_cuenta }}</span>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <strong>Seleccione Método de Pago:</strong>
                            <select name="metodo_pago" id="metodo_pago_{{ $detalle->id }}"
                                class="form-control metodo_pago" required>
                                <option value="Efectivo" selected>Efectivo</option>
                                <option value="Qr">Qr</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <strong>Ingrese Monto:</strong>
                            <input type="number" name="monto" class="form-control" placeholder="Ingrese Monto"
                                min="1" max="{{ $detalle->precio - $detalle->a_cuenta }}" required>
                        </div>
                        <!-- Div para el QR que estará oculto inicialmente -->
                        <div class="col-sm-12 text-center mt-2" id="qr_{{ $detalle->id }}" style="display: none;">
                            <img src="{{ asset('img/qr.png') }}" alt="QR" width="150" height="150">
                        </div>
                        <div class="col-sm-12">
                            <strong>Observación:</strong>
                            <textarea name="observacion" class="form-control" rows="1" placeholder="Ingrese Observaciones"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i>
                        Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-money-bill-wave"></i>
                        Pagar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener todos los selects de método de pago
        document.querySelectorAll('.metodo_pago').forEach(function(select) {
            select.addEventListener('change', function() {
                const id = this.id.split('_')[
                    2]; // Obtener el ID del detalle desde el ID del select
                const qrDiv = document.getElementById('qr_' +
                    id); // Obtener el contenedor del QR correspondiente

                if (this.value === 'Qr') {
                    qrDiv.style.display = 'block'; // Mostrar el QR si se selecciona "Qr"
                } else {
                    qrDiv.style.display = 'none'; // Ocultar el QR si se selecciona otro método
                }
            });

            // Disparar el evento al cargar la página para el estado inicial
            select.dispatchEvent(new Event('change'));
        });
    });
</script>
