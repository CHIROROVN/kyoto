@extends('backend.backend')

@section('content')

<script>
/*  function delete_div(span) {
    var group_child_id = $(span).attr('div-group');
    $('#' + group_child_id).remove();
  }

  function check_id(id) {
    if ( !$('#group').find('#group-' + id).length ) {
      return id;
    } 

    return check_id(id + 1);
  }

  function after_add() {
    // customer
    $( ".group-child" ).each(function( index ) {
      var id = 'pamph_cus_id-' + $(this).attr('id');
      // alert(id);
      $( '#' + id ).autocomplete({
        minLength: 0,
        source: customers,
        focus: function( event, ui ) {
          $( "#" + id ).val( ui.item.label );
          return false;
        },
        select: function( event, ui ) {
          $( "#" + id ).val( ui.item.label );
          $( "#" + id + '-id' ).val( ui.item.value );
          // $( "#pamph_bunya_id-description" ).html( ui.item.desc );

          return false;
        }
      })
      .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
          .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
          .appendTo( ul );
      };
    });
  }*/
</script>

{!! Form::open(array('route' => ['backend.pamphlets.edit', $pamphlet->pamph_id], 'enctype'=>'multipart/form-data')) !!}
<div class="container">
  <div class="row content">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <!-- pamph_number -->
          <td class="col-title"><label for="pamph_number">資料請求番号</label></td>
          <td>
            @if ( old('pamph_number') )
            <input name="pamph_number" id="pamph_number" type="text" class="form-control form-control--small" value="{{ old('pamph_number') }}">
            @else
            <input name="pamph_number" id="pamph_number" type="text" class="form-control form-control--small" value="{{ $pamphlet->pamph_number }}">
            @endif

            @if ($errors->first('pamph_number'))<span class="error-input">{!! $errors->first('pamph_number') !!}</span>@endif
          </td>

          <!-- pamph_name -->
          <td class="col-title"><label for="pamph_name">資料名</label></td>
          <td>
            @if ( old('pamph_name') )
            <input name="pamph_name" id="pamph_name" type="text" class="form-control form-control--default" value="{{ old('pamph_name') }}">
            @else
            <input name="pamph_name" id="pamph_name" type="text" class="form-control form-control--default" value="{{ $pamphlet->pamph_name }}">
            @endif
            @if ($errors->first('pamph_name'))<span class="error-input">{!! $errors->first('pamph_name') !!}</span>@endif
          </td>

          <!-- pamph_kind -->
          <td class="col-title"><label for="pamph_kind">種別</label></td>
          <td>
            @if ( old('pamph_kind') == '0' )
            <input name="pamph_kind" id="pamph_kind" value="0" type="radio" checked> 学校　　　
            @elseif ( $pamphlet->pamph_kind == '0' )
            <input name="pamph_kind" id="pamph_kind" value="0" type="radio" checked> 学校　　　
            @else
            <input name="pamph_kind" id="pamph_kind" value="0" type="radio"> 学校　　　
            @endif

            @if ( old('pamph_kind') == '1' )
            <input name="pamph_kind" value="1" type="radio" checked> 予備　　　
            @elseif ( $pamphlet->pamph_kind == '1' )
            <input name="pamph_kind" value="1" type="radio" checked> 予備　　　
            @else
            <input name="pamph_kind" value="1" type="radio"> 予備　　　
            @endif
            
            @if ( old('pamph_kind') == '2' )
            <input name="pamph_kind" id="" value="2" type="radio" checked> 一括
            @elseif ( $pamphlet->pamph_kind == '2' )
            <input name="pamph_kind" id="" value="2" type="radio" checked> 一括
            @else
            <input name="pamph_kind" id="" value="2" type="radio"> 一括
            @endif
            
            @if ($errors->first('pamph_kind'))<span class="error-input">{!! $errors->first('pamph_kind') !!}</span>@endif
          </td>
        </tr>
        <tr>
          <!-- pamph_class -->
          <td class="col-title"><label for="pamph_class">使用区分</label></td>
          <td>
            @if ( old('pamph_class') == '1' )
            <input name="pamph_class" id="pamph_class" value="1" type="radio" checked> 使用済み　　　
            @elseif ( $pamphlet->pamph_class == '1' )
            <input name="pamph_class" id="pamph_class" value="1" type="radio" checked> 使用済み　　　
            @else
            <input name="pamph_class" id="pamph_class" value="1" type="radio"> 使用済み　　　
            @endif
            
            @if ( old('pamph_class') == '0' )
            <input name="pamph_class" value="0" type="radio" checked> 未使用
            @elseif ( $pamphlet->pamph_class == '0' )
            <input name="pamph_class" value="0" type="radio" checked> 未使用
            @else
            <input name="pamph_class" value="0" type="radio"> 未使用
            @endif

            @if ($errors->first('pamph_class'))<span class="error-input">{!! $errors->first('pamph_class') !!}</span>@endif
          </td>

          <!-- pamph_cus_id -->
          <td class="col-title"><label for="pamph_cus_id">学校名</label></td>
          <td>
            <div id="group">
              @if ( !isset($list_customers) )
              <div class="group-child" id="group-1">
                @if ( old('pamph_cus_name') )
                <input name="pamph_cus_name" id="pamph_cus_id-group-1" type="text" class="form-control form-control--default input-auto-complete" value="<?php echo old('pamph_cus_name'); ?>">
                @elseif ( isset($customers_old[$pamphlet->pamph_cus_id]) )
                <input name="pamph_cus_name" id="pamph_cus_id-group-1" type="text" class="form-control form-control--default input-auto-complete" value="<?php echo $customers_old[$pamphlet->pamph_cus_id]; ?>">
                @else
                <input name="pamph_cus_name" id="pamph_cus_id-group-1" type="text" class="form-control form-control--default input-auto-complete" value="">
                @endif

                @if ( old('pamph_cus_id') )
                <!-- <input name="pamph_cus_id[]" type="hidden" id="pamph_cus_id-group-1-id" value="{{ old('pamph_cus_id') }}"> -->
                <input name="pamph_cus_id" type="hidden" id="pamph_cus_id-group-1-id" value="{{ old('pamph_cus_id') }}">
                @else
                <!-- <input name="pamph_cus_id[]" type="hidden" id="pamph_cus_id-group-1-id" value="{{ $pamphlet->pamph_cus_id }}"> -->
                <input name="pamph_cus_id" type="hidden" id="pamph_cus_id-group-1-id" value="{{ $pamphlet->pamph_cus_id }}">
                @endif
              </div>
              @else
                @foreach ( $list_customers as $list_customer )
                <div style="margin-top: 5px;" class="group-child" id="group-{{ $list_customer->pamph_id }}">
                  <input name="pamph_cus_name" id="pamph_cus_id-group-1" type="text" class="form-control form-control--default input-auto-complete" value="{{ $list_customer->cus_name }}">
                  <input name="pamph_cus_id[]" type="hidden" id="pamph_cus_id-group-1-id" value="{{ $list_customer->cus_code }}">
                  <span id="" div-group="group-{{ $list_customer->pamph_id }}" class="btn btn-default btn-xs delete" onClick="delete_div(this)">Delete</span>
                </div>
                @endforeach
              @endif
            </div>
            <!-- <button style="margin-top: 5px;" class="btn btn-primary btn-xs" id="add">Add</button> -->
            <!-- <p id="pamph_bunya_id-description"></p> -->
            @if ($errors->first('pamph_cus_id'))<span class="error-input">{!! $errors->first('pamph_cus_id') !!}</span>@endif
            @if ($message = Session::get('error-input-cus-exits'))<span class="error-input">{!! $message !!}</span>@endif
          </td>

          <!-- pamph_send -->
          <td class="col-title"><label for="pamph_send">発送の有無</label></td>
          <td>
            @if ( old('pamph_send') == '1' )
            <input name="pamph_send" id="pamph_send" value="1" type="radio" checked> あり　　　
            @elseif ( $pamphlet->pamph_send == '1' )
            <input name="pamph_send" id="pamph_send" value="1" type="radio" checked> あり　　　
            @else
            <input name="pamph_send" id="pamph_send" value="1" type="radio"> あり　　　
            @endif

            @if ( old('pamph_send') == '0' )
            <input name="pamph_send" value="0" type="radio" checked> なし
            @elseif ( $pamphlet->pamph_send == '0' )
            <input name="pamph_send" value="0" type="radio" checked> なし
            @else
            <input name="pamph_send" value="0" type="radio"> なし
            @endif
            
            @if ($errors->first('pamph_send'))<span class="error-input">{!! $errors->first('pamph_send') !!}</span>@endif
          </td>
        </tr>
        <tr>
          <!-- pamph_bunya_id -->
          <td class="col-title"><label for="pamph_bunya_id">分野</label></td>
          <td>
            @if ( old('pamph_bunya_name') )
            <input name="pamph_bunya_name" id="pamph_bunya_id" type="text" class="form-control form-control--small" value="{{ old('pamph_bunya_name') }}">
            @elseif ( isset($bunyas_old[$pamphlet->pamph_bunya_id]) )
            <input name="pamph_bunya_name" id="pamph_bunya_id" type="text" class="form-control form-control--small" value="<?php echo $bunyas_old[$pamphlet->pamph_bunya_id]; ?>">
            @else
            <input name="pamph_bunya_name" id="pamph_bunya_id" type="text" class="form-control form-control--small" value="">
            @endif
            
            @if ( old('pamph_bunya_id') )
            <input name="pamph_bunya_id" type="hidden" id="pamph_bunya_id-id" value="{{ old('pamph_bunya_id') }}">
            @else
            <input name="pamph_bunya_id" type="hidden" id="pamph_bunya_id-id" value="{{ $pamphlet->pamph_bunya_id }}">
            @endif
            
            <!-- <p id="pamph_bunya_id-description"></p> -->
            @if ($errors->first('pamph_bunya_id'))<span class="error-input">{!! $errors->first('pamph_bunya_id') !!}</span>@endif
          </td>

          <!-- pamph_pref_area -->
          <td class="col-title"><label for="pamph_pref">都道府県・エリア</label></td>
          <td>
            <select name="pamph_pref" id="pamph_pref" class="form-control form-control--small">
              <option value="0">▼都道府県</option>
              @foreach ( $prefs as $pref )
                @if ( old('pamph_pref') == $pref->pref_id )
                <option value="{{ $pref->pref_id }}" selected>{{ $pref->pref_name }}</option>
                @else
                  @if ( $pamphlet->pamph_pref == $pref->pref_id )
                  <option value="{{ $pref->pref_id }}" selected>{{ $pref->pref_name }}</option>
                  @else
                  <option value="{{ $pref->pref_id }}">{{ $pref->pref_name }}</option>
                  @endif
                @endif
              @endforeach
            </select>
            または
            <select name="pamph_area" id="pamph_area" class="form-control form-control--small">
              <option value="0">▼エリア</option>
              @foreach ( $areas as $area )
                @if ( old('pamph_area') == $area->area_id )
                <option value="{{ $area->area_id }}" selected>{{ $area->area_name }}</option>  
                @else
                  @if ( $pamphlet->pamph_area == $area->area_id )
                  <option value="{{ $area->area_id }}" selected>{{ $area->area_name }}</option>
                  @else
                  <option value="{{ $area->area_id }}">{{ $area->area_name }}</option>
                  @endif
                @endif
              @endforeach
            </select>
            @if ($errors->first('pamph_area'))<span class="error-input">{!! $errors->first('pamph_area') !!}</span>@endif
            @if ($errors->first('pamph_pref'))<span class="error-input">{!! $errors->first('pamph_pref') !!}</span>@endif
            @if ($message = Session::get('error-input-area-pref'))<span class="error-input">{!! $message !!}</span>@endif
          </td>

          <!-- pamph_sex -->
          <td class="col-title"><label for="pamph_sex">対象</label></td>
          <td>
            @if ( old('pamph_sex') == '0' )
            <input name="pamph_sex" id="pamph_sex" value="0" type="radio" checked> 共通　　　
            @elseif ( $pamphlet->pamph_sex == '0' )
            <input name="pamph_sex" id="pamph_sex" value="0" type="radio" checked> 共通　　　
            @else
            <input name="pamph_sex" id="pamph_sex" value="0" type="radio"> 共通　　　
            @endif
            
            @if ( old('pamph_sex') == '1' )
            <input name="pamph_sex" value="1" type="radio" checked> 男　　　
            @elseif ( $pamphlet->pamph_sex == '1' )
            <input name="pamph_sex" value="1" type="radio" checked> 男　　　
            @else
            <input name="pamph_sex" value="1" type="radio"> 男　　　
            @endif
            
            @if ( old('pamph_sex') == '2' )
            <input name="pamph_sex" id="" value="2" type="radio" checked> 女
            @elseif ( $pamphlet->pamph_sex == '2' )
            <input name="pamph_sex" id="" value="2" type="radio" checked> 女
            @else
            <input name="pamph_sex" id="" value="2" type="radio"> 女
            @endif
            
            @if ($errors->first('pamph_sex'))<span class="error-input">{!! $errors->first('pamph_sex') !!}</span>@endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <!-- search -->
      <input type="hidden" name="s_pamph_number" value="{{ $s_pamph_number }}">
      <input type="hidden" name="s_pamph_name" value="{{ $s_pamph_name }}">
      <input type="hidden" name="s_pamph_kind_school" value="{{ $s_pamph_kind_school }}">
      <input type="hidden" name="s_pamph_kind_reserve" value="{{ $s_pamph_kind_reserve }}">
      <input type="hidden" name="s_pamph_kind_bundle" value="{{ $s_pamph_kind_bundle }}">
      <input type="hidden" name="s_pamph_class_unused" value="{{ $s_pamph_class_unused }}">
      <input type="hidden" name="s_pamph_class_used" value="{{ $s_pamph_class_used }}">
      <input type="hidden" name="s_pamph_cus_id" value="{{ $s_pamph_cus_id }}">
      <input type="hidden" name="s_pamph_cus_name" value="{{ $s_pamph_cus_name }}">
      <input type="hidden" name="s_pamph_send_none" value="{{ $s_pamph_send_none }}">
      <input type="hidden" name="s_pamph_send_yes" value="{{ $s_pamph_send_yes }}">
      <input type="hidden" name="s_pamph_bunya_id" value="{{ $s_pamph_bunya_id }}">
      <input type="hidden" name="s_pamph_bunya_name" value="{{ $s_pamph_bunya_name }}">
      @foreach ( $s_pamph_pref as $item )
        <input type="hidden" name="s_pamph_pref[]" value="{{ $item }}">
      @endforeach
      <input type="hidden" name="s_pamph_sex_unspecified" value="{{ $s_pamph_sex_unspecified }}">
      <input type="hidden" name="s_pamph_sex_men" value="{{ $s_pamph_sex_men }}">
      <input type="hidden" name="s_pamph_sex_women" value="{{ $s_pamph_sex_women }}">
      <input type="hidden" name="page" value="{{ $page }}">
      <!-- save -->
      <input name="" id="button4" value="登録する" type="submit" class="btn btn-sm btn-primary">
      <!-- delete -->
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-{{ $pamphlet->pamph_id }}">削除</button>
      <!-- popup -->
      <div class="modal fade bs-example-modal-sm" id="myModal-{{ $pamphlet->pamph_id }}" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">{{ TITLE_DELETE }}</h4>
            </div>
            <div class="modal-body">
              <p>{{ CONTENT_DELETE }}</p>
            </div>
            <div class="modal-footer">
              <a href="{{ route('backend.pamphlets.delete', array($pamphlet->pamph_id, 
                      's_pamph_number'          => $s_pamph_number,
                      's_pamph_name'            => $s_pamph_name,
                      's_pamph_kind_school'     => $s_pamph_kind_school,
                      's_pamph_kind_reserve'    => $s_pamph_kind_reserve,
                      's_pamph_kind_bundle'     => $s_pamph_kind_bundle,
                      's_pamph_class_unused'    => $s_pamph_class_unused,
                      's_pamph_class_used'      => $s_pamph_class_used,
                      's_pamph_cus_id'          => $s_pamph_cus_id,
                      's_pamph_cus_name'        => $s_pamph_cus_name,
                      's_pamph_send_none'       => $s_pamph_send_none,
                      's_pamph_send_yes'        => $s_pamph_send_yes,
                      's_pamph_bunya_id'        => $s_pamph_bunya_id,
                      's_pamph_bunya_name'      => $s_pamph_bunya_name,
                      's_pamph_pref'            => $s_pamph_pref,
                      's_pamph_sex_unspecified' => $s_pamph_sex_unspecified,
                      's_pamph_sex_men'         => $s_pamph_sex_men,
                      's_pamph_sex_women'       => $s_pamph_sex_women,
                      'page'                    => $page
                    )) }}" class="btn btn-xs btn-primary">削除</a>
              <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- End Modal content-->
        </div>
      </div>
      <!-- end popup -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input onclick="location.href='{{ route('backend.pamphlets.index') }}'" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>

<?php echo '<script type="text/javascript">var bunyas = ' . $bunyas . '; var customers = ' . $customers . '</script>' ?>
<script>
  $(document).ready(function(){
    // bunya
    $( "#pamph_bunya_id" ).autocomplete({
      minLength: 0,
      source: bunyas,
      focus: function( event, ui ) {
        $( "#pamph_bunya_id" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#pamph_bunya_id" ).val( ui.item.label );
        $( "#pamph_bunya_id-id" ).val( ui.item.value );
        // $( "#pamph_bunya_id-description" ).html( ui.item.desc );

        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
        .appendTo( ul );
    };

    // first customer : group 1
    $( '#pamph_cus_id-group-1' ).autocomplete({
      minLength: 0,
      source: customers,
      focus: function( event, ui ) {
        $( "#pamph_cus_id-group-1" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#pamph_cus_id-group-1" ).val( ui.item.label );
        $( "#pamph_cus_id-group-1-id" ).val( ui.item.value );
        // $( "#pamph_bunya_id-description" ).html( ui.item.desc );

        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
        .appendTo( ul );
    };
    


    // // add new customer
    // $('#add').click(function(event) {
    //   event.preventDefault();

    //   var count_group_child = $('#group').find('.group-child').length;
    //   count_group_child += 1;
    //   count_group_child = check_id(count_group_child);

    //   $('#group').append('<div style="margin-top: 5px;" class="group-child" id="group-' + count_group_child + '"><input name="pamph_cus_name" id="pamph_cus_id-group-' + count_group_child + '" type="text" class="form-control form-control--default input-auto-complete" value=""><input name="pamph_cus_id[]" type="hidden" id="pamph_cus_id-group-' + count_group_child + '-id" value=""><span style="margin-left: 5px;" id="" div-group="group-' + count_group_child + '" class="btn btn-default btn-xs delete" onClick="delete_div(this);">Delete</span></div>');

    //   after_add();
    // });
  });
</script>
@endsection