<?php

/**
 * @author switch
 * @copyright 2015
 * ȷ���û�����������Ч�ĺ���
 */
    function filled_out($form_vars) //�����Ƿ���д��
    {
        //���������������ʱ����ͨ���жϻ�����ǿ������ת�������
        foreach ((array)$form_vars as $key => $value) 
        {
            if ((!isset($key)) || ($value == '')) 
            {
                return false;
            }
        }
        return true;
    }
    
    function valid_email($address)  //����ʼ���ַ�Ƿ���Ч
    {
        //������ʽƥ��
        if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/i', $address)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }

    }

?>