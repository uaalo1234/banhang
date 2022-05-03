<?php 

require_once('./core/Database.php');

class Model 
{
    protected $dbConnection;

    protected $table;

    protected $data;

    protected $sql;

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::getInstance();
    }

    public function findAll($columns = ['*'])
    {
        $columns = implode(',', $columns);
        $this->sql = "SELECT $columns FROM {$this->table}";
        $result = $this->dbConnection->query($this->sql);
        $this->data = $result->fetch_all(MYSQLI_ASSOC);
        return $this;
    }

    /**
     * Find where with multiple condition
     *
     */
    public function where($wheres = [])
    {   
        $where = implode(' AND ',array_map(function($key, $value) {
            if (is_numeric($value)) {
                return "$key = $value";
            }
            return "$key = '$value'";
        }, array_keys($wheres), array_values($wheres)));
        

        $this->sql = "SELECT * FROM {$this->table} WHERE $where";
        $result = $this->dbConnection->query($this->sql);
        $this->data = $result->fetch_all(MYSQLI_ASSOC);
        return $this;
    }


    //==================== FORMAT DỮ LIỆU TRẢ VỀ: Array hoặc object ============
    /**
     * Get first record
     *
     */
    public function first()
    {
        $this->sql .= " LIMIT 1";
        $result = $this->dbConnection->query($this->sql);
        $this->data = $result->fetch_assoc();
        return $this->data;
    }

    public function get()
    {
        return $this->data;
    }

    public function hydrate() 
    {
        if (is_array($this->data)) {
            $arrayObjects = [];
            foreach($this->data as $parentKey => $object) {
                $instance = new $this();
                if (is_numeric($parentKey)) {
                    foreach ($object as $key => $value) {
                        $instance->$key = $value;
                    }
                    $arrayObjects[] = $instance;
                } else {
                    foreach ($this->data as $key => $value) {
                        $instance->$key = $value;
                    }
                    return $instance;
                }
            }
            return $arrayObjects;
        }
    }


    //========= XỬ LÍ SQL CHO SẴN ============
    public function getFirst($sql)
    {
        $result = $this->dbConnection->query($sql);
        $this->data = $result->fetch_assoc();
        return $this;
    }

    public function getAll($sql)
    {
        $result = $this->dbConnection->query($sql);
        $this->data = $result->fetch_all(MYSQLI_ASSOC);
        return $this;
    }

    //============= CRUD ==============

    public function create($data)
    {
        if (count($data) > 0) {
            $keys = array_keys($data);
            $values = array_map(function($item) {
                return "'$item'";
            }, array_values($data));

            $fields = implode(',',$keys);
            $values = implode(',',$values);
            $this->sql = "INSERT INTO {$this->table}({$fields}) VALUES ($values)";
            return $this->dbConnection->query($this->sql);
        }
    }

    /**
     * GET first record
     *
     * @param [type] $id
     */
    public function find($id)
    {
        $this->sql = "SELECT * FROM {$this->table} where id = {$id}";
        $result = $this->dbConnection->query($this->sql);
        $this->data = $result->fetch_assoc();
        return $this;
    }

    /**
     * Update
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data, $id)
    {
        $updateDataString = implode(',', array_map(function($key, $value) {
            return "$key = '$value'";
        }, array_keys($data), array_values($data)));

        $this->sql = "UPDATE {$this->table} SET $updateDataString WHERE id = $id";
        $result = $this->dbConnection->query($this->sql);
        return $result;
    }

    /**
     * DELETE
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $this->sql = "DELETE FROM {$this->table} WHERE id = $id";
        $result = $this->dbConnection->query($this->sql);
        return $result;
    }


    //=============DEBUG=========
    public function toSql()
    {
        print_r($this->sql);die();
    }
}