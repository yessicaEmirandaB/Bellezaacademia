<div class="card">
    <form action="{{ url('reportes.filtro_ingresos') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <strong>Fecha Inicio:</strong>
                <input type="date" class="form-control" name="fecha_inicio">
            </div>
            <div class="col-md-2">
                <strong>Fecha Fin:</strong>
                <input type="date" class="form-control" name="fecha_fin">
            </div>
            <div class="col-md-4">
                <strong>Cursos:</strong>
                <select name="curso_id" class="form-control">
                    <option value="0" selected>Todos</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombrecurso }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <strong>Método de Pago:</strong>
                <select name="metodo_pago" class="form-control">
                    <option value="0" selected>Todos</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Qr">Qr</option>
                </select>
            </div>
            <div class="col-md-2">
                <br>
                <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
            </div>
        </div>
    </form>
</div>
<style>
    .card {
        background-color: #c6c6c6;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
