<!-- Adding products into Evening routine section -->
<?php
class Evening
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into Evening routine table
    public  function insertIntoEveningRoutine($params = null, $table = "evening_routine")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // Method in your class for adding to evening routine
    public function addToEveningRoutine($userid, $itemid)
    {
        $maxEveningProducts = 4;
        if (isset($userid) && isset($itemid)) {
            $eveningRoutineCount = $this->getEveningRoutineCount($userid);
            if ($eveningRoutineCount < $maxEveningProducts) {
                $params = array(
                    "user_id" => $userid,
                    "product_id" => $itemid
                );
                $result = $this->insertIntoEveningRoutine($params);
                if ($result) {
                    header("Location: ./routine.php ");
                    exit;
                }
            } else {
                echo "Evening routine is full. You can't add more products.";
            }
        }
    }

    // Method to get the count of products in evening routine
    public function getEveningRoutineCount($userid)
    {
        if ($this->db->con != null) {
            $query_string = sprintf("SELECT COUNT(*) as count FROM evening_routine WHERE user_id=%s", $userid);
            $result = $this->db->con->query($query_string);
            $data = $result->fetch_assoc();
            return $data['count'];
        }
        return 0;
    }

    // Delete product from the evening routine
    public function deleteEveningRoutineProduct($item_id = null, $table = 'evening_routine')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE product_id={$item_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    // get product ud from evening routine list
    public function getEveningId($eveningArray = null, $key = "product_id")
    {
        if ($eveningArray != null) {
            $evening_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $eveningArray);
            return $evening_id;
        }
    }
}
?>