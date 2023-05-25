<?php

namespace App\Http\Controllers;

use App\Api_key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TokenAccess as TokenAccessResource;

class ApiKeyController extends Controller
{
    public function index()
    {
        $data = Api_key::orderBy('id','desc')->paginate(8);

        return view('token',$data);
    }
    public function alltoken($id)
    {
        // Get all the token from db
        log::info('id me kya aa rha hai' . $id);
        log::info('api key me insert kr gye hai');
        $getting_data = Api_key::get();
        log::info('token wala data me kya aa rha hai' . $getting_data);
        $response = [
            'success' => true,
            'data' => TokenAccessResource::collection($getting_data),
            'message' => 'all token name getting successfully.',
            'count' => count($getting_data)
        ];
        return response()->json($response, 200);
    }


    public function api_store(Request $request)
    {
        $input = $request->all();
        Log::info('api store token me kya aa rha hai' . print_r($input, true));
        $validator = Validator::make($input, [
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 422);
        } else {
            $gets_apis_data = Api_key::where('name', $input['name'])->where('email', $input['email'])->where('city', $input['city'])->first();
            if ($gets_apis_data === NULL) {
                Log::info('user token added successfullly');
                // encrypt open
                $getting_name = $input['name'];
                $getting_email = $input['email'];
                $getting_city = $input['city'];
                Log::info('str password me kya aa rha hai'.$getting_name);
                $key = "wizbrand";
                $chiper = "AES-128-CTR";
                $ivLen = openssl_cipher_iv_length($chiper);
                Log::info('iv 4 len me kya aa rha hai'.$ivLen);
                // $iv = $request->token;
                $iv = $request->user_security_token;
                Log::info('request token me kya value hai'.$iv);
                $options = 0;
                $name_encrypt = openssl_encrypt($getting_name, $chiper, $key, $options, $iv);
                $email_encrypt = openssl_encrypt($getting_email, $chiper, $key, $options, $iv);
                $city_encrypt = openssl_encrypt($getting_city, $chiper, $key, $options, $iv);
                Log::info('isme sirf encrypted data hai'.$name_encrypt);
                $Apicreates = Api_key::create([
                    'name' => $name_encrypt,
                    'email' => $email_encrypt,
                    'city' => $city_encrypt,
                ]);
                $response = [
                    'success' => true,
                    'data' => new TokenAccessResource($Apicreates),
                    'message' => 'Token Added Successfully.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'data' => '',
                    'message' => 'Token Already Exist.'
                ];
            }
            // if condition close
            return response()->json($response, 200);
        }
    }

    public function edit_token($id)
    {
        $getting_api = Api_key::find($id);
        Log::info("abhi hum edit token me in kr gye hai");
        if (is_null($getting_api)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Token not found.'
            ];
            return response()->json($response, 404);
        } else {
            $response = [
                'success' => true,
                'data' => $getting_api,
                'message' => 'token retrieved successfully on edit function .'
            ];
            return response()->json($response, 200);
        }
    }


    public function getting_token_new_token($get_token_id, $user_getting_id)
    {
        Log::info('new getting user id : > ');
        Log::info('new user security code : > ');
        $decrypt_data = Api_key::where('id', $user_getting_id)->first();
        Log::info('new condition check');
        $edit_find_name = $decrypt_data->name;
        $edit_find_email = $decrypt_data->email;
        $getting_city = $decrypt_data->city;
        Log::info("find email id by email_address ");
        Log::info("how many value is coming on find_email");
        $key = "wizbrand";
        $chiper = "AES-128-CTR";
        $iv = $get_token_id;
        Log::info("vi main value aaaa gaya" . $iv);
        $options = 0;
        $getting_decrypt_name_id = openssl_decrypt($edit_find_name, $chiper, $key, $options, $iv);
        $getting_decrypt_email_id = openssl_decrypt($edit_find_email, $chiper, $key, $options, $iv);
        $getting_decrypt_city_id = openssl_decrypt($getting_city, $chiper, $key, $options, $iv);
        Log::info("new wala getting_decrypt_email_id name aaya ki");
        $response = [
            'success' => true,
            'data' => $getting_decrypt_email_id,
            'getting_decrypt_data_email' => $getting_decrypt_email_id,
            'getting_decrypt_name_id' => $getting_decrypt_name_id,
            'getting_decrypt_city_id' => $getting_decrypt_city_id,
            // 'getting_pwd_dcrypt' => $getting_decrypt_pwd,
            'message' => ' retrieved successfully encrypt data.',
        ];
        return response()->json($response, 200);
    }


    public function getting_on_edit_token_data($input_user_token, $user_prim_id)
    {
        Log::info('new data is getting : > ' . $input_user_token);
        Log::info('user primary id  getting_on_edit_token : > ' . $user_prim_id);
        $edit_input_decrypt_data = Api_key::where('id', $user_prim_id)->first();
        Log::info('condition checked and get all value');
        $edit_find_email = $edit_input_decrypt_data->name;

        Log::info("valie is coming on get edit page");
        $key = "wizbrand";
        $chiper = "AES-128-CTR";
        $iv = $input_user_token;
        Log::info("vi main value aaaa gaya" . $iv);
        $options = 0;
        $edit_decrypt_email_id = openssl_decrypt($edit_find_email, $chiper, $key, $options, $iv);
        $return_edit_decrypt_pwd = openssl_decrypt($chiper, $key, $options, $iv);
        Log::info("decrypt me kya value aa rhai hai " . $edit_decrypt_email_id);
        Log::info("password ka to jaruri hai nhi " . $return_edit_decrypt_pwd);
        $response = [
            'success' => true,
            // 'data' => $edit_decrypt_email_id,
            'data' => $edit_input_decrypt_data,
            'edit_decrypt_email_id' => $edit_decrypt_email_id,
            'return_edit_decrypt_pwd' => $return_edit_decrypt_pwd,
            'message' => ' retrieved successfully encrypt data.',
        ];
        return response()->json($response, 200);
    }
}
