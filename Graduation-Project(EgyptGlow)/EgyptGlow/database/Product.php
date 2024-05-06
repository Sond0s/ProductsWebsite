<!-- Get product data from product table -->
<?php
class Product
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert product data into db
    public function getData($table = 'product')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        if (!$result) {
            echo "Error: " . $this->db->con->error; 
            return array(); 
        }
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get product using item id
    public function getProduct($item_id = null, $table = 'product')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_id={$item_id}");
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    // fetch product from table to routine section
    public function getRoutine($item_id = null, $table = 'routine')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_id={$item_id}");
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
}
