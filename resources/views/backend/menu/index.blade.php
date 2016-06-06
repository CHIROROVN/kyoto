@extends('backend.backend')

@section('content')
<div class="container">
  <div class="row content content--menu">
    <div class="col-md-4">
      <h2>個人情報管理業務</h2>
      <ul>
        <li><a href="student_regist.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>個人情報の新規登録</a></li>
        <li><a href="student_import.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>個人情報のCSV一括登録</a></li>
        <li><a href="student_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>個人情報の検索・一覧・修正・削除・CSV出力</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h2>プレゼント発送業務</h2>
      <ul>
        <li><a href=""><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>対象者の抽出・CSV出力</a></li>
      </ul>
      <h2>資料発送業務</h2>
      <ul>
        <li><a href=""><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>対象者の抽出・表示・CSV出力</a></li>
      </ul>
      <h2>資料請求番号通知業務</h2>
      <ul>
        <li><a href=""><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>資料請求番号等のCSV出力</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h2>マスタ管理</h2>
      <ul>
        <li><a href="customer_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>顧客マスタ管理</a></li>
        <li><a href="enterprise_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>法人マスタ管理</a></li>
        <li><a href="{{ route('backend.baitais.search') }}"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>媒体マスタ管理</a></li>
        <li><a href="pamphlet_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>資料請求番号マスタ管理</a></li>
        <li><a href="g-pamphlet_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>一括資料請求番号マスタ管理</a></li>
        <li><a href="{{ route('backend.bunyas.search') }}"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>分野番号マスタ管理</a></li>
        <li><a href="highschool_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>高等学校マスタ管理</a></li>
        <li><a href="university_search.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>大学マスタ管理</a></li>
        <li><a href="{{ route('backend.presents.index') }}"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>プレゼントマスタ管理</a></li>
        <li><a href="campaign_list.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>キャンペーンマスタ管理</a></li>
        <li><a href="user_list.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>ユーザー管理</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection