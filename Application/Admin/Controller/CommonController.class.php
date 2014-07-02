<?php 

	namespace Home\Controller;
	use Think\Controller;
	class IndexController extends Controller {
	    /**
	 	 * 判断用户是否已登录
	 	*/
		public function _initialize () {
			if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
				redirect(U('Account/login'));
			}
        
		}
	}

 ?>