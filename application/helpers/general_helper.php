<?php
/**
 * Encrypt decrypt ids
 */
if (!function_exists('id_crypt')) {
    function id_crypt($string, $action = 'e')
    {
        $key = 'FbcCY2yCFBwVCUE9R+6kJ4fAL4BJxxjd';
        $iv = 'e16ce913a20dadb8';
        $output = false;
        $encrypt_method = "AES-256-CBC";

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, null, $iv));
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, null, $iv);
        }

        return $output;
    }
}

/**
 * Add Default store and counter for country
 */
if (!function_exists('add_defaultuserdata')) {
    function add_defaultuserdata($user_id, $country_id, $country)
    {
        $CI = &get_instance();
        $timezone = json_decode($country->timezones);
        $store = array(
            'user_id' => $user_id,
            'name' => 'Store 1',
            'timezone' => isset($timezone[0]->zoneName) ? $timezone[0]->zoneName : "",
            'country_id' => $country_id,
            'created_on' => time(),
        );
        $store_id = $CI->general_model->insert('stores', $store);
        if ($store_id) {
            $counter = array(
                'user_id' => $user_id,
                'name' => 'Main Counter',
                'store_id' => $store_id,
                'updated_on' => time(),
                'created_on' => time(),
            );
            $store_id = $CI->general_model->insert('counters', $counter);
        }
    }
}

/**
 * Generate random number or string for db.table
 */
if (!function_exists('randomizer')) {
    function randomizer($str, $table, $field = 'activation_code', $key = null, $value = null)
    {
        $t = &get_instance();
        $i = 0;
        $params = array();
        $params[$field] = $str;
        if ($key) {
            $params["$key !="] = $value;
        }
        if ($key == 'sku') {
            $params["is_deleted"] = 0;
            $params["user_id"] = $t->session->userdata('id');
        }
        $n_slug = $str;
        while ($t->db->where($params)->get($table)->num_rows()) {
            $n_slug = $str . ++$i;
            $params[$field] = $n_slug;
        }
        return $n_slug;
    }
}

/**
 * Clean String URL friendly
 */
if (!function_exists('clean')) {
    function clean($string)
    {
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}

/**
 * Generate random number 8 digit
 */
if (!function_exists('unique_code')) {
    function unique_code($l = 8)
    {
        return substr(md5(uniqid(mt_rand(), true)), 0, $l);
    }
}
/**
 * Generate DB Code
 */
if (!function_exists('generate_code')) {
    function generate_code($table, $id, $digits = 3)
    {
        $t = &get_instance();
        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1) . $id;
        $t->db->where('id', $id);
        return $t->db->update($table, array('code' => $code));
    }
}