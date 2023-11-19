<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
 
class LoginController extends Controller
{
    use AuthenticatesUsers;
 
    // ログイン後はposts画面に移動
    protected $redirectTo = '/posts';
    
    // ログアウト後の動作をカスタマイズ
    protected function loggedOut(Request $request)
    {
        // ログイン画面にリダイレクト
        return redirect(secure_url('login'));
    }
    
    public function username()
    {
        //ログインに使うフィールド名を設定する
        return 'name';
    }
    
}