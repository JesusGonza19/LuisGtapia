<?php

namespace Luisgtapia\Http\Controllers\Auth;

use Luisgtapia\User;
use Validator;
use Luisgtapia\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


/*Se agregaron estas tres clases para un mejor funcionamiento
*/

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

/*
*/


class AuthController extends Controller
{
/*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


    /* Login (Con esto lo que hacemos es que nos mande a la vista y nos muestre el formuario de Login )
    */

       protected function getLogin()
    {
        return view("login");
    }

    /*
    */
       

    /*  Aqui es para verificar la informacion y los certificados y si estan bien nos mandaran a nuestro home o index
    */

        public function postLogin(Request $request)
   {
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
    ]);


    $credentials = $request->only('email', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
        return view("home");
    }

    return "Credenciales incorrectas";

    }


    /*
    */



    /* login (Registro) aqui se introduce el nuevo usuario, lo guarda y notifica el status
    */
    


        protected function getRegister()
    {
        return view("registro");
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);


    $data = $request;


    $user=new User;
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);


    if($user->save()){

         return "se ha registrado correctamente el usuario";
               
    }
   

   

}

    /*
    */


    /* Esto es para la salida 
    */

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }


    /*
    */

}
