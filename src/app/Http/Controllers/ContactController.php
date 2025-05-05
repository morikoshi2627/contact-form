<?php

namespace App\Http\Controllers;

// これを消して下記へ　　use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
// Contactモデルを利用して保存処理
use App\Models\Contact;

class ContactController extends Controller
{
  // index.blade.php（フォーム入力ページ）を呼び出す
  public function index()
  {
    return view('index');
  }
  // 確認画面への送信ボタンクリック時に行われる処理を作成
  // これを消して下記へ　public function confirm(Request $request)
  public function confirm(ContactRequest $request)

  {
      $contact = $request->only(['name', 'email', 'tel', 'content']);
      return view('confirm', compact('contact'));
  }
  // 完了画面への送信ボタンのクリック時に行われる処理を作成
  // これを消して下記へ　public function store(Request $request)
  public function store(ContactRequest $request)
  {
      $contact = $request->only(['name', 'email', 'tel', 'content']);
      // Contact モデルを使った、データの保存処理のコード
      Contact::create($contact);
      // お問合せ完了ページに遷移（thanks.blade.php を呼び出す）
      return view('thanks');
  }

}
