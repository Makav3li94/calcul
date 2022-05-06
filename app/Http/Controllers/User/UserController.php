<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invest;
use App\Models\PreRegister;
use App\Models\User;
use App\Traits\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Sms;

    public function dashboard()
    {
        $user = auth()->guard('web')->user();
        $invests = Invest::where('user_id', $user->id)->get();

        return view('admin.dashboard', compact('user','invests'));
    }

    public function profile()
    {
        $user = auth()->guard('web')->user();
        return view('admin.profile.edit', compact('user'));
    }


    public function resendCode(Request $request)
    {

        $preRegister = PreRegister::where('mobile', $request->mobile)->first();
        $toNum = $request->mobile;
        $pattern_code = "bc0i2oyxxa";
        $input_data = array("code" => "{$preRegister->code}");
        $result = $this->sentWithPattern([$toNum], $pattern_code, $input_data);

        return response()->json(['sms_send' => 'success', 'result' => $result]);
    }

    protected function forgetPassword(Request $request)
    {
        $user = User::where('mobile', $request->mobile)->first();
        if (!empty($user)) {
            $pass = rand(111111, 999999);
            $token = self::quickRandom(42);
            $user->password = Hash::make($pass);
            $user->save();
            $this->sentWithPattern([$user->mobile], 'y0s8ad6uiv', ['pass' => $pass]);
            return redirect()->route('login', ['token' => $token, 'mobile' => $user->mobile])->with('newPassSent', 'true');
        } else {
            return redirect()->back()->with('numberNotFound', 'همچین شماره ای وجود ندارد.');
        }
    }


    public static function quickRandom($length = 8)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

}
