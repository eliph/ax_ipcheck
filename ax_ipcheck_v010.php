// This is a PLUGIN TEMPLATE for Textpattern CMS.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ("abc" is just an example).
// Uncomment and edit this line to override:
$plugin['name'] = 'ax_ipcheck';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
$plugin['allow_html_help'] = 0;

$plugin['version'] = '0.1';
$plugin['author'] = 'eliph';
$plugin['author_uri'] = 'https://github.com/eliph';
$plugin['description'] = 'Check for IP address for restricted access';

// Plugin load order:
// The default value of 5 would fit most plugins, while for instance comment
// spam evaluators or URL redirectors would probably want to run earlier
// (1...4) to prepare the environment for everything else that follows.
// Values 6...9 should be considered for plugins which would work late.
// This order is user-overrideable.
$plugin['order'] = '5';

// Plugin 'type' defines where the plugin is loaded
// 0 = public              : only on the public side of the website (default)
// 1 = public+admin        : on both the public and admin side
// 2 = library             : only when include_plugin() or require_plugin() is called
// 3 = admin               : only on the admin side (no AJAX)
// 4 = admin+ajax          : only on the admin side (AJAX supported)
// 5 = public+admin+ajax   : on both the public and admin side (AJAX supported)
$plugin['type'] = '5';

if (class_exists('\Textpattern\Tag\Registry')) {
  Txp::get('\Textpattern\Tag\Registry')
    ->register('ax_ipcheck');
}

function ax_ipcheck($atts, $thing='1') {
      extract(lAtts(array(
          'fromip' => '129.206.0.0',
          'toip' => '129.206.0.0'
      ),$atts));
   $ip_low = ip2long($fromip);
   $ip_high = ip2long($toip);
   $user_ip = ip2long($_SERVER['REMOTE_ADDR']);
  //check for allowed clients
  if ( ($user_ip>$ip_low) && ($user_ip<$ip_high) )
    {
     $result = 1;
    }
  else
    {
     $result = 0;
    }
   //return 1 if_ip is true
return parse(EvalElse($thing,$result));
        }

// This is a PLUGIN TEMPLATE for Textpattern CMS.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ("abc" is just an example).
// Uncomment and edit this line to override:
$plugin['name'] = 'ax_ipcheck';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
$plugin['allow_html_help'] = 0;

$plugin['version'] = '0.1';
$plugin['author'] = 'eliph';
$plugin['author_uri'] = 'https://github.com/eliph';
$plugin['description'] = 'Check for IP address for restricted access';

// Plugin load order:
// The default value of 5 would fit most plugins, while for instance comment
// spam evaluators or URL redirectors would probably want to run earlier
// (1...4) to prepare the environment for everything else that follows.
// Values 6...9 should be considered for plugins which would work late.
// This order is user-overrideable.
$plugin['order'] = '5';

// Plugin 'type' defines where the plugin is loaded
// 0 = public              : only on the public side of the website (default)
// 1 = public+admin        : on both the public and admin side
// 2 = library             : only when include_plugin() or require_plugin() is called
// 3 = admin               : only on the admin side (no AJAX)
// 4 = admin+ajax          : only on the admin side (AJAX supported)
// 5 = public+admin+ajax   : on both the public and admin side (AJAX supported)
$plugin['type'] = '5';

if (class_exists('\Textpattern\Tag\Registry')) {
  Txp::get('\Textpattern\Tag\Registry')
    ->register('ax_ipcheck');
}

function ax_ipcheck($atts, $thing='1') {
      extract(lAtts(array(
          'fromip' => '129.206.0.0',
          'toip' => '129.206.0.0'
      ),$atts));
   $ip_low = ip2long($fromip);
   $ip_high = ip2long($toip);
   $user_ip = ip2long($_SERVER['REMOTE_ADDR']);
  //check for allowed clients
  if ( ($user_ip>$ip_low) && ($user_ip<$ip_high) )
    {
     $result = 1;
    }
  else
    {
     $result = 0;
    }
   //return 1 if_ip is true
return parse(EvalElse($thing,$result));
        }
<!--
# --- BEGIN PLUGIN HELP ---

h1. ax_ipcheck

p. This lets you show parts of a page only to visitors with an allowed IP range of the client. Tested with "Textpattern CMS":https://textpattern.com/ v4.7.2 and v4.8.4.

p. "DOWNLOAD":https://raw.github.com/eliph/ax_ipcheck/master/ax_ipcheck.txt

h2. Tags

bc. <txp:ax_ipcheck fromip="192.168.0.0" toip="192.168.255.255">

h2. Example

bc. <txp:ax_ipcheck fromip="192.168.0.0" toip="192.168.255.255">
    IP address is ok
<txp:else />
    IP address is not ok
</txp:ax_ipcheck>

h2. Notes

If more than one IP range is required, the PHP code must be changed.

h2. Version history

0.1 - December 2020
first release.

# --- END PLUGIN HELP ---
-->
