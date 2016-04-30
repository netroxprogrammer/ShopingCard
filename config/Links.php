<?php
class SetLinks{
	public $homepage;
	public $addProductPage;
	public $search;
	public $Edit;
	public $usersInformation;
	function addLinks($home,$addProduct,$searchPage,$EditPage,$usersInformationPage){
		$this->homepage=$home;
		$this->addProductPage=$addProduct;
		$this->search=$searchPage;
		$this->Edit=$EditPage;
		$this->usersInformation=$usersInformationPage;
	}
}
?>