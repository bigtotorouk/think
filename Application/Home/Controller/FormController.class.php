<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller {
    public function insert(){

    	$Form = D('Form')
    	if($Form->create()){
    		$result = $Form->add();
    		if($result){
    			$this->success('操作成功');
    		}else{
    			$this->error('写入错误');
    		}
    	}else{
    		$this->error($Form->getError());
    	}
    }
}