<!-- Wishlist functions with wishlist table -->
<?php
class Wish
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into wishlist table
    public  function insertIntoWishlist($params = null, $table = "wishlist")
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
    
    // get user_id and product_id and insert them in wishlist table
    public function addToWishlist($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "product_id" => $itemid
            );
            $result = $this->insertIntoWishlist($params);
            if ($result) {
                header("Location: ./wishlist.php" );
            }
        }
    }

    // Delete product from the wishlist
    public function deleteProduct($item_id = null, $table = 'wishlist')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE product_id={$item_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get product_id of the wishlist
    public function getWishId($wishArray = null, $key = "product_id")
    {
        if ($wishArray != null) {
            $wish_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $wishArray);
            return $wish_id;
        }
    }
}
