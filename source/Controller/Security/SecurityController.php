<?php

namespace App\Controller\Security;

use App\Model\User;
use App\Repository\UserRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class SecurityController extends CoreController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    #[Route("/login","app_login",['GET','POST'])]
    public function login():Response
    {
        return $this->view("security/login");
    }

    #[Route("/register","app_register",['GET','POST'])]
    public function register():Response
    {
        if (request()->server->getMethod() === "POST")
        {
            $data = request()->query->all();
            validator()->setData($data)
                ->required(request()->query->keys())
                ->same("password","password_confirm")
                ->unique("username",$this->userRepository)
            ;

            if (validator()->isValid())
            {
                $cleanData = validator()->getCleanData();
                $user = new User();
                $user->setName($cleanData['name']);
                $user->setUsername($cleanData['username']);
                $user->setPassword(password_hash($cleanData['password'],PASSWORD_BCRYPT));
                $this->userRepository->save($user);
                $this->redirectTo("app_login");
            }else{
                return $this->view("security/register",['errors' => validator()->getErrors(),'old' => $data]);
            }
        }
        return $this->view("security/register");
    }
}