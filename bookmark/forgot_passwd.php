<?php

/**
 * @author switch
 * @copyright 2015
 * ����������������Ľű�
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    do_html_header("Resetting password");
    
    //��������
    $username = $_POST['username'];
    
    try
    {
        $passwd = reset_password($username);
        notify_password($username,$passwd);
        echo 'Your new password has been emailed to you.<br />';
    }
    catch(exception $e)
    {
        echo 'Your password could not be reset - please try again later.';
    }
    do_html_URL('login.php','Login');
    do_html_footer();
?>