/* detalle registro alumno */
SELECT
	alumnos.Nombres,
	cursos.nombrecurso,
    materias.nombremateria,
    CONCAT(horarios.HoraInicio, ' - ', horarios.HoraFinal) AS horarioss,
	aulas.NumAula

FROM alumnos INNER JOIN alumnoscursos on
					alumnos.id=alumnoscursos.Alumnos_id
INNER JOIN cursos on cursos.id=alumnoscursos.cursos_id
INNER JOIN detalle_registro_alumnos ON alumnoscursos.id=detalle_registro_alumnos.id_detalle_alumno_curso

INNER JOIN detalle_curso_materias on detalle_registro_alumnos.id_detalle_curso_materia
INNER JOIN materias ON materias.id=detalle_curso_materias.id_materia
INNER JOIN cursos  as curso2 on curso2.id=detalle_curso_materias.id_curso
INNER JOIN horarios on horarios.id=detalle_curso_materias.id_horario
inner JOIN aulas on aulas.id=horarios.id_aula;




/* detalle registro maestro */
SELECT maestros.nombres,cursos.nombrecurso,materias.nombremateria,CONCAT(horarios.HoraInicio, ' - ', horarios.HoraFinal) AS horarioss,aulas.NumAula
						FROM maestros INNER JOIN detalle_curso_maestros on maestros.id=detalle_curso_maestros.maestros_id
						INNER JOIN cursos ON cursos.id=detalle_curso_maestros.maestros_id
                        INNER JOIN detalle_registro_maestros ON detalle_curso_maestros.id=detalle_registro_maestros.id_detalle_curso_maestro
                        INNER JOIN detalle_curso_materias on detalle_registro_maestros.id_detalle_curso_materia=detalle_curso_materias.id
                        INNER JOIN materias on materias.id=detalle_curso_materias.id_materia
                        INNER JOIN cursos as curso2 on curso2.id=detalle_curso_materias.id_curso
                       INNER JOIN horarios on horarios.id=detalle_curso_materias.id_horario
                       INNER JOIN aulas on aulas.id=horarios.id_aula;

