<?php 
	/**
	 * 判断用户是否已登录
	 */
	public function _initialize () {
		if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
			redirect(U('Login/index'));
		}
        
	}


 ?>