<?php

namespace controller {

	require_once("conection.php");

	use controller\conection as connect;

	class sql
	{

		private $con;

		public function __construct()
		{

			$conection = new connect;

			$this->setConect(
				$conection->getCon()
			);
		}

		/**
		 * Get the value of con
		 */
		public function getConect()
		{
			return $this->con;
		}

		/**
		 * Set the value of con
		 */
		public function setConect($con)
		{

			$this->con = $con;
		}

		// SENTENCIAS SQL


		/**
		 * 
		 * @param string $consulta consulta escrita en SQL
		 * 
		 * @return PDO conexion a la bd
		 * 
		 * @method consultaSQL(string $consulta) la consulta se escribe en sql con comillas dobles
		 * 
		 */

		public function consultaSQL(string $consulta)
		{
			$query = $this->getConect()->prepare($consulta);
			$query->execute();
			return $query;
		}


		/**
		 * 
		 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
		 * 
		 * @return PDO datos obtenidos de la tabla
		 * 
		 * @method All($tabla) obtiene todos los datos de la tabla indicada
		 * 
		 */

		public function All($tabla)
		{
			return $this->consultaSQL("SELECT * FROM $tabla");
		}

		/**
		 * 
		 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
		 * 
		 * @param string $columna columnas que se desean obtener de la base de datos
		 * 
		 * @return PDO datos obtenidos de la tabla
		 * 
		 * @method AnyColumn($tabla, $columna) obtiene los datos de la tabla indicada en las columnas indicadas
		 * 
		 */

		public function AnyColumn($tabla, $columna)
		{
			return $this->consultaSQL("SELECT $columna FROM $tabla");
		}

		/**
		 * 
		 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
		 * 
		 * @param string $columna valor de comparacion especifico
		 * 
		 * @param string $val valor a comparar con la columna, puede variar
		 * 
		 * @param string $oper valor definido para el operador de la comparacion, definodo como '=' por defecto
		 * 
		 * @return PDO datos obtenidos de la tabla
		 * 
		 * @method where($tabla, $oper) obtiene los datos obtenidos mediante las comparaciones realizadas
		 * 
		 */

		public function where($tabla, $oper = '')
		{
			return $this->consultaSQL("SELECT * FROM $tabla WHERE $oper");
		}

		/**
		 * 
		 * @param string $tabla es la tabla a la que se le desean ingresar los datos
		 * 
		 * @param string $columnas columnas a insertar
		 * 
		 * @param string $valores valor de las columnas anteriormente ingresadas
		 * 
		 * @method insert($tabla, $columnas, $valores) ingresa los $valores en las $columnas de la $tabla
		 * 
		 */

		public function insert($tabla, $columnas, $valores)
		{
			try {
				$q = $this->consultaSQL("INSERT INTO $tabla ($columnas) VALUES ($valores)");
				return true;
			} catch (\Throwable $th) {
				return $th;
			}
		}

		/**
		 * 
		 * @param string $tabla es la tabla a la que se le  quiere eliminar informacion
		 * 
		 * @param string $columna columna de comparacion, generalmente es id o la columna de la clave primaria
		 * 
		 * @param string $val valor a comparar con la columna, puede variar
		 * 
		 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
		 * 
		 * @method delete($tabla, $columna, $val) elimina las entradas encontradas a partir de la comparacion
		 * 
		 * @method delete($tabla, $columna, $val, $oper = '=') elimina las entradas encontradas a partir de la comparacion
		 * 
		 */

		public function delete($tabla, $columna, $val, $oper = '=')
		{
			$q = $this->consultaSQL("DELETE FROM $tabla WHERE $columna $oper '$val'");
		}

		/**
		 * 
		 * @param string $tabla es la tabla a la que se le quiere actualizar
		 * 
		 * @param string $columna columna definida para actualizar
		 * 
		 * @param int $id clave primaria de la tabla, usada para comparar campos y encontrar la fila deseada
		 * 
		 * @param string $val nuevo valor de la columna
		 * 
		 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
		 * 
		 * @method update($tabla, $columna, $id, $val, $oper = '=') el metodo se usa para actualizar datos de una columna definida previamente
		 * 
		 * @method update($tabla, $columna, $id, $val) el metodo se usa para actualizar datos de una columna definida previamente
		 * 
		 */

		public function update($tabla, $columna, $id, $val, $oper = '=')
		{
			$q = $this->consultaSQL("UPDATE $tabla SET $columna = '$val' WHERE id $oper $id");
		}

		/**
		 * 
		 * @param string $tabla es la tabla principal, la cual funciona como base para la union
		 * 
		 * @param string $columnas columnas que se desean unir
		 * 
		 * @param string $unirCon tabla secundaria de la union
		 * 
		 * @param string $condicionante columna usada como indice o indicador en la condicion
		 * 
		 * @param string $condicion valor a buscar para realizar el emparejamiento y finalizar la union
		 * 
		 * @method innerJoin($tabla, $columnas, $unirCon, $condicionante, $condicion) metodo usado para optener tablas unidas por un elemento en comun
		 * 
		 * @return PDO tablas unidas
		 */

		public function innerJoin($tabla, $columnas, $unirCon, $condicionante, $condicion)
		{
			return $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion");
		}

		/**
		 * 
		 * @param string $tabla es la tabla principal, la cual funciona como base para la union
		 * 
		 * @param string $columnas columnas que se desean unir
		 * 
		 * @param string $unirCon tabla secundaria de la union
		 * 
		 * @param string $condicionante columna usada como indice o indicador en la condicion, normamente es la llave primaria
		 * 
		 * @param string $condicion valor a buscar para realizar el emparejamiento y finalizar la union
		 * 
		 * @param string $condicionadoW condicionante o columna de condion del where
		 * 
		 * @param string $condicionW valor o condicion del where
		 * 
		 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
		 * 
		 * @method function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW, $oper = '=') metodo usado para unir tablas con un where añadido para optener datos más precisos
		 * 
		 * @method function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW) metodo usado para unir tablas con un where añadido para optener datos más precisos
		 * 
		 */

		public function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW, $oper = '=')
		{
			return $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion WHERE $condicionW $oper $condicionadoW");
		}

		/**
		 * 
		 * @param string $tabla es la tabla principal, la cual funciona como base para la union
		 * 
		 * @param string $columnas columnas que se desean unir
		 * 
		 * @param string $unirCon tabla secundaria de la union
		 * 
		 * @param string $unirCon2 tabla tercearia de la union
		 * 
		 * @param string $condicionante columna usada como indice o indicador en la condicion, normamente es la llave primaria
		 * 
		 * @param string $condicionante2 columna usada como indice o indicador en la segunda condicion, normamente es la llave primaria
		 * 
		 * @param string $condicion valor a buscar para realizar el emparejamiento y finalizar la union
		 * 
		 * @param string $condicion2 segundo valor a buscar para realizar el emparejamiento y finalizar la union
		 * 
		 * @param string $condicionadoW condicionante o columna de condion del where
		 * 
		 * @param string $condicionW valor o condicion del where
		 * 
		 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
		 * 
		 * @method function innerJoinConWhere($tabla, $columnas, $unirCon, $unirCon2, $condicionante, $condicionante2, $condicion, $condicion2, $condicionW, $condicionadoW, $oper = '=') metodo usado para unir tablas con un where añadido para optener datos más precisos
		 * 
		 * @method function innerJoinConDoble($tabla, $columnas, $unirCon, $unirCon2, $condicionante, $condicionante2, $condicion, $condicion2, $condicionW, $condicionadoW) metodo usado para unir tablas con un where añadido para optener datos más precisos
		 * 
		 */

		public function innerJoinConDoble($tabla, $columnas, $unirCon, $unirCon2, $condicionante, $condicionante2, $condicion, $condicion2, $condicionW, $condicionadoW, $oper = '=')
		{
			return $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion INNER JOIN $unirCon2 ON $condicionante2 = $condicion2 WHERE $condicionW $oper $condicionadoW");
		}

		public function LastRow($tabla, $ordenamiento, $columnas)
		{
			return $this->consultaSQL("SELECT $columnas FROM $tabla ORDER BY $ordenamiento DESC LIMIT 1");
		}
	}
}
?>