<?php

/**
 * @author switch
 * @copyright 2015
 * ���û�ע���Ľű�
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    session_start();
    $old_user = $_SESSION['valid_user'];
    
    //ע���Ự����
    unset($_SESSION['valid_user']);
    $result_dest = session_destroy();
    
    do_html_header('Logging Out');
    
    if(!empty($old_user))
    {
        if($result_dest)    //�ǳ��ɹ�
        {
            echo 'Logged out.<br />';
            do_html_URL('login.php','Login');
        }
        else    //���ɹ�
        {
            echo 'Could not log you out.<br />';
        }
    }
    else
    {
        echo 'You were not logged in, and so have not been logged ot.<br />';
        do_html_URL('login.php','Login');
    }
    do_html_footer();
?>