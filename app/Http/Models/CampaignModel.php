<?php namespace App\Http\Models;

use DB;

class CampaignModel
{
	protected $table = 't_campaign';

    public function Rules()
    {
    	return array(
    		
            'campaign_name'        => 'required',
            'baitai_id'            => 'required',
            'presentlist_id'       => 'required',
		);
    }

    public function Messages()
    {
    	return array(
            'campaign_name.required'        => '※必須キャンペーン名',
            'baitai_id.required'            => '※必須プレゼント名',
            'presentlist_id.required'       => '※必須媒体名',
		);
    }

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('campaign_id', 'desc')->paginate(PAGINATION);
        return $results;
    }

    public function get_all_join()
    {
        $results = DB::table($this->table)
                        ->leftJoin('m_baitai', 't_campaign.baitai_id', '=', 'm_baitai.baitai_id')
                        ->leftJoin('m_presentlist', 't_campaign.presentlist_id', '=', 'm_presentlist.presentlist_id')
                        ->select('t_campaign.*', 'baitai_name', 'present_name')
                        ->where('t_campaign.last_kind', '<>', DELETE)
                        ->orderBy('t_campaign.campaign_id', 'desc')
                        ->paginate(PAGINATION);
        return $results;
    }

    public function insert($data)
    {
        $results = DB::table($this->table)->insert($data);
        return $results;
    }

    public function insert_get_id($data)
    {
        $results = DB::table($this->table)->insertGetId($data);
        return $results;
    }

    public function get_by_id($id)
    {
        $results = DB::table($this->table)->where('campaign_id', $id)->first();
        return $results;
    }

    public function update($id, $data)
    {
    	$results = DB::table($this->table)->where('campaign_id', $id)->update($data);
        return $results;
    }
}