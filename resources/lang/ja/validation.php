<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Modal Enterprise
    |--------------------------------------------------------------------------
    */
    "error_ent_name_required"							=> "Please enter enterprise nam.",

    /*
    |--------------------------------------------------------------------------
    | Validation Customer
    |--------------------------------------------------------------------------
    */
    'error_cus_code_required'							=> 'Please enter customer code.',
    'error_cus_code_unique'								=> 'This customer code existed,try again.',
    'error_cus_name_required'							=> 'Please enter customer name.',
    'error_cus_name_kana_regex'							=> 'The customer name must be kana characters.',
    'error_cus_name_kana_required'						=> 'Please enter customer name kana.',
    'error_cus_title_required'							=> 'Please enter customer title.',
    'error_cus_old_name_required'						=> 'Please enter customer old name.',
    'error_cus_pay_required'							=> 'Please choose customer pay.',
    'error_cus_pay_must_num'							=> 'Customer pay must be numeric.',
    'error_cus_kind_required'							=> 'Please choose customer kind.',
    'error_cus_owner_required'							=> 'Please choose customer owner.',
    'error_cus_sex_required'							=> 'Please choose customer sex.',
    'error_cus_login_required'							=> 'Please enter customer login.',
    'error_cus_passwd_required'							=> 'Please enter customer password.',
    'error_cus_staff1_belong_required'					=> 'Please enter customer staff1 belong.',
    'error_cus_staff1_name_required'					=> 'Please enter customer staff1 name.',
    'error_cus_staff1_name_kana_required'				=> 'Please enter customer staff1 name kana.',
    'error_cus_staff1_name_kana_must_kana'				=> 'Customer staff1 name must be kana characters.',
    'error_cus_staff1_phone_required'					=> 'Please enter customer staff1 phone number.',
    'error_cus_staff1_fax_required'						=> 'Please enter customer staff1 fax number.',
    'error_cus_staff1_email_required'					=> 'Please enter customer staff1 email.',
    'error_cus_staff1_email_format'						=> 'Please enter customer staff1 email correct format.',
    'error_cus_staff2_belong_required'					=> 'Please enter customer staff2 belong.',
    'error_cus_staff2_name_required'					=> 'Please enter customer staff2 name.',
    'error_cus_staff2_name_kana_required'				=> 'Please enter customer staff2 name kana.',
    'error_cus_staff2_name_kana_must_kana'				=> 'Customer staff2 name must be kana characters.',
    'error_cus_staff2_phone_required'					=> 'Please enter customer staff2 phone number.',
    'error_cus_staff2_fax_required'						=> 'Please enter customer staff2 fax number.',
    'error_cus_staff2_email_required'					=> 'Please enter customer staff2 email.',
    'error_cus_staff2_email_format'						=> 'Please enter customer staff2 email correct format.',
    'error_cus_staff3_belong_required'					=> 'Please enter customer staff3 belong.',
    'error_cus_staff3_name_required'					=> 'Please enter customer staff3 name.',
    'error_cus_staff3_name_kana_required'				=> 'Please enter customer staff3 name kana.',
    'error_cus_staff3_name_kana_must_kana'				=> 'Customer staff3 name must be kana.',
    'error_cus_staff3_phone_required'					=> 'Please enter customer staff3 phone number.',
    'error_cus_staff3_fax_required'						=> 'Please enter customer staff3 fax number.',
    'error_cus_staff3_email_required'					=> 'Please enter customer staff3 email.',
    'error_cus_staff3_email_format'						=> 'Please enter customer staff3 email correct format.',
    
    
    /*
    |--------------------------------------------------------------------------
    | Model Baitai
    |--------------------------------------------------------------------------
    */
    'error_baitai_code_required'						=> '※必須媒体コード',
    'error_baitai_name_required'						=> '※必須媒体名',
    'error_baitai_kind_required'						=> '※必須性別',
    'error_baitai_year_required'						=> '※必須発行年',
    'error_baitai_code_numeric'							=> '※Format is number 発行年',


    /*
    |--------------------------------------------------------------------------
    | Model Bunya
    |--------------------------------------------------------------------------
    */
    'error_bunya_code_required'							=> '※必須分野コード',
    'error_bunya_code_unique'							=> '※分野コード exists',
    'error_bunya_name_required'							=> '※必須分野名',
    'error_bunya_kind_required'							=> '※必須種類',
    'error_bunya_class_required'						=> '※必須区分',


    /*
    |--------------------------------------------------------------------------
    | Model Campaign
    |--------------------------------------------------------------------------
    */
    'error_campaign_name_required'						=> '※必須キャンペーン名',
    'error_baitai_id_required'							=> '※必須プレゼント名',
    'error_presentlist_id_required'						=> '※必須媒体名',


    /*
    |--------------------------------------------------------------------------
    | Model Group Pamphlet
    |--------------------------------------------------------------------------
    */
    'error_gpamph_number_required'						=> '※必須一括資料請求番号',
    'error_pamph_id_required'							=> '※必須資料請求番号',


    /*
    |--------------------------------------------------------------------------
    | Model Pamphlet
    |--------------------------------------------------------------------------
    */
    'error_pamph_number_required'						=> '※必須資料請求番号',
    'error_pamph_name_required'							=> '※必須資料名',
    'error_pamph_kind_required'							=> '※必須種別',
    'error_pamph_class_required'						=> '※必須使用区分',
    'error_pamph_cus_id_required'						=> '※必須学校名',
    'error_pamph_send_required'							=> '※必須発送の有無',
    'error_pamph_bunya_id_required'						=> '※必須分野',
    'error_pamph_area_required'							=> '※必須都道府県 or エリア',
    'error_pamph_pref_required'							=> '※必須都道府県 or エリア',
    'error_pamph_sex_required'							=> '※必須対象',


    /*
    |--------------------------------------------------------------------------
    | Model Present
    |--------------------------------------------------------------------------
    */
    'error_present_code_required'						=> '※必須プレゼントコード',
    'error_present_name_required'						=> '※必須プレゼント名',


    /*
    |--------------------------------------------------------------------------
    | Model User
    |--------------------------------------------------------------------------
    */
    'error_u_name_required'								=> 'Please enter full name',
    'error_u_login_required'							=> 'Please enter login ID',
    'error_u_passwd_required'							=> 'Please enter password',
    'error_u_passwd_min'								=> 'The password must be least 6 characters.',
    'error_u_belong_required'							=> 'Please enter belong',
    'error_u_power_required'							=> 'Please choose power',
    'error_u_login_unique'								=> 'This login ID existed, try again!',
    'error_currpasswd_required'							=> 'Please enter your current password.',
    'error_newpasswd_required'							=> 'Please enter new password.',
    'error_newpasswd_alpha_num'							=> 'Please enter new password must be alphanumeric characters.',
    'error_newpasswd_min'								=> 'The new password must be least 6 characters.',
    'error_confnewpasswd_same'							=> 'New password and confirm new password must be same.',

];