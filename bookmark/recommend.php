<?php

/**
 * @author switch
 * @copyright 2015
 * �����û���ǰ�Ĳ������Ƽ��û����ܸ���Ȥ����ǩ
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    session_start();
    do_html_header('Recommending URLs');
    try
    {
        check_valid_user();
        $urls = recommend_urls($_SESSION['valid_user']);
        display_recommended_urls($urls);
    }
    catch(exception $e)
    {
        echo $e ->getMessage();
    }
    display_user_menu();
    do_html_footer();
?>