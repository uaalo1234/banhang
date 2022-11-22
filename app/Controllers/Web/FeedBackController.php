<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Feedback.php');


class FeedBackController extends Controller{

    public function index(){
        $feedback = new Feedback();
        $feedbacks = $feedback->findAll();
        require('views/web/contact_us.php');
}
public function show_feedback(){

    $feedback = new Feedback();
    $feedbacks = $feedback->findAll();
    require('views/admin/dashboard/feedback.php');

}

    public function send_feedback(){
        $feedback = new Feedback();
        $feedback = $feedback->create($_POST);
        return redirect('homepage/index');
    }
}