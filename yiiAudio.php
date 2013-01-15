<?php

/*
* yiiAudio widget class file - play HTML5 audios on your site
* @author Zhussupov Zhassulan <zhzhussupovkz@gmail.com>
* @version: 1.0
* MADE IN KAZAKHSTAN
*/

class yiiAudio extends CWidget
{
	//run widget
	public function run()
	{
		$this->allScripts();
		$script = 'audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});';
		Yii::app()->clientScript->registerScript('yiiAudio', $script, CClientScript::POS_HEAD);
	}

	//access scripts
	protected function allScripts()
	{
		$assets=dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
		$baseUrl=Yii::app()->assetManager->publish($assets);
		if(is_dir($assets))
		{
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/audio.min.js', CClientScript::POS_HEAD);
		}
		else
		{
			throw new Exception('Error in yiiAudio widget! Cannot access assets folder');
		}
	}
}
?>