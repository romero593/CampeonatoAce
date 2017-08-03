<?php

include 'funcion/equipos.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];

$resultado=getEquipo($id);
$lista = '<thead>
			<tr>
				<th>--</th>
				<th>Nombres</th>
				<th>Camiseta</th>
				<th>Gol</th>
			</tr>';

$lista .= '</thead>';

$lista .= '<tbody>';
if(pg_num_rows($resultado)!=0){
	while($fila=pg_fetch_array($resultado)){
		$jugador=$fila['razon_social'];
		$id_alumno=$fila['id_alumno'];
		$num_camiseta=$fila['num_camiseta'];
		$por= rand(0, 10);

		$lista.='<tr class="uk-text-left">
					<td><input type="hidden" id="id_ficha_control" name="id_ficha_control" value="'.$id.'">
					    <input class="uk-radio" type="checkbox" name="capitan" onclick=dat('.$por.')></td>
							<td><progress class="uk-progress" value="'.$por.'" max="10"></progress></td>
					<td class="uk-table-link"><a class="uk-link-reset" >'.$jugador.'</a> </td>
					<td><input class="uk-input uk-form-width-xsmall" type="text" name="alumnoNumTab" value="'.$num_camiseta.'"placeholder="Nro"></td>
					<td><button class="uk-button uk-button-secondary uk-button-small" onclick=gola();mensaje("GOL de '.$jugador.'")>Gol</button></td>
				</tr>';
		$lista.='<tr><td colspan="4"><p uk-margin>
				    <button class="uk-button uk-button-default uk-button-small" onclick=mensaje(); >Tiro Puerta</button>
				    <button class="uk-button uk-button-default uk-button-small" onclick="mensaje()">Asitencia</button>
				    <button class="uk-button uk-button-primary uk-button-small" onclick="mensaje()">Amarilla</button>
				    <button class="uk-button uk-button-danger uk-button-small" onclick="mensaje()">Roja</button>
				</p></td><tr>';
	}
}
$lista .= '</tbody>';
$html = "";

$html .= '<table class="uk-table uk-table-small uk-table-hover uk-table-middle uk-table-divider">'.$lista.'</table>';

//$html .= '<ul uk-accordion="collapsible: false">'.$lista.'<ul>';

echo $html;
pg_close();

//value="true" '.($estado== 't' ? 'checked' : '').'
