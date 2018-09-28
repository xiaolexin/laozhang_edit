<?php
namespace app\index\controller;

class Jiyan extends Init
{

    private $id;
    private $key;
    private $GtSdk;

    public function _initialize()
    {
		parent::_initialize();
        $this->id  = "89e2bdb6c65588b27cebf08aa9274323";
        $this->key = "22e8cc7e263f3deb5caa85bad8e92477";
        $this->GtSdk = new \think\Geetestlib($this->id, $this->key);

    }

    public function index()
    {
        $this->display();
    }

    public function str()
    {
        N('read',1);
        echo N('read');
    }

    /**
     * 使用Get的方式返回：challenge和capthca_id 此方式以实现前后端完全分离的开发模式 专门实现failback
     * @author Tanxu
     */
    //error_reporting(0);
    public function StartCaptchaServlet()
    {
        session_start();
        $user_id = "test";
        $status = $this->GtSdk->pre_process($user_id);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = $user_id;
        echo $this->GtSdk->get_response_str();
    }

    /**
     * 输出二次验证结果,本文件示例只是简单的输出 Yes or No
     */
    // error_reporting(0);
    public function VerifyLoginServlet()
    {
        $user_id = $_SESSION['user_id'];
        if ($_SESSION['gtserver'] == 1) {
            $result = $this->GtSdk->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $user_id);
            if ($result) {
                echo 'Yes!';
            } else{
                echo 'No';
            }
        }else{
            if ($this->GtSdk->fail_validate($_POST['geetest_challenge'],$_POST['geetest_validate'],$_POST['geetest_seccode'])) {
                echo "yes";
            }else{
                echo "no";
            }
        }
    }

}