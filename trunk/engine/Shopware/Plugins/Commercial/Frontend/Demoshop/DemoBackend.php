<?php
/**
 * Enter description here...
 *
 */
class Shopware_Controllers_Backend_DemoBackend extends Enlight_Controller_Action
{
	public function init(){
		$this->View()->addTemplateDir(dirname(__FILE__)."/Views/");	
	}
	/**
	 * Enter description here...
	 *
	 */
   public function indexAction(){
     $this->View()->loadTemplate("index.tpl");
   }
   
   public function skeletonAction(){
   	$this->View()->loadTemplate("skeleton.tpl");
   }
   
   public function browserErrorAction(){
   	$this->View()->loadTemplate("browser.tpl");
   }
}