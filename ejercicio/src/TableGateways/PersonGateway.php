<?php
namespace Src\TableGateways;

class PersonGateway {
    /**
    * @access private
    * @var DatabaseConnetor
    */
    private $db = null;
    /**
    * Constructor de la clase PersonGateway
    * @param $db base de datos donde vamos a conectarnos
    */
    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
    * Funcionalidad que se encarga de procesar mostrar los datos de todas las personas
    * Se intenta realizar la consuta  a la base de datos
    * Si es correcto devuelve la consulta
    * Si hay algún error lo caputa
    * @return $result
    */
    public function findAll()
    {
        $statement = "
            SELECT
                id, firstname, lastname, firstparent_id, secondparent_id
            FROM
                person;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
    * Funcionalidad que devuelve los datos de una persona con determinado id pasado como parametro
    * Se intenta realizar la consulta a la base de datos
    * Si todo es correcto devuelve la consulta
    * Si algo falla captura el error
    * @return $result
    */
    public function find($id)
    {
        $statement = "
            SELECT
                id, firstname, lastname, firstparent_id, secondparent_id
            FROM
                person
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
    * Funcionalidad que añade una nueva persona en base a un $input proporcionado
    * @param $input datos de la persona a insertar
    * Se intenta realizar la consulta a la base de datos
    * Si  todo es correcto inserta la nueva persona y devuelve el núermo de filas afectadas
    * Si algo falla captura el error
    * @return $statement
    */
    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO person
                (firstname, lastname, firstparent_id, secondparent_id)
            VALUES
                (:firstname, :lastname, :firstparent_id, :secondparent_id);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'firstparent_id' => $input['firstparent_id'] ?? null,
                'secondparent_id' => $input['secondparent_id'] ?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
    * Funcionalidad que actualiza a una persona en base a un $id y un $input pasados como parámetros
    * @param $id id de la persona a la que actualizar los datos
    * @param $input datos a actualizar de la persona determinada
    * Se intenta realizar la consulta
    * Si todo sale bien se actulizan los datos de esa persona/s y se devuelven el número de filas afectdas
    * Si algo sale mal se captura el error
    * @return $statement
    */
    public function update($id, Array $input)
    {
        $statement = "
            UPDATE person
            SET
                firstname = :firstname,
                lastname  = :lastname,
                firstparent_id = :firstparent_id,
                secondparent_id = :secondparent_id
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'firstparent_id' => $input['firstparent_id'] ?? null,
                'secondparent_id' => $input['secondparent_id'] ?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
    * Funcionalidad que elimina a una persona en base a un $id pasado por parámetro
    * @param $id identificador de la persona/s a eliminar
    * Se intenta conectar a la base de datos
    * Si todo funciona se elimina a la persona/s y se devuelve el número de filas afectadas
    * Si algo sale mal se captura el error
    * @return $statement
    */
    public function delete($id)
    {
        $statement = "
            DELETE FROM person
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
