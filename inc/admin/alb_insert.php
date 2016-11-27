<?php 

require_once (DIR_PLUGIN).('/inc/admin/generator.php');
require_once (DIR_PLUGIN).('/inc/admin/read_txt.php');

function alb_insert_user($post)
{
	if (check_admin_referer("insert_user_action")) {
		$userdata = array("user_pass" => "0", "user_login" => "0", 'user_nickname' => "0", "user_email" => "0"
					,'display_name'=>"0",'nickname'=>"0", 'first_name'=> "0", 'last_name'=> "0", 'description'=> "0", 'role'=>"0");
		$role = $post["role_user"];
		for ($i = 0; $i < $post["number_user"]; $i++) { 
			$userdata["user_pass"] = generator(1, array('length' => 8));
			$userdata["user_login"] = generator(0);
			$userdata["user_nickname"] = generator(2);
			$userdata["user_email"] = generator(3, array('name' => $userdata["user_nickname"]));
			$userdata["display_name"] =$userdata["user_nickname"];
			$userdata["nickname"] = $userdata["user_nickname"];
			$userdata["first_name"] = $userdata["user_nickname"];
			$userdata["last_name"] = generator(0);
			$userdata["description"] = generator(0, array('word' => 8));
			$userdata["role"] = $post['role_user'];
			wp_insert_user($userdata);
		}		
	}
}

function alb_insert_article($post)
{

	if (check_admin_referer("insert_article_action")) {
		$postarr = array('post_author'=>"0",'post_content'=>'0', 'post_title'=>"0",'post_status'=>"0", 'comment_status'=>"0", 'post_name'=>"0");
		global $wpdb;
    	$author = $wpdb->get_row("SELECT ID FROM $wpdb->users WHERE display_name='".$post['author_article']."'");
		$comment = $post["comments_article"];
		for ($i = 0; $i < $post["number_article"]; $i++) { 
			$postarr["post_author"] = $author->ID;
			$postarr["post_content"] = generator(0, array('word' => 100));
			$postarr["post_title"] = generator(0, array('word' => 7));
			$postarr["post_status"] = 'publish';
			$postarr["comment_status"] = $comment;
			$postarr["post_name"] = generator(0);
			wp_insert_post($postarr);
		}
	}
}