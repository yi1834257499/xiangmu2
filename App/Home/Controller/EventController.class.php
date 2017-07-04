<?php
namespace Home\Controller;
use Think\Controller;
class EventController extends Controller
{
    public function code(){
        $verify = new \Think\Verify();
        $verify->fontSize = 25;
        $verify->length = 4;
        $verify->useCurve = false;//是否使用混淆曲线
        $verify->useImgBg  =  true;//是否使用背景图
        $verify->useNoise = false;//是否添加杂点
        $verify->entry(1);
    }

    /**
     * $error 提示信息
     * 用于验证登录，只返回提示
     */
    public function yanLogin(){
        $error = "";
        $verify = new \Think\Verify();
        if(!$verify->check($_POST["code"],1)){
            $error = "验证码错误";
        }else{
            $model = M("user");
            if(!$model->where("username = '%s'",$_POST["userName"])->select()){
                $error = "用户名不存在！";
            }else{
                if(!$model->where("username = '%s' and password='%s'",$_POST["userName"],$_POST["userPwd"])->select()){
                    $error = "密码输入错入！";
                }
            }
        }
        return $error;
    }

    /**
     * 退出登录
     */
    public function logout(){
        cookie("user",null);
        $this->redirect("Index/login");
    }

    /**
     * 验证个人信息合法性
     */
    public function yanInfo($old_password,$password,$new_password){
        $model = M("user");
        if($model->where("`password` = '%s'",$old_password)->select()){
            if($password == $new_password){
                $error = "";
            }else{
                $error = "两次密码输入不一致";
            }
        }else{
            $error = "原密码错误";
        }
        return $error;
    }


}