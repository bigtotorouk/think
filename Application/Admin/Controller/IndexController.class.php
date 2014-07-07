<?php 
	namespace Admin\Controller;
	use Admin\Controller\CommonController;
	use Think\Controller;

	class IndexController extends CommonController {
		public function index(){
			echo 'admin index....';
		}

		/**
	     * 退出登录
	     */
	    public function logout() {
	        session_unset();
	        session_destroy();
	        redirect(U('Login/index'));
	    }
	}	
	
 ?>