$plugin['name'] = 'ax_ipcheck';
$plugin['allow_html_help'] = 1;
$plugin['version'] = '0.1';
$plugin['author'] = 'eliph';
$plugin['author_uri'] = 'https://github.com/eliph';
$plugin['description'] = 'Show parts of a page depending on the client IP address';
$plugin['order'] = '5';
$plugin['type'] = '5';

if (class_exists('\Textpattern\Tag\Registry')) {
  Txp::get('\Textpattern\Tag\Registry')
    ->register('ax_ipcheck');
}

function ax_ipcheck($atts, $thing='1') {
      extract(lAtts(array(
          'fromip' => '',
          'toip' => ''
      ),$atts));
   $ip_low = ip2long($fromip);
   $ip_high = ip2long($toip);
   $user_ip = ip2long($_SERVER['REMOTE_ADDR']);
  //check for allowed clients
  if ($user_ip>$ip_low && $user_ip<$ip_high)
    {
     $result = 1;
    }
  else
    {
     $result = 0;
    }
   return parse(EvalElse($thing,$result));
        }
