@extends('backend.backend')

@section('content')
<!-- content customer search -->
    <section id="page">
      <div class="container">
        <div class="row content">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="col-title"><label for="textSchoolCode">学校コード</label></td>
                <td>
                  <input name="txtSchoolCode" id="textSchoolCode" type="text" class="form-control form-control--small">
                </td>
                <td class="col-title"><label for="textSchoolName">学校名</label></td>
                <td><input name="txtSchoolName" id="textSchoolName" type="text" class="form-control form-control--small"></td>
                <td class="col-title"><label for="textOldSchoolName">性別</label></td>
                 <td><input name="txtOldSchoolName" id="textOldSchoolName" type="text" class="form-control form-control--small"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input onclick="location.href='customer_list.html'" value="検索開始（OR検索）" type="button" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content customer search -->
@endsection