@extends('backend.backend')

@section('content')
<!-- content enterprise search -->
    <section id="page">
      <div class="container">
        <div class="row content">
          <div class="row fl-right mar-bottom">
            <div class="col-md-12">
              <input onclick="location.href='{{route('')}}'" value="法人の新規登録" type="button" class="btn btn-sm btn-primary">
            </div>
          </div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="col-title"><label for="textCorporateName">法人名</label></td>
                <td>
                  <input name="txtCorporateName" id="textCorporateName" type="text" class="form-control form-control--default">
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input onclick="location.href='enterprise_list.html'" value="検索開始（OR検索）" type="button" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" id="button5" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content enterprise search -->
@endsection