function diferenciaFechas() {

    var fecha_hoy = (document.getElementById("fecha_hoy").value)
    var fecha_fin = (document.getElementById("fecha_fin").value)

    // Cant milisegundos en un día
    var dia = 1000 * 60 * 60 * 24
    var dos_meses = dia * 60
    // Convierte las dos fechas a milisegundos
    var fecha_hoy_ms = fecha_hoy.getTime()
    var fecha_fin_ms = fecha_fin.getTime()

    // Calcula la diferencia de milisegundos
    var dif_ms = Math.abs(fecha_hoy_ms - fecha_fin_ms)

    // Si la diferencia entre fecha hoy y fecha fin es mayor a dos meses esta bie


    // Convertir a días
    return Math.round(dif_ms/dia)

}
