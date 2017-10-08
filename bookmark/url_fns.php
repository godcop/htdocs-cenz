<?php

/**
 * @author switch
 * @copyright 2015
 * ���Ӻ�ɾ����ǩ�ĺ���
 */
    //require_once����require�����ȫ��ͬ,Ψһ������PHP������ļ��Ƿ��Ѿ���������,������򲻻��ٴΰ�����
    require_once('db_fns.php');
    
    function get_user_urls($username)   //��ȡ�û����е�URL
    {
        $conn = db_connect();
        $result = $conn ->query("select bm_URL from bookmark where username ='". $username ."'");
        if(!$result)
            return false;
        //����URLs����
        $url_array = array();
        for($count = 1; $row = $result ->fetch_row(); ++$count)
            $url_array[$count] = $row[0];
        return $url_array;
    }

    function add_bm($new_url)   //����µ���ǩ�����ݿ�
    {
        echo "Attempting to add ". htmlspecialchars($new_url) ."<br />";
        $valid_user = $_SESSION['valid_user'];
        
        $conn = db_connect();   //�������ݿ�
        
        $result = $conn ->query("select * from bookmark where username ='$valid_user' and bm_URL ='". $new_url ."'");
        if($result && ($result ->num_rows > 0))
            throw new exception('Bookmark already exists.');
        
        //�����ǩ
        if(!$conn ->query("insert into bookmark values('". $valid_user ."','". $new_url ."')"))
            throw new exception('Bookmark could not be inserted.');
        return true;
    } 
    
    function delete_bm($user,$url)   //ɾ����ǩ
    {
        $conn = db_connect();   //�������ݿ�
        
        //ɾ����ǩ
        if(!$conn ->query("delete from bookmark where username = '". $user ."' and bm_URL = '". $url ."'"))
            throw new exception('Bookmark could not be deleted.');
        return true;
    }
    
    function recommend_urls($valid_user, $popularity = 1) //�Ƽ���ǩ
    {
        $conn = db_connect();   //�������ݿ�
        
        //�������û�����������ͬ��ǩ����֮����������������ǩ
        //����Ǹ���ǩ�������û�����ӵ��
        //��ô�ͽ������ǩ�Ƽ�����
        
        $query = "select bm_URL from bookmark 
                where username in (select distinct(b2.username) 
                from bookmark b1,bookmark b2 
                where b1.username ='". $valid_user ."' 
                and b1.username != b2.username 
                and b1.bm_URL = b2.bm_URL) 
                and bm_URL not in 
                (select bm_URL from bookmark 
                where username ='". $valid_user ."') 
                group by bm_URL having count(bm_URL) >". $popularity;
        if(!($result = $conn ->query($query)))
            throw new exception('Could not find any bookmarks to recommend.');
        
        if($result ->num_rows == 0)
            throw new exception('Could not find any bookmarks to recommend.');
        
        $urls = array();
        
        for($count = 0; $row = $result->fetch_object(); $count++)
            $urls[$count] = $row ->bm_URL;
        return $urls;
    }
?>