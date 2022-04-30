<?php 

require_once('app/Models/Product.php');

class Cart 
{
    protected $itemIds;

    public function __construct()
    {
        $this->itemIds = $this->getCartSession();
    }

    public function addCartItem($itemId)
    {
        if (!isset($this->itemIds[$itemId])) {
            $this->itemIds[$itemId] = ['cart_quantity' => 1];
        }
        else {
            $quantity = $this->itemIds[$itemId]['cart_quantity'] + 1;
            $this->itemIds[$itemId] = ['cart_quantity' => $quantity];
        }
        $this->applySession();
    }

    public function updateCartItem($itemId, $quantity)
    {
        if (isset($this->itemIds[$itemId])) {
            $this->itemIds[$itemId]['cart_quantity'] = $quantity;
        }
        $this->applySession();
    }

    public function deleteCartItem($itemId)
    {
        unset($this->itemIds[$itemId]);
        $this->applySession();
    }

    public function getCartItems()
    {
        if (isset($_SESSION['cart'])) 
        {
            $cartItems = $this->getCartSession();
            $cartItemsId = implode(",", array_keys($cartItems));
            $product = new Product();
            $products = $product->getProductsByIds($cartItemsId);
            foreach ($products as $key => $product) {
                $productId = $product['product_id'];
                $products[$productId]['cart_quantity'] = $cartItems[$productId]['cart_quantity'];
                $this->itemIds[$productId]['product'] = $product;
                $this->itemIds[$productId]['cart_quantity'] = $cartItems[$productId]['cart_quantity'];
            }

            return $this->itemIds;
        }
        return [];
    }

    public static function countCartItems()
    {
        return count(self::getCartSession());
    }

    public static function getCartSession()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function applySession()
    {
        $_SESSION['cart'] = $this->itemIds;
    }

    public static function clearCartSession()
    {
        unset($_SESSION['cart']);
    }
}