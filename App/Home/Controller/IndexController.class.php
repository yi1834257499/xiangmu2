<?php
namespace Home\Controller;
use session;
use Think\Controller;
class IndexController extends Controller {

    public function del(){
        $this->display("setting");
    }

    public function register(){
        $this->display();
    }

    /*登录*/
    public function login(){
        if(IS_POST){//这个是登录提交操作
            $loginC = A("Event");
            $res = $loginC->yanLogin();
            if($res == ""){
                cookie("user",$_POST["userName"],3600);
                $model = M("userinfo");
                if($ree = $model->field("realname,phone")->where("`username` = '%s'",$_POST["userName"])->select()){
                    session("");
                }
                $this->redirect("index");
            }else{
                $this->assign("error",$res);
                $this->display();
            }
        }else{//这个是直接访问login模板
            if(isset($_COOKIE["user"])){
                $this->redirect("index");
            }else{
                $this->display();
            }
        }
    }

    /**
     * 完善个人信息
     */
    public function userinfo(){
        $res = A("Event")->yanInfo(I("post.old_password"),I("post.gpassword"),I("post.new_password"));
        if($res == ""){
            $model = M("user");
            if(I("post.gpassword") != ""){
                $update = $model->where("`username` = '%s'",I("post.gusername"))->data(array("password"=>I("post.gpassword")))->save();
            }
            $model1 = M("userinfo");
            if(!$model1->where("`username` = '%s'",I("post.gusername"))->select()){
                $update1 = $model1->add(array("realname"=>I("post.grealname"),"username"=>I("post.gusername"),"phone"=>I("post.gphone")));
            }else{
                $update1 = $model1->where("`username` = '%s'",I("post.gusername"))->save(array("realname"=>I("post.grealname"),"phone"=>I("post.gphone")));
            }
            if($update){
                cookie("user",null);
                $this->success("修改成功","login");
            }else{
                if($update1){
                    $this->success("修改成功","index");
                }else{
                    $this->display("index");
                }
            }
        }else{
            $this->error($res,"index.html");
        }
    }

    public function update_category(){
        $this->display();
    }

    public function update_flink(){
        $this->display();
    }

    public function update_article(){
        $this->display();
    }

    public function setting(){
        $this->display();
    }

    public function readset(){
        $this->display();
    }

    public function manage_user(){
        $this->display();
    }

    public function loginlog(){
        $this->display();
    }

    public function comment(){
        $this->display();
    }

    public function index(){
        if(isset($_COOKIE["user"])){
            $this->display("index");
        }else{
            $this->redirect("login");
        }
    }

    public function category(){
        $this->display();
    }

    public function add_notice(){
        $this->display();
    }

    public function flink(){
        $this->display();
    }

    public function article(){
        $this->display();
    }

    public function notice(){
        $this->display();
    }

    public function add_article(){
        $this->display();
    }

    public function add_flink(){
        $this->display();
    }

}