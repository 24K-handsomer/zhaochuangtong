<?php  
/** 
 * Created by PhpStorm. 
 * User: zhangpeng 
 * Date: 2016/1/29 
 * Time: 12:37 
 */  
   
namespace Admin\Controller;  
   
use Org\Util\Rbac;  
use Think\Controller;
use Think\Verify;  
   
class LoginController extends Controller  
{  
    /** 
     * 登录首页视图 
     */  
    public function index()  
    {  
        $this->display();  
    }  
   
    /** 
     * 登录表单处理 
     */  
    public function loginHandle()  
    {
        $code=$_POST["yzm"];
        $verify=new \Think\Verify();
        $z=$verify->check($code,2); //检测验证码
        if ($z && IS_POST) {  
            $user = D('user');  
            $where = array(  
                'u_name' => I('post.name'),  
                'u_pwd' => I('post.pwd')  
            );  
            $result = $user->where($where)->find();  
            if (!$result) {  
                $this->error("登陆失败");  
            }
            else{  
                 
   
                /*if($result['name']==C('RBAC_SUPERADMIN')){  
                    session(C('ADMIN_AUTH_KEY'),true);  
                } */ 

                //用户id
                $u_name = I('post.name');
                $u_id = $result['u_id'];
                //根据id获得用户信息
                $u_info = D('User')->find($u_id);

                //角色id
                $role_id = $u_info['u_role_id'];
                //获得角色信息
                $role_info = D('Role')->find($role_id);

                $auth_ac=$role_info['role_auth_ac'];

                //权限的ids信息
                $auth_ids = $role_info['role_auth_ids'];
                //获得全部权限数据
                //顶级权限、次顶级权限
                if($u_name === 'admin%'){//admin管理员
                    $auth_infoA = D('Auth')->where("auth_level=0 ")->select();
                    $auth_infoB = D('Auth')->where("auth_level=1 ")->select();
                    $auth_infoC = D('Auth')->where("auth_level=3")->select();        
                }else{//普通用户
                    $auth_infoA = D('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
                    $auth_infoB = D('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
                    $auth_infoC = D('Auth')->where("auth_level=3 and auth_id in ($auth_ids)")->select(); 
                }

                //将权限写入session  
                //Rbac::saveAccessList(); 
                session("u_name",$u_name);
                session("u_id",$u_id);
                session("role_id",$role_id);
                session("auth_ac",$auth_ac);
                session("auth_ids",$auth_ids);
                session("auth_infoA",$auth_infoA);
                session("auth_infoB",$auth_infoB);
                session("auth_infoC",$auth_infoC);
   
                 
                $this->success('欢迎登陆',U('Admin/Showproject/index'));  
            }  
        }
        else{
            $this->error("输入有误！",U("Login/index"));
        } 
    }  


    //生成验证码
    public function yzm()
    {
        $config=array(
        'fontSize'    =>    25,    // 验证码字体大小
        'length'      =>    4,     // 验证码位数
        );
         
        $Verify=new \Think\Verify($config);  //引用验证码类Verify
        //$Verify=D("Verify($config)");
        $Verify->entry(2);//生成验证码标示为2
    }
   
    /** 
     * 登出操作 
     */  
    public function logout(){  
        if(session("u_name")){  
            session("u_id",null);  
            session("u_name",null);
            session("role_id",null);
            session("auth_ids",null);
            session("auth_infoA",null);
            session("auth_infoB",null);  
            session(null);  
            $this->success("正在退出","index"); 
        }
        else{
            $this->redirect("Login/index");
        }   
    }

     
}  