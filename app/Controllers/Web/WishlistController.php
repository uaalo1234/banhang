<?php 

require_once('app/Controllers/Controller.php');
require_once('app/Models/Wishlist.php');
require_once('core/Auth.php');
class WishlistController extends Controller{

    public function index(){
        if(Auth::getUser('user')){
        $wishlist = new Wishlist();
        $wishlists = $wishlist->show_wishlist(Auth::getUser('user')['id']);
            require('views/web/wishlist.php');
        }else{
            return redirect('homepage');
        }
    }
    public function add_to_wishlist(){
        if(Auth::getUser('user')){
        // $productId = $_GET['id'];
        // $userId = Auth::getUser('user')['id']; 
        $wishlist = new Wishlist();
        // $wishlist = $wishlist->add_to_wishlist($productId,$userId);
        $wishlist = $wishlist->create($_POST);
        // print_r($wishlist);die();
    }else{
        return redirect('auth/handleLogin');
    }
    }
    public function delete_wishlist(){
        $id = $_GET['id'];
        $wishlist = new Wishlist();
        $wishlist = $wishlist->delete_wishlist($id);
        return redirect('wishlist/index');
    }
}
