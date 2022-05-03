<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Cart.php');
require_once('app/Models/City.php');
require_once('app/Models/District.php');
require_once('app/Models/Ward.php');

class CheckoutController extends WebController
{
    private $cart;
    private $city;
    private $district;
    private $wards;

    public function __construct()
    {
        $this->cart = new Cart();    
        $this->city = new City();
        $this->district = new District();
        $this->wards = new Ward();
    }
    public function index()
    {
        $cartItems = $this->cart->getCartItems();
        $cities = $this->city->findAll()->hydrate();
        return $this->view('checkout/index.php', ['cartItems' => $cartItems, 'cities' => $cities]);
    }

    public function districts()
    {
        $maTP = $_GET['matp'];
        $districts = $this->district->where(['matp' => $maTP])->hydrate();
        return $this->ajax(['districts' => $districts]);
    }

    public function wards()
    {
        $maqh = $_GET['maqh'];
        $wards = $this->wards->where(['maqh' => $maqh])->hydrate();
        return $this->ajax(['wards' => $wards]);
    }
}