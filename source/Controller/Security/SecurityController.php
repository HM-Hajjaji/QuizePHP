<?php

namespace App\Controller\Security;

use App\Model\User;
use App\Repository\UserRepository;
use Core\Component\Controller\CoreController;
use Http\Response;
use Route\Route;

class SecurityController extends CoreController
{
    //TODO : edit system authorization
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    private function redirectUser(): void
    {
        if (request()->getUser())
        {
            if (array_search("TYPE_ADMIN",request()->getUser()->getType()))
            {
                $this->redirectTo("app_admin_home");
            }
            $this->redirectTo("app_user_home");
        }
    }

    #[Route("/login","app_login",['GET','POST'])]
    public function login():Response
    {
       $this->redirectUser();

        if (request()->server->getMethod() == 'POST')
        {
            $data = request()->query->all();
            validator()->setData($data)
                ->required(request()->query->keys());

            if (validator()->isValid())
            {
                $cleanData = validator()->getCleanData();
                $user = $this->userRepository->findOneBy(['username' => $cleanData['username']]);
                if ($user && password_verify($cleanData['password'],$user->getPassword()))
                {
                    request()->session->set("user",$user);
                    $this->redirectUser();
                }else{
                    return $this->view("security/login",['loginError' => "Invalid credentials.",'old' => $data]);
                }
            }else{
                return $this->view("security/login",['errors' => validator()->getErrors(),'old' => $data]);
            }
        }

        return $this->view("security/login");
    }

    #[Route("/register","app_register",['GET','POST'])]
    public function register():Response
    {
        $this->redirectUser();

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

    #[Route("/logout","app_logout")]
    public function logout(): void
    {
        if (request()->session->remove("user"))
        {
            $this->redirectTo("app_login");
        }
    }
}