<?php

/**
 * @author switch
 * @copyright 2015
 * �����ǩ�ı�
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('bookmark_fns.php');
    session_start();
    
    //��������
    $new_url = $_POST['new_url'];
    
    do_html_header('Adding bookmarks');
    
    try
    {
        check_valid_user(); //����û���Ч��
        if(!filled_out($new_url))   //�����Ƿ���д
            throw new exception('Form not completely filled out.');
        if(strstr($new_url,'http://') === false)
            $new_url = 'http://'. $new_url;
        if(!(@fopen($new_url,'r'))) //���Ե���fopen()������URL������ܴ�����ļ�����ٶ�URL����Ч��
            throw new exception('Not a valid URL.');
        add_bm($new_url);   //��URL��ӵ����ݿ���
        echo 'Bookmark added.';
        if($url_array = get_user_urls($_SESSION['valid_user']))
            display_user_urls($url_array);
    }
    catch(exception $e)
    {
        echo $e ->getMessage();
    }
    display_user_menu();
    do_html_footer();
?>