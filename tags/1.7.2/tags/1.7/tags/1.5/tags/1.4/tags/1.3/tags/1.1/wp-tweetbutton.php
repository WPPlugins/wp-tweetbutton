<?php
/*
Plugin Name: WP-TweetButton
Version: 1.1
Description: Automatically adds the new Official Twitter Tweet Button to your Blog.Easily Cutomizable from the Dashboard(with Tweet Syntax, hash tags and much more.).
Author: CoderPlus
Author URI: http://coderplus.com
Plugin URI: http://coderplus.com/2010/08/twitter-tweet-button-plugin-for-wordpress/
wp-tweetbutton
*/

function new_tweetbutton_admin_action()
{
add_menu_page("Tweet Button", "Tweet Button", 1, basename(__FILE__), "new_tweetbutton_admin");
}

if(is_admin())
{
add_action('admin_menu', 'new_tweetbutton_admin_action');
}
function new_tweetbutton_admin()
{
if($_POST['tweetbutton_hidden'] == 'Y') {
$tweettext = $_POST['tweetbutton_text'];  
update_option('tweetbutton_text', $tweettext);  
$tweetname = $_POST['tweetbutton_name'];  
update_option('tweetbutton_name', $tweetname);
$tweetsyntax = $_POST['tweetbutton_syntax'];  
update_option('tweetbutton_syntax', $tweetsyntax);
$tweetpos = $_POST['tweetbutton_pos'];  
update_option('tweetbutton_pos', $tweetpos);
$tweetloc = $_POST['tweetbutton_loc'];  
update_option('tweetbutton_loc', $tweetloc);
$tweetstyle = $_POST['tweetbutton_style'];  
update_option('tweetbutton_style', $tweetstyle);
$tweetcss = $_POST['tweetbutton_css'];  
update_option('tweetbutton_css', $tweetcss);
$tweetlang = $_POST['tweetbutton_lang'];  
update_option('tweetbutton_lang', $tweetlang);
$tweetrel = $_POST['tweetbutton_rel'];  
update_option('tweetbutton_rel', $tweetrel);
$tweetreldesc = $_POST['tweetbutton_reldesc'];  
update_option('tweetbutton_reldesc', $tweetreldesc);
}
?>
<div class="wrap">  
<h2>Tweet Button Configuration</h2>

<form name="tweetbutton_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
<input type="hidden" name="tweetbutton_hidden" value="Y">
<table cellspacing="3" cellpadding="10">
<tr><td>Twitter Handle</td><td><input type="text" name="tweetbutton_name" value="<?php echo get_option('tweetbutton_name'); ?>" size="40"><span class="description"> Do not use @ or a link to the profile</span></td></tr>
<tr><td>Tweet Text</td><td><input type="text" name="tweetbutton_text" value="<?php echo get_option('tweetbutton_text');?>" size="40"><span class="description"> Use <code>%post_title%</code> for the post title,<code>%post_title%</code>  for blog title,<code>%post_tags%</code>  for hashed post tags,<code>%post_cats%</code>  for hashed post categories</span></td></tr>
<tr><td>Tweet Syntax</td>
<td><input type="radio" name="tweetbutton_syntax" value="via" <?php if(get_option('tweetbutton_syntax')=="via") echo "checked" ?>>Tweet Text http://t.co/abcd <b>via @twitter_handle</b><br/>
<input type="radio" name="tweetbutton_syntax" value="rt" <?php if(get_option('tweetbutton_syntax')=="rt") echo "checked" ?>><b>RT @twitter_handle</b> Tweet Text http://t.co/abcd</td></tr>
<tr><td>Button Position</td>
<td><select name="tweetbutton_pos">
  <option value="before" <?php if(get_option('tweetbutton_pos')=="before") echo "selected";?> >Before</option>
  <option value="after" <?php if(get_option('tweetbutton_pos')=="after") echo "selected";?>>After</option>
  <option value="manual"  <?php if(get_option('tweetbutton_pos')=="manual") echo "selected";?>>Manually add the Function call to the Template</option>
</select><span class="description">  If you opt to manually add the function call to the template, then add <code>&lt;?php if(function_exists('the_tweetbutton')) the_tweetbutton();?&gt;</code>where you want the tweet button to appear.</span>
</td></tr>
<tr><td>Where should the button appear? </td>
<td><select name="tweetbutton_loc">
  <option value="all" <?php if(get_option('tweetbutton_loc')=="all") echo "selected";?> >Every Where</option>
  <option value="notall"  <?php if(get_option('tweetbutton_loc')=="notall") echo "selected";?>>Only on Posts or Pages</option>
  <option value="post"  <?php if(get_option('tweetbutton_loc')=="post") echo "selected";?>>Only on Posts</option>
</select>
</td></tr>
<tr><td>Button Style </td> 
<td><select name="tweetbutton_style">
  <option value="vertical" <?php if(get_option('tweetbutton_style')=="vertical") echo "selected";?> >Vertical Counter</option>
  <option value="horizontal"  <?php if(get_option('tweetbutton_style')=="horizontal") echo "selected";?>>Horizontal Counter</option>
  <option value="none"  <?php if(get_option('tweetbutton_style')=="none") echo "selected";?>>No Counter</option>
</select>
</td></tr>
 <tr><td>Styling</td>
<td><input type="text" name="tweetbutton_css" value="<?php echo get_option('tweetbutton_css');?>" size="40"><span class="description"> Add style to the div that surrounds the button E.g. <code>float: left; margin-right: 10px;</code></span></td></tr>

<tr><td>Language </td> 
<td><select name="tweetbutton_lang">
<option value="en" <?php if(get_option('tweetbutton_lang')=="en") echo "selected";?> >English</option>
<option value="fr"  <?php if(get_option('tweetbutton_lang')=="fr") echo "selected";?>>French</option>
<option value="de"  <?php if(get_option('tweetbutton_lang')=="de") echo "selected";?>>German</option>
<option value="es"  <?php if(get_option('tweetbutton_lang')=="es") echo "selected";?>>Spanish</option>
<option value="ja"  <?php if(get_option('tweetbutton_lang')=="ja") echo "selected";?>>Japanese</option>
</select></td></tr></table>

 <p><b>Recommend a Second Twitter Account</b> : </p><span class="description">Your twitter username is recommended by default, so if you want to recommend a different account, then fill the details.If you dont want to recommend anyone else, then leave these fields blank</span></p>
<table><tr><td>Twitter Handle to be recommended </td><td> <input type="text" name="tweetbutton_rel" value="<?php echo get_option('tweetbutton_rel'); ?>" size="40"><span class="description"> Do not use @ or a link to the profile</span></td></tr>
<tr><td>A short description of the above account </td><td><input type="text" name="tweetbutton_reldesc" value="<?php echo get_option('tweetbutton_reldesc'); ?>" size="40"></td></tr></table>



<p class="submit">  
<input type="submit" name="Submit" value="Save Settings" />  
</p>  
</form> 
<h2>Share : </h2>
<p>Did you like this plugin, then share it with the world:</p>
<table><tr><td><a href='http://twitter.com/share' rel='nofollow' class='twitter-share-button' data-url='http://coderplus.com/2010/08/twitter-tweet-button-plugin-for-wordpress/' data-text='Official Twitter Tweet Button for Wordpress using the WP Tweet Button Plugin' data-count='vertical' data-via='coderplus'></a></td>
<td width="100"><a style="margin-left:10px;" name='fb_share' rel='nofollow' share_url='http://coderplus.com/2010/08/twitter-tweet-button-plugin-for-wordpress/'  type='box_count'></a>
<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script></td></tr></table>
</script>
</td>
</tr>

</div> 
<?php
}
function new_tweetbutton_filter($content)
{
if (is_feed()) return $content;
if(get_option('tweetbutton_pos')=="manual") return $content;
if(!is_single()&&!is_page()&&get_option('tweetbutton_loc')=="notall") return $content;
if(is_page()&&get_option('tweetbutton_loc')=="post") return $content;
global $post;
$tweetcode=tweetbutton_generate($post);
if(get_option('tweetbutton_pos')=="before") return $tweetcode.$content; 
else if(get_option('tweetbutton_pos')=="after")  return $content.$tweetcode;

}

add_filter('the_content', 'new_tweetbutton_filter');
add_filter('the_excerpt', 'new_tweetbutton_filter');

function tweetbutton_generate($post)
{
$style=get_option('tweetbutton_style');
$lang=get_option('tweetbutton_lang');
$css=get_option('tweetbutton_css');
$tweetrel=get_option('tweetbutton_rel');
$tweetreldesc=get_option('tweetbutton_reldesc');
$tweet_text=get_option('tweetbutton_text');
$tweet_text=str_replace("%post_title%",$post->post_title,$tweet_text);
if (strpos($tweet_text, '%post_tags%') != false) 
{
$posttags = get_the_tags();
if ($posttags) {
foreach($posttags as $tag) {
$post_tags=$post_tags."#".str_replace('-','',$tag->slug) . ' '; 
}
}
$tweet_text=str_replace("%post_tags%",$post_tags,$tweet_text);
}
if (strpos($tweet_text, '%post_cats%') != false)
{
$post_categories = wp_get_post_categories($post->ID);
{
if($post_categories)
foreach($post_categories as $c)
{
	$cat = get_category( $c );
	$post_cats=$post_cats."#".str_replace('-','',$cat->slug) . ' '; 
}
}
$tweet_text=str_replace("%post_cats%",$post_cats,$tweet_text);
}
if (strpos($tweet_text, '%blog_title%') != false) $tweet_text=str_replace("%blog_title%",get_bloginfo('name'),$tweet_text);


if(get_option('tweetbutton_syntax')=="via"){ $twitterhandle=get_option('tweetbutton_name'); $text=$tweet_text;} else $text="RT @".get_option('tweetbutton_name')." ".$tweet_text;
$link=get_permalink($post->ID);
$tweetcode= '<div class="tweet_button" style="'.$css.'"><a href="http://twitter.com/share" rel="nofollow" class="twitter-share-button" data-url="'.$link.'" data-text="'.$text.'" data-count="'.$style.'" data-via="'.$twitterhandle.'"  data-lang="'.$lang.'"';
if($tweetrel==false) $tweetcode=$tweetcode.'></a></div>';
else $tweetcode=$tweetcode.' data-related="'.$tweetrel.':'.$tweetreldesc.'"></a></div>';
return $tweetcode;
}
function the_tweetbutton()
{
if(get_option('tweetbutton_pos')=="manual"&&(get_option('tweetbutton_loc')=="all"||(is_single()||(is_page())&& get_option('tweetbutton_loc')=="notall")||(is_single()&& get_option('tweetbutton_loc')=="post")))
{
global $post;
$tweetcode=tweetbutton_generate($post);
echo $tweetcode;
}
}

function tweetbutton_script() {
    wp_enqueue_script('newtweetbutton','http://platform.twitter.com/widgets.js');            
}    
 
add_action('init', 'tweetbutton_script');
register_activation_hook(__FILE__, 'tweetbutton_activation');
function tweetbutton_activation()
{
add_option('tweetbutton_text', "%post_title% - %blog_title%");
add_option('tweetbutton_name', "tweetbutton");
add_option('tweetbutton_syntax', "via");
add_option('tweetbutton_pos', "before");
add_option('tweetbutton_loc', "all");
add_option('tweetbutton_style', "vertical");
add_option('tweetbutton_css', "float: right; margin-left: 10px;");
add_option('tweetbutton_lang', "en");
add_option('tweetbutton_rel', "coderplus");
add_option('tweetbutton_reldesc', "Wordpress Tips and more.");


}
?>
