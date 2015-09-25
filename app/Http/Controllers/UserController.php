<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
	public function __construct(){
		$this->middleware('cors');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	var_dump(file_get_contents("php://input"));die;
	header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	if(!empty($_POST)){
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if($user == "Gabriel" && $pass == "123456")
		{
			$hash = $user . date('dmYHis');
			$token = ["token" => md5($hash)];
			return json_encode($token);
		} else {
			header("HTTP/1.0 403 Not Authenticate");
			echo json_encode(['error'=>'404']);
		}	
	}
	var_dump($_SERVER);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	$post = $request->all();
	if(!empty($post) && ($post['username'] == "Gabriel" && $post['password'] == "123456")){
		$hash = $post['username'] . date('dmYHis');
                $token = ["token" => md5($hash)];
		return response()->json($token);
	}
	header("HTTP/1.0 403 Not Authenticate");
	return response()->json(['error'=>'Not Authenticate', 'status' => '403']);
	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
