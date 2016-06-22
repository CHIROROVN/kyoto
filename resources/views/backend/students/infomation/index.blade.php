@extends('backend.backend')
@section('content')
	<!-- Content student list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
            <div class="msg-alert-action">
              @if ($message = Session::get('success'))
                <div class="alert alert-success  alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="no-margin-bottom"><strong><li> {{ $message }}</li></strong></ul>
                </div>
              @elseif($message = Session::get('danger'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="no-margin-bottom"><strong><li> {{ $message }}</li></strong></ul>
                </div>
              @endif
            </div>
            
            <p>全{{ $count_all }}件中、{{ $total_count }}件が該当しました。うち、{{ $record_from }}～{{ $record_to + $students->count() }}件を表示しています。</p>

            <div class="row fl-right mar-bottom">
                <div class="col-md-12">
                    <input onclick="location.href='{{ route('backend.students.regist') }}'" value="個人の新規登録" type="button" class="btn btn-sm btn-primary"/>
                </div>
            </div>

            <table class="table table-bordered table-striped">
              <tr>
                <td class="col-title" align="center">会員ID</td>
                <td class="col-title" align="center">名前</td>
                <td class="col-title" align="center">名前よみ</td>
                <td class="col-title" align="center">性別</td>
                <td class="col-title" align="center">都道府県名</td>
                <td class="col-title" align="center">電話番号</td>
                <td class="col-title" align="center">個人情報管理</td>
                <td class="col-title" align="center">資料請求情報管理</td>
                <td class="col-title" align="center">問い合わせ管理</td>
                <td class="col-title" align="center">希望プレゼント管理</td>
              </tr>
              @if ( empty($students) || count($students) == 0 )
              <tr><td colspan="10" align="center"><strong>{{ trans('common.no_data_correspond') }}</strong></td></tr>
              @else
                @foreach ( $students as $student)
                <tr>
                  <td align="right">{{ $student->per_id }}</td>
                  <td>{{ $student->per_fname }} {{ $student->per_gname }}</td>
                  <td>{{ $student->per_fname_kana }} {{ $student->per_gname_kana }}</td>
                  <td><?php echo ($student->per_sex == 1) ? '男' : '女'; ?></td>
                  <td>{{ $student->pref_name }}</td>
                  <td>{{ $student->per_phone }}</td>
                  <td align="center"><input type="button" onClick="location.href='{{ route('backend.students.detail', [$student->per_id]) }}'" value="個人情報管理" class="btn btn-xs btn-primary"/></td>
                  <td align="center"><input type="button" onClick="location.href='student_brochure_list.html'" value="資料請求情報管理" class="btn btn-xs btn-primary"/></td>
                  <td align="center"><input type="button" onClick="location.href='{{ route('backend.students.contact.index', [$student->per_id]) }}'" value="問い合わせ管理" class="btn btn-xs btn-primary"/></td>
                  <td align="center"><input type="button" onClick="location.href='{{ route('backend.students.present_index') }}'" value="希望プレゼント管理" class="btn btn-xs btn-primary"/></td>
                </tr>
                @endforeach
              @endif
            </table>
        </div>

        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            {!! $students->render(new App\Pagination\SimplePagination($students))  !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right" onclick="location.href='{{ route('backend.students.search', array(
              // 's_pamph_number'          => $s_pamph_number,
              // 's_pamph_name'            => $s_pamph_name,
              // 's_pamph_kind_school'     => $s_pamph_kind_school,
              // 's_pamph_kind_reserve'    => $s_pamph_kind_reserve,
              // 's_pamph_kind_bundle'     => $s_pamph_kind_bundle,
              // 's_pamph_class_unused'    => $s_pamph_class_unused,
              // 's_pamph_class_used'      => $s_pamph_class_used,
              // 's_pamph_cus_id'          => $s_pamph_cus_id,
              // 's_pamph_cus_name'        => $s_pamph_cus_name,
              // 's_pamph_send_none'       => $s_pamph_send_none,
              // 's_pamph_send_yes'        => $s_pamph_send_yes,
              // 's_pamph_bunya_id'        => $s_pamph_bunya_id,
              // 's_pamph_bunya_name'      => $s_pamph_bunya_name,
              // 's_pamph_pref'            => $s_pamph_pref,
              // 's_pamph_area'            => $s_pamph_area,
              // 's_pamph_sex_unspecified' => $s_pamph_sex_unspecified,
              // 's_pamph_sex_men'         => $s_pamph_sex_men,
              // 's_pamph_sex_women'       => $s_pamph_sex_women
            )) }}'">
            <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary" onclick="location.href='{{ route('backend.students.search') }}'">
          </div>
        </div>
      </div>
    </section>
    <!-- End content student list -->
@endsection