<?php
// php routine class
class Morning
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into wishlist table
    public  function insertIntoRoutine($params = null, $table = "routine")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    // get user_id and product_id and insert them in routine table
    public function addToRoutine($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "product_id" => $itemid
            );
            $result = $this->insertIntoRoutine($params);
            if ($result) {
                // reload page
                header("Location: routine.php " );
            }
        }
    }
}
