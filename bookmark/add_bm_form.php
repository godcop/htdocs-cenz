<?php

/**
 * @author switch
 * @copyright 2015
 * �����ǩ�ı�
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    session_start();

    do_html_header('Add Bookmarks');

    check_valid_user();
    display_add_bm_form();

    display_user_menu();
    do_html_footer();
?>