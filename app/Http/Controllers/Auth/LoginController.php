<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AutenticationService;
use App\Services\RadiosService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use App\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $autenticationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AutenticationService $autenticationService, RadiosService $radiosService)
    {
        $this->middleware('guest')->except('logout');
        $this->autenticationService = $autenticationService;
        parent::__construct($radiosService);
    }

    public function showLoginForm()
    {
        $authorizationUrl = $this->autenticationService->resolveAuthorizationUrl();
        return view('auth.login', compact('authorizationUrl'));
    }

    public function authorization(Request $request)
    {
        if ($request->has('code')) {
            $tokenData = $this->autenticationService->getCodeToken($request->code);
            $userData = $this->radioService->getUserInformation();
            $user = $this->registerOrUpdateUser($userData, $tokenData);
            $this->loginUser($user);
            return redirect()->intended('home');
        }

        return redirect()->route('login')->withErrors(['Se cancelo la autorizacion']);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        try {
            $tokenData = $this->autenticationService->getPasswordToken($request->email, $request->password);
            $userData = $this->radioService->getUserInformation();
            $user = $this->registerOrUpdateUser($userData, $tokenData);
            $this->loginUser($user, $request->has('remenber'));
            return redirect()->intended('home');
        } catch (ClientException $e) {
            $message = $e->getMessage();
            if (Str::contains($message, 'invalid_credentials')) {
                $this->incrementLoginAttempts($request);
                return $this->sendFailedLoginResponse($request);
            }
            throw $e;
        }
    }


    public function registerOrUpdateUser($userData, $tokenData)
    {
        // dd($tokenData);
        return User::updateOrCreate(
        [
            'service_id' => $userData->id
        ],
        [
            'grant_type' => $tokenData->grant_type,
            'access_token' => $tokenData->access_token,
            'refresh_token' => $tokenData->refresh_token,
            'expires_in' => $tokenData->expires_in // TODO: Guardar valor como token_expires_at para poder utilizar el refresh token
        ]);
    }

    public function loginUser(User $user, $remenber = true)
    {
        Auth::login($user, $remenber);
        session()->regenerate();
    }
}
