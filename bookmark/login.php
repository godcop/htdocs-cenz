<?php

/**
 * @author switch
 * @copyright 2015
 * ����ϵͳ��¼����ҳ��
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');   //Ӧ�ó���İ����ļ�����
    
    do_html_header(''); //HTML����
    
    display_site_info();//HTMLվ����Ϣ
    display_login_form();//HTML��¼��Ϣ
    
    do_html_footer();   //HTMLҳ��
?>