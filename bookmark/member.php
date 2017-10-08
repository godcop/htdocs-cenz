<?php

/**
 * @author switch
 * @copyright 2015
 * �û�����ҳ�棬�������û����еĵ�ǰ��ǩ
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    session_start();
    
    //��������
    $username = @$_POST['username'];
    $passwd = @$_POST['passwd'];
    
    if($username && $passwd)
    {
        try
        {
            login($username,$passwd);
            //������û������ݿ��У���ע��Ự����
            $_SESSION['valid_user'] = $username;
        }
        catch(exception $e)
        {
            //��¼���ɹ�
            do_html_header('Problem:');
            echo 'You could not be logged in. You must be logged in to view this page.';
            do_html_URL('login.php','Login');
            do_html_footer();
            exit;
        }
    }
    
    do_html_header('Home');
    check_valid_user();
    
    //��ȡ�û�����ǩ
    if($url_array = get_user_urls($_SESSION['valid_user']))
        display_user_urls($url_array);
    //��ȡ�û��˵�ѡ��
    display_user_menu();

    do_html_footer();
?>