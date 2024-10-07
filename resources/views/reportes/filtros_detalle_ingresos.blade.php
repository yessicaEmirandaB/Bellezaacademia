<form action="{{ url('reportes.filtro_ingresos') }}" method="post">
    @csrf
    <div class="card">
        <div class="row estilos-encabezado2">
            <div class="col-md-2">
                <strong>Fecha Inicio:</strong>
                <input type="date" class="form-control" name="fecha_inicio"
                    value="{{ old('fecha_inicio', request('fecha_inicio')) }}">
            </div>
            <div class="col-md-2">
                <strong>Fecha Fin:</strong>
                <input type="date" class="form-control" name="fecha_fin"
                    value="{{ old('fecha_fin', request('fecha_fin')) }}">
            </div>
            <div class="col-md-4">
                <strong>Cursos:</strong>
                <select name="curso_id" class="form-control">
                    <option value="0" {{ old('curso_id', request('curso_id')) == 0 ? 'selected' : '' }}>Todos
                    </option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}"
                            {{ old('curso_id', request('curso_id')) == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nombrecurso }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <strong>Método de Pago:</strong>
                <select name="metodo_pago" class="form-control">
                    <option value="0" {{ old('metodo_pago', request('metodo_pago')) == 0 ? 'selected' : '' }}>Todos
                    </option>
                    <option value="Efectivo"
                        {{ old('metodo_pago', request('metodo_pago')) == 'Efectivo' ? 'selected' : '' }}>Efectivo
                    </option>
                    <option value="Qr" {{ old('metodo_pago', request('metodo_pago')) == 'Qr' ? 'selected' : '' }}>Qr
                    </option>
                </select>
            </div>
            <div class="col-md-2 text-end">
                <br>
                <button type="submit" class="btn btn-primary form-control">
                    <i class="fa fa-search"></i> Aplicar Filtros

                </button>
            </div>
        </div>
    </div>
    <div class="card2">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" formaction="{{ url('reportes.detalle_ingresos_pdf') }}" class="btn btn-danger">
                    <i class="fa fa-file-pdf"></i> Exportar a PDF
                </button>
            </div>
        </div>
    </div>
</form>

<style>
    .card {
        background-color: #c6c6c6;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .card2 {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 5px;
        margin-bottom: 5px;
        margin-top: 5px;
        text-align: end;
    }
</style>
