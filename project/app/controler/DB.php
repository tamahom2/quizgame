<?php
class DB
{
    protected $connection;
    protected $query;
    protected $query_closed = TRUE;
    public $query_count = 0;
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'project');
        if ($this->connection->connect_error) {
            $this->error("ERROR : Couldn't connect to DB." . $this->connection->connect_error);
        }
        $this->connection->set_charset('utf8');
    }
    public function getConn()
    {
        return $this->connection;
    }
    public function query($query)
    {
        if (!$this->query_closed) {
            $this->query->close();
            $this->query_closed = TRUE;
        }
        if ($this->query = $this->connection->prepare($query)) {
            if (func_num_args() >= 2) {
                $args = array_slice(func_get_args(), 1);
                $type = '';
                $args_ref = array();
                foreach ($args as $k => &$argu) {
                    if (is_array($args[$k])) {
                        foreach ($args[$k] as $i => &$j) {
                            $types .= $this->_gettype($args[$k][$i]);
                            $args_ref[] = &$j;
                        }
                    } else {
                        $types .= $this->_gettype($args[$k]);
                        $args_ref = &$argu;
                    }
                }
                array_unshift($args_ref, $types);
                call_user_func_array(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
            if ($this->query->errno) {
                $this->error("Unable to process MySQL query (check your params)" . $this->query->error);
            }
            $this->query_closed = FALSE;
            $this->query_count++;
        } else {
            $this->error("Unable to process MySQL statement (check your syntax)" . $this->connection->error);
        }
        return $this;
    }
    public function close()
    {
        return $this->connection->close();
    }
    public function error($error)
    {
        exit($error);
    }
    public function _gettype($var)
    {
        if (is_int($var)) return 'i';
        if (is_float($var)) return 'd';
        if (is_bool($var)) return 'b';
        return 's';
    }
    public function fetchArray()
    {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            foreach ($row as $key => $val) {
                $result[$key] = $val;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }
    public function fetchAll($callback = null)
    {
        $params = array();
        $row = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            if ($callback != null && is_callable($callback)) {
                $value = call_user_func($callback, $r);
                if ($value == 'break') break;
            } else {
                $result[] = $r;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
        return $result;
    }
    public function numRows()
    {
        $this->query->store_result();
        return $this->query->num_rows;
    }

    public function affectedRows()
    {
        return $this->query->affected_rows;
    }

    public function lastInsertID()
    {
        return $this->connection->insert_id;
    }
}
