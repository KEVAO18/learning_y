<?php


namespace db\models {
	
	include_once("userModel.php");

	include_once("../../http/config/sql.php");

    use db\models\user;

    use controller\sql as sql;
    class curso
    {
	
		private int $id;

		private user $profesor;

		private string $nom_curso;

		private string $descripcion;

		private string $contenido;

		private sql $q;

		public function __construct() {
			$this->setQ(new sql);
		}

		/**
		 * 
		 * retorna un texto en formato json con los datos del curso que contiene el objeto
		 * 
		 * @return string texto en formato json con datos que contiene el objeto
		 * 
		 */
		public function toJson()
		{

			return json_encode(
				$this->toArray()
			);
		}

		/**
		 * 
		 * retorna un array con los datos del curso que contiene el objeto
		 * 
		 * @return array array de los datos que contiene el objeto
		 * 
		 */
		public function toArray(){

			return array(
				"id" => $this->getId(),
				"profesor" =>$this->getProfesor()->toArray(),
				"nombre" => $this->getNomCurso(),
				"descripcion" => $this->getDescripcion(),
				"contenidos"
			);

		}

		/**
		 * 
		 * retorna un texto con los datos del curso que contiene el objeto
		 * 
		 * @return string texto con datos que contiene el objeto
		 * 
		 */
		public function toString(){

			return "'".$this->getId().
				"', '".$this->getProfesor()->getId().
				"', '".$this->getNomCurso().
				"', '".$this->getDescripcion();
				"', '".$this->getContenido()."'";

		}

		/**
		 * retorna un array con todas las tuplas de la tabla
		 */
		public function getAll() {

			try {

				$datos = $this->getQ()->All('cursos');
				
				$array = array();
	
                foreach ($datos as $d) {
                    $dato = new curso;

                    array_push($array, $dato->find("id = ".$d['id']));
                }
	
				return $array;
				
			} catch (\Throwable $th) {

				echo "Error en curso, metodo getAll fallo: ".$th;
                
                return array();

			}

		}

		/**
		 * asigna un valor a todos los atributos de la clase
		 * 
		 * @since 17/10/2023
		 * 
		 * @param int  $id
		 * 
		 * @param user $profesor
		 * 
		 * @param string $nom_curso
		 * 
		 * @param string $descipcion
		 * 
		 * @param string $contenidos
		 */
		public function setAll(
			int $id, 
			user $profesor, 
			string $nom_curso, 
			string $descipcion,
			string $contenidos
			) {
				$this->setId($id);
				$this->setProfesor($profesor);
				$this->setNomCurso($nom_curso);
				$this->setDescripcion($descipcion);
				$this->setContenido($contenidos);

		}

		/**
		 * busca una peticion y retorna un objeto de tipo peticiones que contiene 
		 * toda la informacion de este objeto
		 * 
		 * @param string $op codigo contenido del where que va a hacer la comparacion 
		 * el los datos de la base de datos
		 * 
		 * @since 16/10/2023
		 * 
		 * @return $this objeto de tipo user
		 */
		public function find(string $op)
		{

			try {
				$temp_user = new user;

				$datos = $this->getQ()->where('cursos', $op);

				foreach ($datos as $d) {
					$this->setAll(
						$d['id'],
						$temp_user->find("id = ".$d['profesor']),
						$d['nom_curso'],
						$d['descripcion'],
						$d['contenidos']
					);
				}

				return $this;
			} catch (\Throwable $th) {
				echo "Error en curso, metodo find fallo: ".$th;
			}
		}

		/**
		 * guardar una tupla en la base de datos
		 * 
		 * @param int $id
		 * 
		 * @param user $profesor
		 * 
		 * @param string $nom_curso
		 * 
		 * @param string $descipcion
		 * 
		 * @param string $contenidos
		 */
		public function save(
			int $id,
			user $profesor,
			string $nom_curso,
			string $descipcion,
			string $contenidos
		) {

			try {
				$user = new user;

				$this->setAll(
					$id,
					$profesor,
					$nom_curso,
					$descipcion,
					$contenidos
				);

				$columnas = "id, profesor, nom_curso, descripcion, contenidos";

				$this->getQ()->insert('cursos', $columnas, $this->toString());
			} catch (\Throwable $th) {
				echo "Error en curso, metodo save fallo: ".$th;
			}
		}

		/**
		 * elimina tupla de la base de datos
		 * 
		 * @param int $id
		 */
		public function delete(int $id)
		{
			$this->getQ()->delete('cursos', 'id', $id);
		}

		/**
		 * Get the value of id
		 */
		public function getId(): int
		{
			return $this->id;
		}

		/**
		 * Set the value of id
		 */
		public function setId(int $id): self
		{
			$this->id = $id;

			return $this;
		}

		/**
		 * Get the value of profesor
		 */
		public function getProfesor(): user
		{
			return $this->profesor;
		}

		/**
		 * Set the value of profesor
		 */
		public function setProfesor(user $profesor): self
		{
			$this->profesor = $profesor;

			return $this;
		}

		/**
		 * Get the value of nom_curso
		 */
		public function getNomCurso(): string
		{
			return $this->nom_curso;
		}

		/**
		 * Set the value of nom_curso
		 */
		public function setNomCurso(string $nom_curso): self
		{
			$this->nom_curso = $nom_curso;

			return $this;
		}

		/**
		 * Get the value of descipcion
		 */
		public function getDescripcion(): string
		{
			return $this->descripcion;
		}

		/**
		 * Set the value of descipcion
		 */
		public function setDescripcion(string $descipcion): self
		{
			$this->descripcion = $descipcion;

			return $this;
		}

		/**
		 * Get the value of q
		 */
		public function getQ(): sql
		{
			return $this->q;
		}

		/**
		 * Set the value of q
		 */
		public function setQ(sql $q): self
		{
			$this->q = $q;

			return $this;
		}

		/**
		 * Get the value of contenido
		 */
		public function getContenido(): string
		{
			return $this->contenido;
		}

		/**
		 * Set the value of contenido
		 */
		public function setContenido(string $contenido): self
		{
			$this->contenido = $contenido;

			return $this;
		}
    }

}