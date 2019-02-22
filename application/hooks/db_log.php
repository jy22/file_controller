<?php

class Db_log
{

    function logUsers()
    {
        /* 클래스 개발을 하고싶을 때 */
        $CI =& get_instance();

        //TODO: 로그인 되었을때의 경우와 아닌경우 체크
        $name = 'normal';
        $filepath = APPPATH . '../logData/'.$name.'.log';
        $log_file = fopen($filepath, 'a+');

        $rows = array();

        //시간
        foreach ($CI->db->queries as $value => $query) {
            $sql = date('Y-m-d H:i:s') . "\n" . $query;

            if (preg_match('/(insert|update|delete)/i', $query)) {
                fwrite($log_file, $sql . "\n\n");

                $rows[] = array(
                    'date' => date('Ymd'),
                    'user_idx' => $CI->session->userData('num'),
                    'uri_string' => $CI->uri->uri_string(),
                    'query' => $query
                );
            }
        }

        if (count($rows)) {
            $CI->db->insert_batch('log_query', $rows);
        }
        fclose($log_file);
    }

}