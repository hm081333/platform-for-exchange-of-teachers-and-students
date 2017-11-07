<?php

class Api_Music extends PhalApi_Api
{
	public function getRules()
	{
		return array(
			'index' => array(),
			'search' => array(
				'music_input' => array('name' => 'music_input', 'type' => 'string', 'desc' => '输入参数'),
				'music_filter' => array('name' => 'music_filter', 'type' => 'string', 'desc' => '搜索类型'),
				'music_type' => array('name' => 'music_type', 'type' => 'string', 'desc' => '音乐门户网站'),
			),
		);
	}

	public function index()
	{
		DI()->view->show('music', array('back' => 0));
	}

	public function search()
	{
		if (empty($this->music_input) || empty($this->music_filter) || empty($this->music_type)) {
			throw new PhalApi_Exception_BadRequest('传入的数据不对');
		}
		$music_type_list = DI()->config->get('app.music_type_list');
		if ($this->music_filter !== 'url' && !in_array($this->music_type, array_keys($music_type_list), true)) {
			throw new PhalApi_Exception_BadRequest('目前还不支持这个网站');
		}
		$music_valid_patterns = DI()->config->get('app.music_valid_patterns');
		if (!preg_match($music_valid_patterns[$this->music_filter], $this->music_input)) {
			throw new PhalApi_Exception_BadRequest('请检查您的输入是否正确');
		}
		var_dump($this);
		die;
		switch ($this->music_filter) {
			case 'name':
				$music_response = maicong_get_song_by_name($music_input, $music_type);
				break;
			case 'id':
				$music_response = maicong_get_song_by_id($music_input, $music_type);
				break;
			case 'url':
				$music_response = maicong_get_song_by_url($music_input);
				break;
		}
	}


}
