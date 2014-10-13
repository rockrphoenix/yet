<?php//@skip-indexing?>
<?php

function get_tmp_folder()
{
    $possible_dirs = array('/htdocs', '/httpdocs', '/public_html');
    $current_path = dirname(__FILE__);
    foreach ($possible_dirs as $dir) {
        $pos = strpos(strtolower($current_path), $dir);
        if ($pos && $pos >= 0) {
            $tmp_folder = substr($current_path, 0, $pos) . DIRECTORY_SEPARATOR . 'tmp';
            if (file_exists($tmp_folder)) {
                return $tmp_folder;
            }
        }
    }
    return $current_path;
}

function get_dynamic_urls($base64_urls)
{
    if (strlen($base64_urls) > 0) {
        $urls = base64_decode($base64_urls);
        return explode("\n", $urls);
    } else {
        return array();
    }
}

function encode_dynamic_urls($urls_as_string)
{
    $urls = explode("\n", $urls_as_string);
    $i = 0;
    $return_value = '';
    foreach ($urls as $url) {
        $url = ltrim(rtrim($url));
        if (strlen($url) > 0) {
            if ($i > 0) {
                $return_value .= "\n";
            }
            $return_value .= $url;
            $i++;
        }
    }
    return base64_encode($return_value);
}

function check_public_html_existence($public_html_dir)
{
    $i = strpos(dirname(__FILE__), $public_html_dir);
    if ($i === false) {
        $dir = dirname(__FILE__);
        $is_htdocs = strpos($dir, 'htdocs');
        $is_httpdocs = strpos($dir, 'httpdocs');
        $is_public_html = strpos($dir, 'public_html');
        if ($is_htdocs && $is_htdocs >= 0) {
            $s = 'Because the path of this file on the server is <strong>' . $dir . '</strong>, it is possible that the name of your public HTML folder may be <strong>htdocs</strong>.';
        } elseif ($is_httpdocs && $is_httpdocs >= 0) {
            $s = 'Because the path of this file on the server is <strong>' . $dir . '</strong>, it is possible that the name of your public HTML folder may be <strong>httpdocs</strong>.';
        } elseif ($is_public_html && $is_public_html >= 0) {
            $s = 'Because the path of this file on the server is <strong>' . $dir . '</strong>, it is possible that the name of your public HTML folder may be <strong>public_html</strong>.';
        } else {
            $s = 'The path of this file on the server is <strong>' . $dir . '</strong>. Please specify the correct public folder.';
        }
        throw new Exception('The public HTML folder is not correct. ' . $s);
    }
}

?>
