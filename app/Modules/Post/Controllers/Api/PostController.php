<?php

namespace App\Modules\Post\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CommonHelper;
use App\Models\Admin;
use App\Models\RoleAdmin;
use App\Models\Setting;
use App\Modules\Post\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\MailServer;
use App\Modules\Post\Controllers\Api;
use Illuminate\Http\Response;
class PostController extends Controller
{
    public function getPost(Request $request){
        $post = Post::all();
        return response()->json($post,Response::HTTP_OK);
    }
    public function getPostDetail(Request $request, string $id){
        $post = Post::find($id);
        return response()->json($post,Response::HTTP_OK);

    }
}