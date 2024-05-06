<!-- Adding products into morning routine section -->
<?php
class Morning
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into Morningroutine table
    public  function insertIntoMorningRoutine($params = null, $table = "morning_routine")
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

    // Method for adding to morning routine
    public function addToMorningRoutine($userid, $itemid)
    {
        $maxMorningProducts = 4;
        if (isset($userid) && isset($itemid)) {
            $morningRoutineCount = $this->getMorningRoutineCount($userid);
            if ($morningRoutineCount < $maxMorningProducts) {
                $params = array(
                    "user_id" => $userid,
                    "product_id" => $itemid
                );
                $result = $this->insertIntoMorningRoutine($params); 
                if ($result) {
                    header("Location: ./routine.php ");
                    exit;
                }
            } else {
                echo "Morning routine is full. You can't add more products.";
            }
        }
    }

    // Method to get the count of products in morning routine
    public function getMorningRoutineCount($userid)
    {
        if ($this->db->con != null) {
            $query_string = sprintf("SELECT COUNT(*) as count FROM morning_routine WHERE user_id=%s", $userid);
            $result = $this->db->con->query($query_string);
            $data = $result->fetch_assoc();
            return $data['count'];
        }
        return 0;
    }

    // Delete product from the morning routine
    public function deleteMorningRoutineProduct($item_id = null, $table = 'morning_routine')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE product_id={$item_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get product id from morning routine list
    public function getMorningId($morningArray = null, $key = "product_id")
    {
        if ($morningArray != null) {
            $morning_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $morningArray);
            return $morning_id;
        }
    }
}
