<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Database\Seeds\Roles;
use App\Models\CountryModel;
use App\Models\ImageModel;
use App\Models\RoleModel;
use App\Models\UserDetailModel;
use App\Models\UserModel;
use Config\Session;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => 'Home'
        ];
        return view("common/header", $data)
            . view('home')
            . view("common/footer");
    }

    public function addUser(): string
    {
        $header = [
            "title" => 'User Add'
        ];

        $nullPayload = [
            'role_id' => null,
            'name' => null,
            'address' => null,
            'country_id' => null,
            'mobile' => null,
            'email' => null,
            'zip_code' => null,
        ];
        $roleModel = new RoleModel();
        $countryModel = new CountryModel();

        $roles = $roleModel->orWhereNotIn('role', ['Admin'])->orderBy('role')->findAll();
        $countries = $countryModel->orderBy('country')->findAll();

        $data = [
            "roles" => $roles,
            "countries" => $countries,
            "payload" => $nullPayload,
            "validation" => null,
            "dbSuccess" => null,
            "isEdit" => false
        ];
        //handle post request
        if ($this->request->is('post')) {
            $postData = $this->request->getPost();
            foreach ($postData as $key => $value) {
                $postData[$key] = trim($value);
            }

            $data["payload"] = $postData;
            $validationRules = [
                'role_id' => 'required',
                'name' => 'required|min_length[3]',
                'address' => 'required|min_length[3]',
                'country_id' => 'required',
                'mobile' => 'required|exact_length[10]',
                'email' => 'required|valid_email',
                'zip_code' => 'required|exact_length[6]',
                'image' => 'uploaded[image]',
            ];



            if (!$this->validate($validationRules)) {
                $data["validation"] = $this->validator;
            } else {
                $image = $this->request->getFile('image');

                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/uploads', $newName);

                    //add data to db
                    $userDetailsModal = new UserDetailModel();
                    $userDetailsModal->insert($postData);

                    $userDetailId = $userDetailsModal->insertID();
                    //insert in image table
                    $imageModel = new ImageModel();
                    $imageModel->insert([
                        'image' => 'uploads/' . $newName,
                        'user_detail_id' => $userDetailId
                    ]);


                    $data['payload'] = $nullPayload;

                    $data["dbSuccess"] = true;
                }
            }
        }

        return view("common/header", $header)
            . view('add-user', $data)
            . view("common/footer");
    }
    public function lockScreen(): string
    {
        return view('lock-screen');
    }

    public function profile()
    {
        $data = [
            "title" => 'Profile'
        ];
        return view("common/header", $data)
            . view('profile')
            . view("common/footer");
    }


    public function signIn()
    {

        $validationRules = [
            'username' => 'required|min_length[5]',
            'password' => 'required|min_length[3]'
        ];
        $data = [
            "payload" => [
                'username' => null,
                "password" => null
            ],
            "validation" => null,
            "dbError" => null,
        ];


        if ($this->request->is('post')) {
            $data["payload"] = $this->request->getPost();
            //validate post request

            if (!$this->validate($validationRules)) {
                //validation error
                $data["validation"] = $this->validator;
            } else {
                //validation success
                $data["validation"] = null;
                $userModel = new UserModel();
                $userCheck = $userModel->where('username', $data["payload"]["username"])->first();

                if (!$userCheck) {
                    $data["dbError"] = "Username not found.";
                } else {
                    //check password
                    $encrypter = \Config\Services::encrypter();
                    $decriptedPassword = $encrypter->decrypt(hex2bin(($userCheck["password"])));

                    if ($data["payload"]["password"] !== $decriptedPassword) {
                        $data["dbError"] = "Invalid password provided.";
                    } else {
                        $session = \Config\Services::session();
                        $userSession = [
                            "id" => $userCheck['user_id']
                        ];

                        $session->set('userSession', $userSession);
                        //redirect user to index page
                        $this->response->redirect(site_url(site_url()));
                    }
                }
            }
        }


        return view('sign-in', $data);
    }

    public function userList()
    {

        $data["title"] = 'User List';
        $db = db_connect();

        $users = $db->query("SELECT * FROM `user_details` " .
            "LEFT JOIN images ON images.user_detail_id = user_details.user_detail_id " .
            "LEFT JOIN roles ON user_details.role_id =roles.role_id " .
            "LEFT JOIN countries ON countries.country_id = user_details.country_id ")->getResultArray();

        return view("common/header", $data)
            . view('user-list', ["users" => $users])
            . view("common/footer");
    }

    public function editUser($userId)
    {
        $userModel = new UserDetailModel();
        $roleModel = new RoleModel();
        $countryModel = new CountryModel();
        $roles = $roleModel->orWhereNotIn('role', ['Admin'])->orderBy('role')->findAll();
        $countries = $countryModel->orderBy('country')->findAll();
        $user = $userModel->where('user_detail_id', $userId)->first();;
        $header["title"] = 'User Edit';

        $data = [
            "roles" => $roles,
            "countries" => $countries,
            "payload" => $user,
            "validation" => null,
            "dbSuccess" => null,
            "isEdit" => true
        ];

        if ($this->request->is('post')) {
            $postData = $this->request->getPost();
            foreach ($postData as $key => $value) {
                $postData[$key] = trim($value);
            }

            $data["payload"] = $postData;
            $validationRules = [
                'role_id' => 'required',
                'name' => 'required|min_length[3]',
                'address' => 'required|min_length[3]',
                'country_id' => 'required',
                'mobile' => 'required|exact_length[10]',
                'email' => 'required|valid_email',
                'zip_code' => 'required|exact_length[6]',
                'image' => 'uploaded[image]',
            ];

            if (!$this->validate($validationRules)) {
                $data["validation"] = $this->validator;
            } else {
                $image = $this->request->getFile('image');

                if ($image->isValid() && !$image->hasMoved()) {
                    //remove old image
                    $imageModel = new ImageModel();
                    $oldImage = $imageModel->first('user_detail_id', $userId);
                    unlink($oldImage['image']);
                    $imageModel->where('user_detail_id', $userId)->delete();

                    $newName = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/uploads', $newName);

                    //add data to db
                    $userDetailsModel = new UserDetailModel();

                    print_r($postData);
                    $userDetailsModel->update( $userId,$postData);
                    //insert in image table

                    $imageModel->insert([
                        'image' => 'uploads/' . $newName,
                        'user_detail_id' => $userId
                    ]);


                    $this->response->redirect(site_url("user-list"));
                }
            }
        }
        return view("common/header", $header)
            . view('add-user', $data)
            . view("common/footer");
    }

    public function signOut()
    {
        $session = Session();
        $session->remove('userSession');
        $this->response->redirect(site_url('sign-in'));
    }

    public function addData()
    {
        $data = [
            'role' => 'admin',
        ];
        //   $model = new RoleModel();
        //   $model->insert($data);

        echo "data addedd";
    }

    public function deleteUser($userId)
    {

        $imageModel = new ImageModel();
        $image = $imageModel->('user_detail_id', $userId);
        echo($image);
        // return 'Hai tehre ' . $userId;

    }
}
