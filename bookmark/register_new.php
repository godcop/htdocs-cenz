<?php

/**
 * @author switch
 * @copyright 2015
 * ������ע����Ϣ�Ľű�
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    
    //��������
    $email = $_POST['email'];
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $passwd2 = $_POST['passwd2'];

    //�����Ự
    session_start();
    
    try
    {
        //�����Ƿ���д��
        if(!filled_out($_POST))
        {
            throw new exception('You have not filled the form out correctly - please go back and try again.');
        }
        
        //����ʼ���ַ�Ƿ���Ч
        if(!valid_email($email))
        {
            throw new exception('That is not a vald email address. Please go back try again.');
        }
        
        //����������������Ƿ���ͬ
        if($passwd != $passwd2)
        {
            throw new exception('The passwords you entered do not match - please go back try again.');
        }
        
        //������볤���Ƿ�ϸ�
        if((strlen($passwd) < 6) || (strlen($passwd) > 16))
        {
            throw new exception('Your password must be between 6 and 16 characters Please go back and try again.');
        }
        
        //����ע��
        register($username,$email,$passwd);
        
        //ע��Ự����
        $_SESSION['valid_user'] = $username;
        
        //�ṩ��Աҳ������
        do_html_header('Registration successful');  //HTML����
        echo 'Your registration was successful.Go to the members page to start setting up your bookmarks!'; //���URL
        do_html_URL('member.php','Go to members page'); //HTMLҳ��
        do_html_footer();   //HTMLҳ��
    }
    catch(exception $e)
    {
        do_html_header('Problem:');
        echo $e->getMessage();
        do_html_footer();
        exit;
    }
?>