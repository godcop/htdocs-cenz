<?php

/**
 * @author switch
 * @copyright 2015
 * �������ݿ�ĺ���
 */
    function db_connect()   //�������ݿ⺯��
    {
        $result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');
        if (!$result) 
        {
            throw new Exception('Could not connect to database server');
        } 
        else 
        {
            return $result;
        }

    }


?>