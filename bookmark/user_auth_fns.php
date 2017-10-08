<?php

/**
 * @author switch
 * @copyright 2015
 * �û������֤�ĺ���
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('db_fns.php');
    
    function register($username,$email,$passwd) //ע�ắ��
    {
        $conn = db_connect();   //�������ݿ�
        
        $result = $conn ->query("select * from user where username='". $username ."'"); //�����û����Ƿ�ע��
        
        if($result ->num_rows > 0)  //��ע�ᣬ�׳��쳣
        {
            throw new exception('The username is taken - go back and choose another one.');
        }
        //δע�ᣬ�򽫸��û����뵽���ݿ���
        $result = $conn ->query("insert into user values('". $username ."',sha1('". $passwd ."'),'". $email ."')");
        
        if(!$result)    //�޷�ע�ᣬ�׳��쳣
        {
            throw new exception('Could not register you in database - please try again later.');
        }
        return true;
    }

    function login($username,$passwd)   //��¼����
    {
        $conn = db_connect();   //�������ݿ�
        
        $result = $conn ->query("select * from user where username='". $username ."' and passwd = sha1('". $passwd ."')");
        
        if(!$result)    //�޷���¼���׳��쳣
            throw new exception('Could not log you in.');
        
        if($result ->num_rows > 0)
            return true;
        else
            throw new exception('Could not log you in.');
    }
    
    function check_valid_user() //����û���¼�Ƿ���Ч
    {
        if(isset($_SESSION['valid_user']))
            echo "Logged in as ". $_SESSION['valid_user'] .".<br />";
        else
        {
            do_html_heading('Problem:');
            echo 'You are not logged in.<br />';
            do_html_URL('login.php','Login');
            do_html_footer();
            exit;
        }
    }
    
    function change_password($username,$old_password,$new_password) //ͨ�������������
    {
        login($username,$old_password);
        $conn = db_connect();
        $result = $conn ->query("update user set passwd = sha1('". $new_password ."') where username ='". $username ."'");
        if(!$result)
            throw new exception('Password could not changed.');
        else
            return true;
    }
    
    function get_random_word($min_length,$max_length)   //���ֵ��������ȡһ��������[$min_length,$max_length]�Ĵ�
    {
        $word = ''; //����һ�������
        $dictionary = 'wordlist.txt';
        $fp = @fopen($dictionary,'r');
        if(!$fp)
            return false;
        $size = filesize($dictionary);
        
        $rand_location = rand(0,$size); //�ҵ����ֵ���һ�����λ��
        fseek($fp,$rand_location);
        
        while((strlen($word) < $min_length) || (strlen($word) > $max_length) || (strstr($word,"'")))
        {
            if(feof($fp))
                fseek($fp,0);   //��������ļ�ĩβ��ָ���ļ�ͷ����
            $word = fgets($fp,80);  //������һ���ҵ��Ĵ�
            $word = fgets($fp,80);  //�ڶ���
        }
        $word = trim($word);    //ȥ����ͷ��ĩβ�ո��'\n'
        return $word;   //���ظô�
    }
    
    function reset_password($username)  //��������
    {
        //��ȡ[6,13]λ������ʣ���Ϊ������
        $new_password = get_random_word(6,13);
        
        if($new_password == false)  //�����ȡʧ�ܣ��׳��쳣
            throw new exception('Could not generate new password.');
        
        $rand_number = rand(0,999); //��ȡһ����[0,999]���������
        $new_password .= $rand_number;  //��$new_password�󸽼�$rand_number
        
        $conn = db_connect();   //�������ݿ�
        $result = $conn ->query("update user set passwd = sha1('". $new_password ."') where username = '". $username ."'");
        
        if(!$result)    //�޸ı䣬�׳��쳣
            throw new exception('Could not change password.');
        else    //���óɹ�
            return $new_password;
    }
    
    function notify_password($username,$passwd) //֪ͨ�û��������Ѿ�����
    {
        
        $conn = db_connect();   //�������ݿ�
        $result = $conn ->query("select email from user where username ='". $username ."'");
        
        if(!$result)    //��ѯ�������׳��쳣
            throw new exception('Could not find email address.');
        else if($result ->num_rows == 0)    //�û����������ݿ���
            throw new exception('Could not find email address.');
        else
        {
            $row = $result ->fetch_object();
            //��Ϊû�������ʼ��������������ֱ�����������
            echo $passwd;
            $email = $row ->email;
            $from = "From: support@phpbookmark \r\n";
            $mesg = "Your PHPBookmark passwrd has been changed to ". $passwd ."\r\n"."Please change it next time you log in.\r\n";
            if(mail($email,'PHPBookmark login information',$mesg,$from))
                return true;
            else
                throw new exception('Could not send email.');
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    

?>