<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// class Validation extends BaseController
// {
//     private $session;
//     private $newToken;

//     public function __construct() {
//         $this->session = \Config\Services::session();
//     }
//     public function index()
//     {
       
//         if ($this->request->is('post')) {
//             $rules = [
//                 'email' => 'required|valid_email',
//                 'password' => 'required|max_length[10]|min_length[3]'
//             ];

//             if($this->validate($rules)){
//                 echo("validatin success");
//             }else{
//                 $data['validation'] = $this->validator;
//                 $data['post'] = $this->request->getPost();
//                 return view('validation',$data);
//             }        
    
//             // print_r($_POST);
//         } else {
            
//             // print_r($token);
           

//             // $form_token = $this->session->get('form_token');
//             // print_r($form_token);
//             // $data['post'] = [ 
//             //   "email"=>"",
//             //   "password"=>""
//             // ];
//             // return view('validation',$data);
//         }
//     }
// }
