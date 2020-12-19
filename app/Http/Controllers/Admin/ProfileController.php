<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//Controller.phpを呼び出している
use App\Http\Controllers\Controller;

// 以下を追記することでProfile Modelが扱えるようになる
use App\Profile;

// Historyモデルの使用を宣言する
use App\ProfileHistory;

// Carbonを使って取得した現在時刻を、Historyモデルの edited_at として記録します。
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
   public function create(Request $request)
   {
       
       //Varidationを行う
       $this->validate($request,Profile::$rules);
       
       $profile = new Profile;
       $form = $request->all();
       
       //フォームから送信されてきた_tokenを消去する
       unset($form['_token']);
       
       //データベースに保存する
       $profile->fill($form);
       $profile->save();
       
       return redirect('admin/profile/create');
    }
    
    public function edit(Request $request){
        // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    
    }
    
    public function update(Request $request){
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profiles Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      
      // データベースに保存する
      $profile->fill($profile_form);
      $profile->save();
      
      //$historyにprofilehistoriesテーブルのインスタンスを代入
      $history = new ProfileHistory;
      
      //profilehistoriesテーブルのnews_idにNewsテーブルのidを記録
      $history->profile_id = $profile->id;
        
      //profilehistoriesテーブルのedited_atに現在時刻を記録
      $history->edited_at = Carbon::now();
        
      //profilehistoriesテーブルを保存
      $history->save();
        
      return redirect('admin/profile/create');
    }
    
    
}
