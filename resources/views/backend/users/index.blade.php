@extends('backend.backend')

@section('content')
    <!-- content users list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <div class="row fl-right mar-bottom">
            <div class="col-md-12">
              <input onclick="location.href='user_regist.html'" value="ユーザーの新規登録" type="button" class="btn btn-sm btn-primary"/>
            </div>
          </div>
          <table class="table table-bordered table-striped clearfix">
            <tr>
              <td class="col-title" align="center">名前</td>
              <td class="col-title" align="center">所属</td>
              <td class="col-title" align="center">ユーザーID</td>
              <td class="col-title" align="center">権限</td>
              <td class="col-title" align="center">編集</td>
              <td class="col-title" align="center">削除</td>
            </tr>
            <tr>
              <td>山田　花子</td>
              <td>キッズ</td>
              <td>hanakoyamada</td>
              <td>S管理者</td>
              <td align="center"><input onclick="location.href='user_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='user_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
            <tr>
              <td>杉元　俊彦</td>
              <td>キッズ</td>
              <td>sugimoto</td>
              <td>管理</td>
              <td align="center"><input onclick="location.href='user_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='user_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input name="button3" value="前の20件を表示" disabled="disabled" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button4" value="次の20件を表示" type="submit" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content users list -->
@endsection