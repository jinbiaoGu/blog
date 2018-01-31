-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2018 at 01:28 PM
-- Server version: 5.7.18-0ubuntu0.16.10.1
-- PHP Version: 5.6.30-12~ubuntu16.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testCore`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_ad_blocks`
--

CREATE TABLE `lt_ad_blocks` (
  `id` int(10) NOT NULL,
  `block_name` varchar(125) DEFAULT NULL,
  `block_position` int(5) NOT NULL DEFAULT '1',
  `block_code` text NOT NULL,
  `block_mode` int(2) NOT NULL DEFAULT '1',
  `block_blogs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_articles`
--

CREATE TABLE `lt_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `blog_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(5) NOT NULL DEFAULT '1',
  `num_reads` int(10) DEFAULT '0',
  `properties` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `num_comments` int(10) NOT NULL DEFAULT '0',
  `num_nonspam_comments` int(10) NOT NULL DEFAULT '0',
  `num_trackbacks` int(10) NOT NULL DEFAULT '0',
  `num_nonspam_trackbacks` int(10) NOT NULL DEFAULT '0',
  `global_category_id` int(10) NOT NULL DEFAULT '0',
  `in_summary_page` tinyint(1) NOT NULL DEFAULT '1',
  `modification_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_articles`
--

INSERT INTO `lt_articles` (`id`, `date`, `user_id`, `blog_id`, `status`, `num_reads`, `properties`, `slug`, `num_comments`, `num_nonspam_comments`, `num_trackbacks`, `num_nonspam_trackbacks`, `global_category_id`, `in_summary_page`, `modification_date`) VALUES
(1, '2017-05-12 03:29:21', 1, 1, 1, 18, 'a:1:{s:16:"comments_enabled";b:0;}', 'test', 0, 0, 0, 0, 1, 1, '2017-08-30 18:22:02'),
(3, '2017-08-28 03:13:18', 1, 1, 3, 35, 'a:1:{s:16:"comments_enabled";i:1;}', 'node', 1, 1, 0, 0, 1, 1, '2018-01-31 13:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `lt_articles_categories`
--

CREATE TABLE `lt_articles_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `in_main_page` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `properties` text NOT NULL,
  `mangled_name` varchar(255) NOT NULL,
  `num_articles` int(10) NOT NULL DEFAULT '0',
  `num_published_articles` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_articles_categories`
--

INSERT INTO `lt_articles_categories` (`id`, `name`, `url`, `blog_id`, `last_modification`, `in_main_page`, `parent_id`, `description`, `properties`, `mangled_name`, `num_articles`, `num_published_articles`) VALUES
(1, 'General', 'General', 1, '2017-08-30 09:54:18', 1, 0, '', 'a:0:{}', 'general', 2, 1),
(3, 'java', '', 1, '2017-08-30 06:50:38', 1, 0, 'java', 'a:0:{}', 'java', 0, 0),
(5, 'php', '', 1, '2017-08-30 06:51:09', 1, 0, 'php', 'a:0:{}', 'php2', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_articles_comments`
--

CREATE TABLE `lt_articles_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `blog_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `topic` text NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) DEFAULT '0',
  `user_email` varchar(255) DEFAULT NULL,
  `user_url` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `parent_id` int(10) UNSIGNED DEFAULT '0',
  `client_ip` varchar(15) DEFAULT '0.0.0.0',
  `send_notification` tinyint(1) DEFAULT '0',
  `status` tinyint(2) DEFAULT '1',
  `spam_rate` float DEFAULT '0',
  `properties` text NOT NULL,
  `normalized_text` text NOT NULL,
  `normalized_topic` text NOT NULL,
  `type` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_articles_comments`
--

INSERT INTO `lt_articles_comments` (`id`, `article_id`, `blog_id`, `topic`, `text`, `date`, `user_id`, `user_email`, `user_url`, `user_name`, `parent_id`, `client_ip`, `send_notification`, `status`, `spam_rate`, `properties`, `normalized_text`, `normalized_topic`, `type`) VALUES
(2, 3, 1, '大声道', '请对方却无法', '2017-08-30 09:39:52', 0, '', '', 'jinbiao', 0, '192.168.4.14', 0, 0, 0, 'a:0:{}', ' ', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lt_articles_notifications`
--

CREATE TABLE `lt_articles_notifications` (
  `id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `article_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_articles_text`
--

CREATE TABLE `lt_articles_text` (
  `id` int(10) NOT NULL,
  `article_id` int(10) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `topic` text NOT NULL,
  `normalized_text` text NOT NULL,
  `normalized_topic` text NOT NULL,
  `mangled_topic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_articles_text`
--

INSERT INTO `lt_articles_text` (`id`, `article_id`, `text`, `topic`, `normalized_text`, `normalized_topic`, `mangled_topic`) VALUES
(1, 1, '<p>&nbsp;tes</p>', 'test', ' tes', 'test', ''),
(3, 3, '<p>?[@more@]let child_process = require(\'child_process\'),   url = \'http://\' +  youUrl;  if (process.platform == \'wind32\') {   cmd = \'start  "%ProgramFiles%\\Internet Explorer\\iexplore.exe"\'; } else if  (process.platform == \'linux\') {   cmd = \'xdg-open\'; } else if  (process.platform == \'darwin\') {   cmd = \'open\'; }  child_process.exec(`${cmd} "${url}"`);</p>', '好好虚荣系天台向下函数', ' let child_process require child_process url http youUrl if process platform wind32 cmd start ProgramFiles Internet Explorer iexplore exe else if process platform linux cmd xdg open else if process platform darwin cmd open child_process exec cmd url ', ' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `lt_article_categories_link`
--

CREATE TABLE `lt_article_categories_link` (
  `article_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_article_categories_link`
--

INSERT INTO `lt_article_categories_link` (`article_id`, `category_id`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lt_atom_passwords`
--

CREATE TABLE `lt_atom_passwords` (
  `user_id` int(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_bayesian_filter_info`
--

CREATE TABLE `lt_bayesian_filter_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED DEFAULT NULL,
  `total_spam` int(10) UNSIGNED DEFAULT NULL,
  `total_nonspam` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_bayesian_filter_info`
--

INSERT INTO `lt_bayesian_filter_info` (`id`, `blog_id`, `total_spam`, `total_nonspam`) VALUES
(1, 1, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `lt_bayesian_tokens`
--

CREATE TABLE `lt_bayesian_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED DEFAULT NULL,
  `token` char(100) DEFAULT NULL,
  `spam_occurrences` int(10) UNSIGNED DEFAULT NULL,
  `nonspam_occurrences` int(10) UNSIGNED DEFAULT NULL,
  `prob` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_bayesian_tokens`
--

INSERT INTO `lt_bayesian_tokens` (`id`, `blog_id`, `token`, `spam_occurrences`, `nonspam_occurrences`, `prob`) VALUES
(1, 1, 'Topic#test', 0, 2, 0.01),
(2, 1, 'nbsp', 0, 1, 0.01),
(3, 1, 'tes', 0, 1, 0.01),
(4, 1, 'etwseeww', 0, 1, 0.01),
(5, 1, 'UserName#jinbiao', 0, 3, 0.01),
(6, 1, 'UserEmail#test', 0, 1, 0.01),
(7, 1, 'UserUrl#http', 0, 2, 0.01),
(8, 1, 'UserUrl#sss', 0, 1, 0.01),
(9, 1, 'Topic#fwew', 0, 1, 0.01),
(10, 1, 'wefw', 0, 1, 0.01),
(11, 1, 'UserName#test', 0, 1, 0.01),
(12, 1, 'UserEmail#jinbiao', 0, 1, 0.01),
(13, 1, 'UserEmail#ftsafe', 0, 1, 0.01),
(14, 1, 'UserEmail#com', 0, 1, 0.01),
(15, 1, 'UserUrl#www', 0, 1, 0.01),
(16, 1, 'Topic#node', 0, 1, 0.01),
(17, 1, 'let', 0, 1, 0.01),
(18, 1, 'child', 0, 2, 0.01),
(19, 1, 'process', 0, 5, 0.01),
(20, 1, 'require', 0, 1, 0.01),
(21, 1, '\'child', 0, 1, 0.01),
(22, 1, 'process\'', 0, 1, 0.01),
(23, 1, 'url', 0, 2, 0.01),
(24, 1, '\'http', 0, 1, 0.01),
(25, 1, 'youUrl', 0, 1, 0.01),
(26, 1, 'platform', 0, 3, 0.01),
(27, 1, '\'wind32\'', 0, 1, 0.01),
(28, 1, 'cmd', 0, 4, 0.01),
(29, 1, '\'start', 0, 1, 0.01),
(30, 1, 'ProgramFiles', 0, 1, 0.01),
(31, 1, 'Internet', 0, 1, 0.01),
(32, 1, 'Explorer', 0, 1, 0.01),
(33, 1, 'iexplore', 0, 1, 0.01),
(34, 1, 'exe', 0, 1, 0.01),
(35, 1, 'else', 0, 2, 0.01),
(36, 1, '\'linux\'', 0, 1, 0.01),
(37, 1, '\'xdg-open\'', 0, 1, 0.01),
(38, 1, '\'darwin\'', 0, 1, 0.01),
(39, 1, '\'open\'', 0, 1, 0.01),
(40, 1, 'exec', 0, 1, 0.01),
(41, 2, 'Topic#tesweweqew', 0, 2, 0.01),
(42, 2, 'fqwedqfw', 0, 2, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `lt_blogs`
--

CREATE TABLE `lt_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog` varchar(50) NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `blog_category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `about` text,
  `settings` text NOT NULL,
  `mangled_blog` varchar(50) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `show_in_summary` int(4) NOT NULL DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_posts` int(10) NOT NULL DEFAULT '0',
  `num_comments` int(10) NOT NULL DEFAULT '0',
  `num_trackbacks` int(10) NOT NULL DEFAULT '0',
  `custom_domain` varchar(50) DEFAULT NULL,
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_blogs`
--

INSERT INTO `lt_blogs` (`id`, `blog`, `owner_id`, `blog_category_id`, `about`, `settings`, `mangled_blog`, `status`, `show_in_summary`, `create_date`, `num_posts`, `num_comments`, `num_trackbacks`, `custom_domain`, `last_update_date`) VALUES
(1, 'damai', 1, 3, '', 'O:12:"BlogSettings":2:{s:6:"_props";a:43:{s:7:"use_ssl";b:0;s:6:"locale";s:5:"zh_CN";s:14:"show_posts_max";s:2:"15";s:8:"template";s:8:"standard";s:17:"show_more_enabled";b:1;s:16:"recent_posts_max";s:2:"10";s:17:"show_comments_max";s:2:"20";s:17:"xmlrpc_ping_hosts";a:2:{i:0;s:27:"http://rpc.weblogs.com/RPC2";i:1;s:0:"";}s:16:"htmlarea_enabled";b:1;s:22:"pull_down_menu_enabled";b:0;s:16:"comments_enabled";b:0;s:16:"categories_order";s:1:"1";s:14:"comments_order";s:1:"1";s:11:"time_offset";s:1:"0";s:14:"articles_order";s:1:"2";s:20:"plugin_karma_enabled";b:0;s:38:"plugin_karma_disable_negative_articles";N;s:31:"plugin_karma_negative_threshold";s:1:"3";s:25:"plugin_karma_track_voters";N;s:32:"plugin_karma_scoring_coefficient";d:1.5;s:23:"plugin_bloglook_enabled";b:1;s:22:"plugin_bloglook_blogid";s:15:"<b>bookcode</b>";s:22:"plugin_smileys_enabled";b:1;s:22:"plugin_smileys_iconset";s:7:"default";s:23:"plugin_tagcloud_enabled";b:1;s:28:"plugin_tagcloud_max_articles";s:2:"20";s:28:"plugin_tagcloud_max_keywords";s:2:"50";s:24:"plugin_tagcloud_min_size";s:3:"0.4";s:24:"plugin_tagcloud_max_size";s:1:"3";s:26:"plugin_tagcloud_min_weight";s:3:"100";s:26:"plugin_tagcloud_max_weight";s:3:"900";s:31:"plugin_tagcloud_banned_keywords";s:1117:"a,an,the,and,of,i,its,to,is,in,with,for,as,that,on,at,this,my,was,our,it,you,we,1,2,3,4,5,6,7,8,9,0,10,about,after,all,almost,along,also,amp,another,any,are,area,around,available,back,be,because,been,being,best,better,big,bit,both,but,by,c,came,can,capable,control,could,course,d,dan,day,decided,did,didn,different,div,do,doesn,don,down,drive,e,each,easily,easy,edition,end,enough,even,every,example,few,find,first,found,from,get,go,going,good,got,gt,had,hard,has,have,he,her,here,him,his,how,if,into,isn,just,know,last,left,li,like,little,ll,long,look,lot,lt,m,made,make,many,mb,me,menu,might,mm,more,most,much,name,nbsp,need,new,no,not,now,number,off,old,one,only,or,original,other,out,over,part,place,point,pretty,probably,problem,put,quite,quot,r,re,really,results,right,s,same,saw,see,set,several,she,sherree,should,since,size,small,so,some,something,special,still,stuff,such,sure,system,t,take,than,their,them,then,there,these,they,thing,things,think,those,though,through,time,today,together,too,took,two,up,us,use,used,using,ve,very,want,way,well,went,were,what,when,where,which,while,white,who,will,would,your";s:31:"plugin_tagcloud_min_word_length";s:1:"3";s:24:"plugin_authimage_enabled";b:1;s:23:"plugin_authimage_length";s:1:"6";s:20:"plugin_authimage_key";s:8:"LifeType";s:28:"plugin_authimage_expiredtime";s:4:"3600";s:24:"plugin_authimage_default";s:10:"marble.gif";s:21:"link_categories_order";s:1:"1";s:29:"show_future_posts_in_calendar";b:0;s:17:"first_day_of_week";s:1:"1";s:27:"new_drafts_autosave_enabled";b:0;s:25:"default_send_notification";N;}s:11:"_keyFilters";a:0:{}}', 'damai', 1, 1, '2017-05-12 02:49:08', 1, 1, 0, 'damai', '2018-01-31 05:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `lt_blog_categories`
--

CREATE TABLE `lt_blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mangled_name` varchar(255) NOT NULL,
  `properties` text NOT NULL,
  `num_blogs` int(10) NOT NULL DEFAULT '0',
  `num_active_blogs` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_blog_categories`
--

INSERT INTO `lt_blog_categories` (`id`, `name`, `description`, `mangled_name`, `properties`, `num_blogs`, `num_active_blogs`) VALUES
(3, 'General', 'General', 'general', 'a:0:{}', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lt_config`
--

CREATE TABLE `lt_config` (
  `config_key` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  `value_type` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_config`
--

INSERT INTO `lt_config` (`config_key`, `config_value`, `value_type`) VALUES
('album_link_format', '/blog/{blogname}/album/{albumname}$', 3),
('allow_javascript_blocks_in_posts', '0', 3),
('allow_php_code_in_templates', '0', 3),
('archive_link_format', '/blog/{blogname}/archives/{year}/?{month}/?{day}', 3),
('autosave_new_drafts_time_millis', '300000', 3),
('base_url', 'http://192.168.4.14/core', 3),
('bayesian_filter_enabled', '1', 3),
('bayesian_filter_max_length_token', '100', 3),
('bayesian_filter_min_length_token', '3', 3),
('bayesian_filter_nonspam_probability_treshold', '0.2', 3),
('bayesian_filter_number_significant_tokens', '15', 3),
('bayesian_filter_spam_comments_action', '0', 3),
('bayesian_filter_spam_probability_treshold', '0.9', 3),
('bb2_display_stats', '1', 3),
('bb2_httpbl_key', '', 3),
('bb2_httpbl_maxage', '30', 3),
('bb2_httpbl_threat', '25', 3),
('bb2_installed', '1', 3),
('bb2_log_table', 'bad_behavior', 3),
('bb2_offsite_forms', '', 3),
('bb2_reverse_proxy', '', 3),
('bb2_reverse_proxy_header', 'X-Forwarded-For', 3),
('bb2_strict', '', 3),
('bb2_verbose', '', 3),
('beautify_comments_text', '0', 3),
('blog_does_not_exist_url', 'http://192.168.4.14/core', 3),
('blog_link_format', '/$', 3),
('category_link_format', '/blog/{blogname}/{catname}$', 3),
('check_email_address_validity', '0', 3),
('comments_enabled', '0', 3),
('comments_order', '1', 3),
('default_blog_id', '1', 3),
('default_global_article_category_id', '1', 3),
('default_locale', 'zh_CN', 3),
('default_pull_down_menu_enabled', '0', 3),
('default_rss_profile', 'rss090', 3),
('default_template', 'standard', 3),
('default_time_offset', '0', 3),
('disable_apache_error_handler', '0', 3),
('email_service_enabled', '1', 3),
('email_service_type', 'php', 3),
('forbidden_usernames', 'admin www blog ftp wiki forums', 3),
('force_one_blog_per_email_account', '0', 3),
('force_posturl_unique', '0', 3),
('force_registration_confirmation', '0', 3),
('global_plugin_overrides', 'a:96:{s:22:"plugin_akismet_enabled";s:1:"1";s:41:"plugin_akismet_trackback_checking_enabled";s:1:"1";s:22:"plugin_akismet_api_key";s:1:"1";s:24:"plugin_authimage_enabled";s:1:"1";s:23:"plugin_authimage_length";s:1:"1";s:20:"plugin_authimage_key";s:1:"1";s:28:"plugin_authimage_expiredtime";s:1:"1";s:23:"plugin_ayearago_enabled";s:1:"1";s:24:"plugin_ayearago_maxposts";s:1:"1";s:24:"plugin_blogtimes_enabled";s:1:"1";s:28:"plugin_categorycloud_enabled";s:1:"1";s:29:"plugin_categorycloud_min_size";s:1:"1";s:29:"plugin_categorycloud_max_size";s:1:"1";s:31:"plugin_categorycloud_min_weight";s:1:"1";s:31:"plugin_categorycloud_max_weight";s:1:"1";s:28:"plugin_closecomments_enabled";s:1:"1";s:27:"plugin_closecomments_period";s:1:"1";s:22:"plugin_contact_enabled";s:1:"1";s:30:"plugin_contact_banned_keywords";s:1:"1";s:28:"plugin_contentfilter_enabled";s:1:"1";s:23:"plugin_cssnaked_enabled";s:1:"1";s:25:"plugin_ectocustom_enabled";s:1:"1";s:24:"plugin_extrafields_value";s:1:"1";s:23:"plugin_gravatar_enabled";s:1:"1";s:22:"plugin_gravatar_rating";s:1:"1";s:20:"plugin_gravatar_size";s:1:"1";s:23:"plugin_gravatar_default";s:1:"1";s:26:"plugin_hiddeninput_enabled";s:1:"1";s:34:"plugin_hiddeninput_notopic_enabled";s:1:"1";s:31:"plugin_hiddeninput_hiddenfields";s:1:"1";s:30:"plugin_hiddeninput_emptyfields";s:1:"1";s:24:"plugin_hostblock_enabled";s:1:"1";s:32:"plugin_hotlinkprevention_enabled";s:1:"1";s:39:"plugin_hotlinkprevention_fileextensions";s:1:"1";s:44:"plugin_hotlinkprevention_blankrefererenabled";s:1:"1";s:38:"plugin_hotlinkprevention_allowreferers";s:1:"1";s:21:"plugin_httpbl_enabled";s:1:"1";s:21:"plugin_httpbl_api_key";s:1:"1";s:23:"plugin_httpbl_max_stale";s:1:"1";s:22:"plugin_iconize_enabled";s:1:"1";s:21:"plugin_moblog_enabled";s:1:"1";s:35:"plugin_moblog_resource_preview_type";s:1:"1";s:34:"plugin_moblog_article_category_ids";s:1:"1";s:40:"plugin_moblog_gallery_resource_album_ids";s:1:"1";s:23:"plugin_moderate_enabled";s:1:"1";s:28:"plugin_moderate_bypass_by_ip";s:1:"1";s:30:"plugin_moderate_bypass_by_auth";s:1:"1";s:23:"plugin_nofollow_enabled";s:1:"1";s:21:"plugin_openid_enabled";s:1:"1";s:23:"plugin_plogeshi_enabled";s:1:"1";s:24:"plugin_recaptcha_enabled";s:1:"1";s:24:"plugin_recaptcha_privkey";s:1:"2";s:23:"plugin_recaptcha_pubkey";s:1:"2";s:22:"plugin_recaptcha_theme";s:1:"2";s:26:"plugin_recaptcha_manglekey";s:1:"2";s:29:"plugin_recentcomments_enabled";s:1:"1";s:33:"plugin_recentcomments_maxcomments";s:1:"1";s:38:"plugin_recentcomments_include_comments";s:1:"1";s:40:"plugin_recentcomments_include_trackbacks";s:1:"1";s:31:"plugin_recenttrackbacks_enabled";s:1:"1";s:37:"plugin_recenttrackbacks_maxtrackbacks";s:1:"1";s:26:"plugin_recommended_enabled";s:1:"1";s:22:"plugin_related_enabled";s:1:"1";s:27:"plugin_related_num_articles";s:1:"1";s:30:"plugin_related_min_word_length";s:1:"1";s:31:"plugin_related_refresh_interval";s:1:"1";s:41:"plugin_related_extract_keywords_from_body";s:1:"1";s:34:"plugin_remembercommentdata_enabled";s:1:"1";s:27:"plugin_requireemail_enabled";s:1:"1";s:18:"plugin_rsd_enabled";s:1:"1";s:25:"plugin_secretblog_enabled";s:1:"1";s:22:"plugin_sitemap_enabled";s:1:"1";s:36:"plugin_sitemap_notify_google_enabled";s:1:"1";s:22:"plugin_smileys_enabled";s:1:"1";s:26:"plugin_submissions_enabled";s:1:"1";s:35:"plugin_submissions_htmlarea_enabled";s:1:"1";s:40:"plugin_submissions_notifications_enabled";s:1:"1";s:31:"plugin_submissions_require_name";s:1:"1";s:23:"plugin_tagcloud_enabled";s:1:"1";s:28:"plugin_tagcloud_max_articles";s:1:"1";s:28:"plugin_tagcloud_max_keywords";s:1:"1";s:24:"plugin_tagcloud_min_size";s:1:"1";s:24:"plugin_tagcloud_max_size";s:1:"1";s:26:"plugin_tagcloud_min_weight";s:1:"1";s:26:"plugin_tagcloud_max_weight";s:1:"1";s:31:"plugin_tagcloud_min_word_length";s:1:"1";s:31:"plugin_tagcloud_banned_keywords";s:1:"1";s:27:"plugin_topreadposts_enabled";s:1:"1";s:28:"plugin_topreadposts_maxposts";s:1:"1";s:22:"plugin_twitter_enabled";s:1:"1";s:23:"plugin_twitter_username";s:1:"1";s:23:"plugin_twitter_password";s:1:"1";s:32:"plugin_validatetrackback_enabled";s:1:"1";s:42:"plugin_validatetrackback_trackback_enabled";s:1:"1";s:36:"plugin_validatetrackback_dns_enabled";s:1:"1";s:45:"plugin_validatetrackback_linkchecking_enabled";s:1:"1";}', 5),
('global_plugin_settings', 'a:96:{s:22:"plugin_akismet_enabled";N;s:41:"plugin_akismet_trackback_checking_enabled";N;s:22:"plugin_akismet_api_key";s:0:"";s:24:"plugin_authimage_enabled";N;s:23:"plugin_authimage_length";s:0:"";s:20:"plugin_authimage_key";s:0:"";s:28:"plugin_authimage_expiredtime";s:0:"";s:23:"plugin_ayearago_enabled";N;s:24:"plugin_ayearago_maxposts";s:0:"";s:24:"plugin_blogtimes_enabled";N;s:28:"plugin_categorycloud_enabled";N;s:29:"plugin_categorycloud_min_size";s:0:"";s:29:"plugin_categorycloud_max_size";s:0:"";s:31:"plugin_categorycloud_min_weight";s:0:"";s:31:"plugin_categorycloud_max_weight";s:0:"";s:28:"plugin_closecomments_enabled";s:1:"1";s:27:"plugin_closecomments_period";s:1:"1";s:22:"plugin_contact_enabled";N;s:30:"plugin_contact_banned_keywords";s:0:"";s:28:"plugin_contentfilter_enabled";N;s:23:"plugin_cssnaked_enabled";N;s:25:"plugin_ectocustom_enabled";N;s:24:"plugin_extrafields_value";s:0:"";s:23:"plugin_gravatar_enabled";N;s:22:"plugin_gravatar_rating";s:1:"G";s:20:"plugin_gravatar_size";s:2:"30";s:23:"plugin_gravatar_default";s:8:"baby.jpg";s:26:"plugin_hiddeninput_enabled";N;s:34:"plugin_hiddeninput_notopic_enabled";N;s:31:"plugin_hiddeninput_hiddenfields";s:0:"";s:30:"plugin_hiddeninput_emptyfields";s:0:"";s:24:"plugin_hostblock_enabled";N;s:32:"plugin_hotlinkprevention_enabled";N;s:39:"plugin_hotlinkprevention_fileextensions";s:0:"";s:44:"plugin_hotlinkprevention_blankrefererenabled";N;s:38:"plugin_hotlinkprevention_allowreferers";s:0:"";s:21:"plugin_httpbl_enabled";N;s:21:"plugin_httpbl_api_key";s:0:"";s:23:"plugin_httpbl_max_stale";s:0:"";s:22:"plugin_iconize_enabled";N;s:21:"plugin_moblog_enabled";N;s:35:"plugin_moblog_resource_preview_type";s:0:"";s:34:"plugin_moblog_article_category_ids";s:0:"";s:40:"plugin_moblog_gallery_resource_album_ids";s:0:"";s:23:"plugin_moderate_enabled";N;s:28:"plugin_moderate_bypass_by_ip";N;s:30:"plugin_moderate_bypass_by_auth";N;s:23:"plugin_nofollow_enabled";N;s:21:"plugin_openid_enabled";N;s:23:"plugin_plogeshi_enabled";N;s:24:"plugin_recaptcha_enabled";N;s:24:"plugin_recaptcha_privkey";s:0:"";s:23:"plugin_recaptcha_pubkey";s:0:"";s:22:"plugin_recaptcha_theme";s:0:"";s:26:"plugin_recaptcha_manglekey";N;s:29:"plugin_recentcomments_enabled";N;s:33:"plugin_recentcomments_maxcomments";s:0:"";s:38:"plugin_recentcomments_include_comments";N;s:40:"plugin_recentcomments_include_trackbacks";N;s:31:"plugin_recenttrackbacks_enabled";N;s:37:"plugin_recenttrackbacks_maxtrackbacks";s:0:"";s:26:"plugin_recommended_enabled";N;s:22:"plugin_related_enabled";N;s:27:"plugin_related_num_articles";s:0:"";s:30:"plugin_related_min_word_length";s:0:"";s:31:"plugin_related_refresh_interval";s:1:"0";s:41:"plugin_related_extract_keywords_from_body";N;s:34:"plugin_remembercommentdata_enabled";N;s:27:"plugin_requireemail_enabled";N;s:18:"plugin_rsd_enabled";N;s:25:"plugin_secretblog_enabled";N;s:22:"plugin_sitemap_enabled";N;s:36:"plugin_sitemap_notify_google_enabled";N;s:22:"plugin_smileys_enabled";N;s:26:"plugin_submissions_enabled";N;s:35:"plugin_submissions_htmlarea_enabled";N;s:40:"plugin_submissions_notifications_enabled";N;s:31:"plugin_submissions_require_name";N;s:23:"plugin_tagcloud_enabled";N;s:28:"plugin_tagcloud_max_articles";s:0:"";s:28:"plugin_tagcloud_max_keywords";s:0:"";s:24:"plugin_tagcloud_min_size";s:0:"";s:24:"plugin_tagcloud_max_size";s:0:"";s:26:"plugin_tagcloud_min_weight";s:0:"";s:26:"plugin_tagcloud_max_weight";s:0:"";s:31:"plugin_tagcloud_min_word_length";s:0:"";s:31:"plugin_tagcloud_banned_keywords";s:0:"";s:27:"plugin_topreadposts_enabled";N;s:28:"plugin_topreadposts_maxposts";s:0:"";s:22:"plugin_twitter_enabled";N;s:23:"plugin_twitter_username";s:0:"";s:23:"plugin_twitter_password";s:0:"";s:32:"plugin_validatetrackback_enabled";N;s:42:"plugin_validatetrackback_trackback_enabled";N;s:36:"plugin_validatetrackback_dns_enabled";N;s:45:"plugin_validatetrackback_linkchecking_enabled";N;}', 5),
('hard_recent_posts_max', '25', 3),
('hard_show_comments_max', '50', 3),
('hard_show_posts_max', '50', 3),
('htmlarea_enabled', '1', 3),
('html_allowed_tags_in_comments', '<a><i><br><br/><b>', 3),
('http_cache_lifetime', '1800', 3),
('include_blog_id_in_url', '1', 3),
('locales', 'a:20:{i:0;s:5:"ca_ES";i:1;s:5:"de_DE";i:2;s:5:"en_UK";i:3;s:5:"en_US";i:4;s:5:"es_ES";i:5;s:5:"fr_FR";i:6;s:5:"gl_ES";i:7;s:5:"hu_HU";i:8;s:5:"id_ID";i:9;s:5:"it_IT";i:10;s:5:"ja_JP";i:11;s:5:"nl_NL";i:12;s:5:"pl_PL";i:13;s:5:"pt_BR";i:14;s:5:"ru_RU";i:15;s:5:"tt_RU";i:16;s:5:"ua_UA";i:17;s:5:"vi_VN";i:18;s:5:"zh_CN";i:19;s:5:"zh_TW";}', 5),
('locale_folder', './locale', 3),
('logout_destination_url', '', 3),
('maximum_comment_size', '0', 3),
('maximum_file_upload_size', '2000000', 3),
('medium_size_thumbnail_height', '480', 3),
('medium_size_thumbnail_width', '640', 3),
('minimum_password_length', '4', 3),
('need_email_confirm_registration', '1', 3),
('page_suffix_format', '/page/{page}', 3),
('path_to_bz2', '/bin/bzip2', 3),
('path_to_convert', '/usr/bin/convert', 3),
('path_to_gzip', '/bin/gzip', 3),
('path_to_tar', '/bin/tar', 3),
('path_to_unzip', '/usr/bin/unzip', 3),
('permalink_format', '/blog/{blogname}/{catname}/{year}/{month}/{day}/{postname}$', 3),
('plugin_list', 'a:62:{i:0;s:16:"addcommentnotify";i:1;s:7:"addthis";i:2;s:7:"akismet";i:3;s:11:"badbehavior";i:4;s:8:"bloglook";i:5;s:15:"categorybrowser";i:6;s:13:"categorycloud";i:7;s:5:"clean";i:8;s:17:"clickablecomments";i:9;s:7:"contact";i:10;s:13:"contentfilter";i:11;s:11:"copyarticle";i:12;s:11:"crystalpoll";i:13;s:4:"csrf";i:14;s:8:"cssnaked";i:15;s:10:"ectocustom";i:16;s:12:"editcomments";i:17;s:10:"embedmedia";i:18;s:11:"extrafields";i:19;s:10:"feedreader";i:20;s:7:"gallery";i:21;s:12:"galleryfeeds";i:22;s:13:"galleryimages";i:23;s:11:"getcategory";i:24;s:13:"googleadsense";i:25;s:15:"googleanalytics";i:26;s:8:"gravatar";i:27;s:11:"hiddeninput";i:28;s:9:"hostblock";i:29;s:17:"hotlinkprevention";i:30;s:6:"httpbl";i:31;s:7:"iconize";i:32;s:5:"karma";i:33;s:10:"mailcentre";i:34;s:6:"mobile";i:35;s:6:"moblog";i:36;s:8:"moderate";i:37;s:8:"mtexport";i:38;s:7:"navmenu";i:39;s:14:"nestedcomments";i:40;s:8:"nofollow";i:41;s:8:"plogeshi";i:42;s:6:"plugoo";i:43;s:5:"print";i:44;s:11:"randomimage";i:45;s:9:"recaptcha";i:46;s:14:"recentcomments";i:47;s:16:"recenttrackbacks";i:48;s:11:"recommended";i:49;s:10:"reflection";i:50;s:7:"related";i:51;s:19:"remembercommentdata";i:52;s:12:"requireemail";i:53;s:3:"rsd";i:54;s:9:"rssimport";i:55;s:10:"sapeclient";i:56;s:10:"secretblog";i:57;s:7:"sitemap";i:58;s:7:"smileys";i:59;s:12:"topreadposts";i:60;s:5:"trash";i:61;s:17:"validatetrackback";}', 5),
('plugin_manager_enabled', '1', 3),
('post_notification_source_address', 'noreply@your.host.com', 3),
('post_trackbacks_link_format', '/blog/{blogname}/post/trackbacks/{postname}$', 3),
('pull_down_menu_enabled', '0', 3),
('rdf_enabled', '1', 3),
('recent_posts_max', '10', 3),
('referer_tracker_enabled', '1', 3),
('request_format_mode', '3', 3),
('resources_enabled', '1', 3),
('resources_folder', './gallery/', 3),
('resources_quota', '0', 3),
('resource_download_link_format', '/blog/{blogname}/resource/{albumname}/download/{resourcename}$', 3),
('resource_link_format', '/blog/{blogname}/resource/{albumname}/{resourcename}$', 3),
('resource_medium_size_preview_link_format', '/blog/{blogname}/resource/{albumname}/preview-med/{resourcename}$', 3),
('resource_preview_link_format', '/blog/{blogname}/resource/{albumname}/preview/{resourcename}$', 3),
('resource_server_http_cache_enabled', '1', 3),
('rss_parser_enabled', '1', 3),
('save_drafts_via_xmlhttprequest_enabled', '1', 3),
('script_name', 'index.php', 3),
('search_engine_enabled', '1', 3),
('search_in_comments', '1', 3),
('search_in_custom_fields', '1', 3),
('security_pipeline_enabled', '1', 3),
('send_xmlrpc_pings_enabled_by_default', '1', 3),
('session_save_path', '', 3),
('show_comments_max', '20', 3),
('show_future_posts_in_calendar', '0', 3),
('show_more_enabled', '1', 3),
('show_more_threshold', '150', 3),
('show_posts_max', '15', 3),
('skip_dashboard', '0', 3),
('smtp_host', 'your.smtp.host.com', 3),
('smtp_password', '', 3),
('smtp_port', '25', 3),
('smtp_username', '', 3),
('smtp_use_authentication', '0', 3),
('subdomains_available_domains', '', 3),
('subdomains_base_url', '', 3),
('subdomains_enabled', '0', 3),
('summary_disable_registration', '1', 3),
('summary_items_per_page', '25', 3),
('summary_page_show_max', '15', 3),
('summary_service_name', 'Your Service Name', 3),
('summary_show_agreement', '1', 3),
('summary_template_cache_lifetime', '0', 3),
('templates', 'a:2:{i:0;s:8:"standard";i:1;s:3:"zen";}', 5),
('template_cache_enabled', '1', 3),
('template_cache_lifetime', '-1', 3),
('template_compile_check', '1', 3),
('template_folder', './templates', 3),
('template_http_cache_enabled', '1', 3),
('template_link_format', '/blog/{blogname}/content/{templatename}$', 3),
('template_load_order', '1', 3),
('temp_folder', './tmp', 3),
('thumbnails_keep_aspect_ratio', '1', 3),
('thumbnail_format', 'same', 3),
('thumbnail_generator_use_smoothing_algorithm', '1', 3),
('thumbnail_height', '120', 3),
('thumbnail_method', 'gd', 3),
('thumbnail_width', '120', 3),
('trackback_server_enabled', '1', 3),
('trim_whitespace_output', '1', 3),
('unzip_use_native_version', '0', 3),
('update_article_reads', '1', 3),
('update_cached_article_reads', '1', 3),
('uploads_enabled', '1', 3),
('upload_allowed_files', '', 3),
('upload_forbidden_files', '*.php *.php3 *.php4 *.phtml *.htm *.html *.exe *.com *.bat .htaccess *.sh', 3),
('urlize_word_separator', '-', 3),
('users_can_add_templates', '1', 3),
('user_posts_link_format', '/blog/{blogname}/user/{username}$', 3),
('use_captcha_auth', '0', 3),
('use_http_accept_language_detection', '0', 3),
('xhtml_converter_aggresive_mode_enabled', '0', 3),
('xhtml_converter_enabled', '1', 3),
('xmlrpc_api_enabled', '1', 3),
('xmlrpc_ping_enabled', '0', 3),
('xmlrpc_ping_hosts', 'a:1:{i:0;s:27:"http://rpc.weblogs.com/RPC2";}', 5);

-- --------------------------------------------------------

--
-- Table structure for table `lt_custom_fields_definition`
--

CREATE TABLE `lt_custom_fields_definition` (
  `id` int(10) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_description` text NOT NULL,
  `field_type` int(2) NOT NULL DEFAULT '1',
  `field_values` text NOT NULL,
  `blog_id` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `searchable` tinyint(1) DEFAULT '1',
  `hidden` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_custom_fields_definition`
--

INSERT INTO `lt_custom_fields_definition` (`id`, `field_name`, `field_description`, `field_type`, `field_values`, `blog_id`, `date`, `searchable`, `hidden`) VALUES
(1, 'positiveKarma', 'æ­£é¢è¯„ä»·åˆ†æ•°', 1, 'a:0:{}', 1, '2017-05-21 09:39:16', 1, 0),
(2, 'negativeKarma', 'è´Ÿé¢è¯„ä»·åˆ†æ•°', 1, 'a:0:{}', 1, '2017-05-21 09:39:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_custom_fields_values`
--

CREATE TABLE `lt_custom_fields_values` (
  `id` int(10) NOT NULL,
  `field_id` int(10) NOT NULL DEFAULT '0',
  `field_value` text NOT NULL,
  `normalized_value` text NOT NULL,
  `blog_id` int(10) DEFAULT NULL,
  `article_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_custom_fields_values`
--

INSERT INTO `lt_custom_fields_values` (`id`, `field_id`, `field_value`, `normalized_value`, `blog_id`, `article_id`) VALUES
(25, 1, '10', '10', 1, 3),
(26, 2, '1', '1', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lt_feedreader_data`
--

CREATE TABLE `lt_feedreader_data` (
  `id` int(10) NOT NULL,
  `feed_id` int(10) DEFAULT NULL,
  `last_read` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_filtered_content`
--

CREATE TABLE `lt_filtered_content` (
  `id` int(10) NOT NULL,
  `reg_exp` text,
  `blog_id` int(10) NOT NULL DEFAULT '0',
  `reason` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_gallery_albums`
--

CREATE TABLE `lt_gallery_albums` (
  `id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `flags` int(10) NOT NULL DEFAULT '0',
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `properties` text NOT NULL,
  `show_album` tinyint(1) DEFAULT '1',
  `normalized_description` text NOT NULL,
  `normalized_name` varchar(255) NOT NULL,
  `mangled_name` varchar(255) NOT NULL,
  `num_resources` int(10) NOT NULL DEFAULT '0',
  `num_children` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_gallery_albums`
--

INSERT INTO `lt_gallery_albums` (`id`, `owner_id`, `description`, `name`, `flags`, `parent_id`, `date`, `properties`, `show_album`, `normalized_description`, `normalized_name`, `mangled_name`, `num_resources`, `num_children`) VALUES
(1, 1, 'General', 'General', 1, 0, '2017-05-12 02:49:09', 'a:0:{}', 1, 'General', 'General', 'general', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_gallery_resources`
--

CREATE TABLE `lt_gallery_resources` (
  `id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL DEFAULT '0',
  `album_id` int(10) NOT NULL DEFAULT '0',
  `description` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flags` int(10) DEFAULT '0',
  `resource_type` int(3) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` int(20) NOT NULL DEFAULT '0',
  `metadata` text,
  `thumbnail_format` varchar(4) NOT NULL DEFAULT 'same',
  `normalized_description` text NOT NULL,
  `properties` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_gallery_resources`
--

INSERT INTO `lt_gallery_resources` (`id`, `owner_id`, `album_id`, `description`, `date`, `flags`, `resource_type`, `file_path`, `file_name`, `file_size`, `metadata`, `thumbnail_format`, `normalized_description`, `properties`) VALUES
(1, 1, 1, '自定义头像功能', '2017-08-30 10:00:07', 1, 1, '', 'u=3330810622,1257153973&fm=73.jpg', 6127, 'a:7:{s:8:"md5_file";s:0:"";s:8:"md5_data";s:0:"";s:8:"filesize";i:6127;s:10:"fileformat";s:3:"jpg";s:8:"comments";i:0;s:5:"video";a:7:{s:10:"dataformat";s:3:"jpg";s:8:"lossless";b:0;s:15:"bits_per_sample";i:24;s:18:"pixel_aspect_ratio";d:1;s:12:"resolution_x";i:127;s:12:"resolution_y";i:109;s:17:"compression_ratio";d:0.14753545715042501;}s:3:"jpg";a:1:{s:4:"exif";a:3:{s:4:"FILE";a:6:{s:8:"FileName";s:9:"phpOB5CmU";s:12:"FileDateTime";i:1504087207;s:8:"FileSize";i:6127;s:8:"FileType";i:2;s:8:"MimeType";s:10:"image/jpeg";s:13:"SectionsFound";s:0:"";}s:8:"COMPUTED";a:4:{s:4:"html";s:24:"width="127" height="109"";s:6:"Height";i:109;s:5:"Width";i:127;s:7:"IsColor";i:1;}s:4:"EXIF";a:1:{s:9:"MakerNote";s:0:"";}}}}', 'same', ' ', 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `lt_global_articles_categories`
--

CREATE TABLE `lt_global_articles_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mangled_name` varchar(255) NOT NULL,
  `properties` text NOT NULL,
  `num_articles` int(10) NOT NULL DEFAULT '0',
  `num_active_articles` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_global_articles_categories`
--

INSERT INTO `lt_global_articles_categories` (`id`, `name`, `description`, `mangled_name`, `properties`, `num_articles`, `num_active_articles`) VALUES
(1, 'General', 'General', 'general', 'a:0:{}', 2, 1),
(2, 'General', 'General', 'general', 'a:0:{}', 0, 0),
(3, 'General', 'General', 'general', 'a:0:{}', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_host_blocking_rules`
--

CREATE TABLE `lt_host_blocking_rules` (
  `id` int(10) NOT NULL,
  `reason` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_id` int(10) NOT NULL DEFAULT '0',
  `block_type` int(1) DEFAULT '1',
  `list_type` int(1) DEFAULT '1',
  `mask` int(2) DEFAULT '0',
  `host` varchar(15) DEFAULT '0.0.0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_mailcentre_sent`
--

CREATE TABLE `lt_mailcentre_sent` (
  `id` int(10) NOT NULL,
  `recipients` text NOT NULL,
  `recipients_cc` text NOT NULL,
  `recipients_bcc` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_mylinks`
--

CREATE TABLE `lt_mylinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rss_feed` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `properties` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_mylinks_categories`
--

CREATE TABLE `lt_mylinks_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `blog_id` int(10) NOT NULL DEFAULT '0',
  `last_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `properties` text NOT NULL,
  `num_links` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_mylinks_categories`
--

INSERT INTO `lt_mylinks_categories` (`id`, `name`, `blog_id`, `last_modification`, `properties`, `num_links`) VALUES
(1, 'General', 1, '2017-05-12 02:49:09', 'a:0:{}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_permissions`
--

CREATE TABLE `lt_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `admin_only` int(1) NOT NULL DEFAULT '1',
  `core_perm` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_permissions`
--

INSERT INTO `lt_permissions` (`id`, `permission`, `description`, `admin_only`, `core_perm`) VALUES
(1, 'login_perm', 'login_perm_desc', 1, 1),
(2, 'blog_access', 'blog_access_desc', 0, 1),
(3, 'add_post', 'add_post_desc', 0, 1),
(4, 'update_post', 'update_post_desc', 0, 1),
(5, 'view_posts', 'view_posts_desc', 0, 1),
(6, 'add_category', 'add_category_desc', 0, 1),
(7, 'update_category', 'update_category_desc', 0, 1),
(8, 'view_categories', 'view_categories_desc', 0, 1),
(9, 'add_link', 'add_link_desc', 0, 1),
(10, 'update_link', 'update_link_desc', 0, 1),
(11, 'view_links', 'view_links_desc', 0, 1),
(12, 'add_link_category', 'add_link_category_desc', 0, 1),
(13, 'update_link_category', 'update_link_category_desc', 0, 1),
(14, 'view_link_categories', 'view_link_categories_desc', 0, 1),
(15, 'update_comment', 'update_comment_desc', 0, 1),
(16, 'view_comments', 'view_comments_desc', 0, 1),
(17, 'update_trackback', 'update_trackback_desc', 0, 1),
(18, 'view_trackbacks', 'view_trackbacks_desc', 0, 1),
(19, 'add_custom_field', 'add_custom_field_desc', 0, 1),
(20, 'update_custom_field', 'update_custom_field_desc', 0, 1),
(21, 'view_custom_fields', 'view_custom_fields_desc', 0, 1),
(22, 'add_resource', 'add_resource_desc', 0, 1),
(23, 'update_resource', 'update_resource_desc', 0, 1),
(24, 'add_album', 'add_album_desc', 0, 1),
(25, 'update_album', 'update_album_desc', 0, 1),
(26, 'view_resources', 'view_resources_desc', 0, 1),
(27, 'update_blog', 'update_blog_desc', 0, 1),
(28, 'add_blog_user', 'add_blog_user_desc', 0, 1),
(29, 'update_blog_user', 'update_blog_user_desc', 0, 1),
(30, 'view_blog_users', 'view_blog_users_desc', 0, 1),
(31, 'add_blog_template', 'add_blog_template_desc', 0, 1),
(32, 'update_blog_template', 'update_blog_template_desc', 0, 1),
(33, 'view_blog_templates', 'view_blog_templates_desc', 0, 1),
(34, 'view_blog_stats', 'view_blog_stats_desc', 0, 1),
(35, 'update_blog_stats', 'update_blog_stats_desc', 0, 1),
(36, 'view_all_user_articles', 'view_all_user_articles_desc', 0, 1),
(37, 'update_all_user_articles', 'update_all_user_articles_desc', 0, 1),
(38, 'manage_plugins', 'manage_plugins_desc', 0, 1),
(39, 'add_user', 'add_user_desc', 1, 1),
(40, 'view_users', 'view_users_desc', 1, 1),
(41, 'edit_blog_admin_mode', 'edit_blog_admin_mode_desc', 1, 1),
(42, 'update_user', 'update_user_desc', 1, 1),
(43, 'add_permission', 'add_permission_desc', 1, 1),
(44, 'view_permissions', 'view_permissions_desc', 1, 1),
(45, 'update_permission', 'update_permission_desc', 1, 1),
(46, 'add_site_blog', 'add_site_blog_desc', 1, 1),
(47, 'view_site_blogs', 'view_site_blogs_desc', 1, 1),
(48, 'update_site_blog', 'update_site_blog_desc', 1, 1),
(49, 'add_blog_category', 'add_blog_category_desc', 1, 1),
(50, 'view_blog_categories', 'view_blog_categories', 1, 1),
(51, 'update_blog_category', 'update_blog_category_desc', 1, 1),
(52, 'add_locale', 'add_locale_desc', 1, 1),
(53, 'view_locales', 'view_locales_desc', 1, 1),
(54, 'update_locale', 'update_locale_desc', 1, 1),
(55, 'add_template', 'add_template_desc', 1, 1),
(56, 'view_templates', 'view_templates_desc', 1, 1),
(57, 'update_template', 'update_template_desc', 1, 1),
(58, 'add_global_category', 'add_global_article_category_desc', 1, 1),
(59, 'view_global_categories', 'view_global_article_categories_desc', 1, 1),
(60, 'update_global_category', 'update_global_article_category_desc', 1, 1),
(61, 'view_global_settings', 'view_global_settings_desc', 1, 1),
(62, 'update_global_settings', 'update_global_settings_desc', 1, 1),
(63, 'view_plugins', 'view_plugins_desc', 1, 1),
(64, 'update_plugin_settings', 'update_plugin_settings_desc', 1, 1),
(65, 'purge_data', 'purge_data_desc', 1, 1),
(66, 'manage_admin_plugins', 'manage_admin_plugins_desc', 1, 1),
(67, 'manage_plugin_admincentre', 'manage_plugin_admincentre_desc', 1, 0),
(68, 'manage_ad_blocks', 'manage_ad_blocks_desc', 1, 0),
(69, 'manage_moblogbatch', 'manage_moblogbatch_desc', 1, 0),
(70, 'edit_blog_templates', 'edit_blog_templates_desc', 0, 0),
(71, 'edit_global_templates', 'edit_global_templates_desc', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_phpbb2_users`
--

CREATE TABLE `lt_phpbb2_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `phpbb_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `about` text,
  `properties` text NOT NULL,
  `resource_picture_id` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_polls`
--

CREATE TABLE `lt_polls` (
  `id` int(10) NOT NULL,
  `text` text,
  `blog_id` int(10) DEFAULT NULL,
  `choices` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_polls_settings`
--

CREATE TABLE `lt_polls_settings` (
  `blog_id` int(10) NOT NULL,
  `settings` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_poll_votes`
--

CREATE TABLE `lt_poll_votes` (
  `id` int(10) NOT NULL,
  `poll_id` int(10) DEFAULT NULL,
  `choice_id` int(10) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_referers`
--

CREATE TABLE `lt_referers` (
  `id` int(10) NOT NULL,
  `url` text NOT NULL,
  `article_id` int(10) NOT NULL DEFAULT '0',
  `blog_id` int(10) NOT NULL DEFAULT '0',
  `hits` int(10) DEFAULT '1',
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_referers`
--

INSERT INTO `lt_referers` (`id`, `url`, `article_id`, `blog_id`, `hits`, `last_date`) VALUES
(1, 'http://192.168.4.14/core/', 1, 1, 5, '2017-05-21 08:07:17'),
(2, 'http://192.168.4.14/core/index.php?op=ViewArticle&articleId=1&blogId=1', 0, 1, 2, '2017-08-30 10:21:55'),
(3, 'http://192.168.4.14/core/index.php?blogId=1', 0, 1, 1, '2017-05-12 03:34:51'),
(4, 'http://192.168.4.14/core/index.php?op=Template&blogId=1&show=archives', 0, 1, 1, '2017-05-12 03:34:54'),
(5, 'http://192.168.4.14/core/index.php?op=ViewAlbum&albumId=0&blogId=1', 0, 1, 1, '2017-05-12 03:34:56'),
(6, 'http://192.168.4.14/core/', 0, 1, 11, '2017-08-30 09:36:25'),
(7, 'http://192.168.4.14/core/post/1/1', 0, 1, 19, '2017-08-25 06:44:36'),
(8, 'http://192.168.4.14/core/static/1/archives', 0, 1, 10, '2017-08-30 10:00:49'),
(9, 'http://192.168.4.14/core/blog/1', 0, 1, 20, '2017-08-30 10:15:17'),
(10, 'http://192.168.4.14/core/category/1/1', 0, 1, 10, '2017-08-30 10:00:52'),
(11, 'http://192.168.4.14/core/category/1/1', 1, 1, 8, '2017-08-25 06:43:03'),
(12, 'http://192.168.4.14/core/archives/1/201706', 0, 1, 3, '2017-05-21 08:05:41'),
(13, 'http://192.168.4.14/core/archives/1/201705', 0, 1, 1, '2017-05-21 08:05:34'),
(14, 'http://192.168.4.14/core/archives/1/201707', 0, 1, 4, '2017-08-25 06:43:25'),
(15, 'http://192.168.4.14/core/archives/1/201708', 0, 1, 1, '2017-05-21 08:05:40'),
(16, 'http://192.168.4.14/core/archives/1/201705', 1, 1, 1, '2017-05-21 08:05:49'),
(17, 'http://192.168.4.14/core/post/1/1', 1, 1, 1, '2017-05-21 08:07:35'),
(18, 'http://192.168.4.14/core/static/1/links', 0, 1, 1, '2017-05-21 09:38:09'),
(19, 'http://192.168.4.14/core/album/1/0', 0, 1, 7, '2017-08-30 10:00:34'),
(20, 'http://192.168.4.14/core/album/1/1', 0, 1, 7, '2017-08-28 03:52:26'),
(21, 'http://192.168.4.14/core/blog/1', 1, 1, 2, '2017-06-06 01:37:19'),
(23, 'http://192.168.4.14/core/1_damai', 0, 1, 2, '2017-06-06 01:54:07'),
(24, 'http://192.168.4.14/core/1_damai', 1, 1, 1, '2017-06-06 01:53:05'),
(25, 'http://192.168.4.14/core/1_damai/archive/1_test.html', 0, 1, 1, '2017-06-06 01:53:07'),
(26, 'http://192.168.4.14/core/1_damai/categories/1_general.html', 0, 1, 1, '2017-06-06 01:56:44'),
(27, 'http://192.168.4.14/core/1_damai/archives', 0, 1, 1, '2017-06-06 01:56:49'),
(28, 'http://192.168.4.14/core/blog/', 1, 1, 1, '2017-08-25 06:47:57'),
(31, 'http://192.168.4.14/core/', 3, 1, 5, '2018-01-31 05:06:24'),
(32, 'http://192.168.4.14/core/post/1/3', 3, 1, 17, '2017-08-30 09:56:58'),
(33, 'http://192.168.4.14/core/post/1/3', 0, 1, 8, '2017-08-30 10:20:02'),
(34, 'http://192.168.4.14/core/admin.php?op=Logout', 0, 1, 2, '2018-01-31 05:12:30'),
(35, 'http://192.168.4.14/core/admin.php', 0, 1, 2, '2017-08-30 10:21:04'),
(36, 'http://192.168.4.14/core/blog/1', 3, 1, 5, '2017-08-30 09:37:29'),
(37, 'http://192.168.4.14/core/index.php', 0, 1, 6, '2017-08-30 09:36:33'),
(38, 'http://192.168.4.14/core/admin.php?op=Manage', 0, 1, 1, '2017-08-30 08:40:29'),
(39, 'http://192.168.4.14/core/category/1/1', 3, 1, 5, '2017-08-30 10:13:22'),
(40, 'http://192.168.4.14/core/index.php?blogId=1', 3, 1, 1, '2017-08-30 10:21:08'),
(41, 'http://192.168.4.14/core/index.php?op=ViewArticle&articleId=3&blogId=1', 0, 1, 1, '2017-08-30 10:21:14'),
(42, 'http://192.168.4.14/core/index.php?op=Default&postCategoryId=1&blogId=1', 3, 1, 2, '2017-08-30 10:21:58'),
(43, 'http://192.168.4.14/core/index.php?op=ViewArticle&articleId=3&blogId=1', 1, 1, 2, '2017-08-30 10:21:25'),
(44, 'http://192.168.4.14/core/1_damai/archive/3_oeceei.html', 1, 1, 1, '2017-08-30 10:22:02'),
(45, 'http://192.168.4.14/core/1_damai/archive/1_test.html', 3, 1, 1, '2017-08-30 10:22:13'),
(46, 'http://192.168.4.14/core/1_damai/archive/3_oeceei.html', 0, 1, 2, '2018-01-31 05:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `lt_tmp_users_permissions`
--

CREATE TABLE `lt_tmp_users_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `blog_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_users`
--

CREATE TABLE `lt_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `about` text,
  `properties` text NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `resource_picture_id` int(10) NOT NULL DEFAULT '0',
  `site_admin` int(10) NOT NULL DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_users`
--

INSERT INTO `lt_users` (`id`, `user`, `password`, `email`, `full_name`, `about`, `properties`, `status`, `resource_picture_id`, `site_admin`, `last_login`) VALUES
(1, 'jinbiao', 'f6ba7f0845f4fdeb9cb031fa0a2a896e', 'jinbiao@ftsafe.com', 'jinbiaogu', '为啥爱我的发生地方地方我都是废物舞蹈服文档为单位多所单位为问点事', 'a:0:{}', 1, 1, 1, '2018-01-31 05:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `lt_users_permissions`
--

CREATE TABLE `lt_users_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `blog_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_users_permissions`
--

INSERT INTO `lt_users_permissions` (`id`, `user_id`, `blog_id`, `permission_id`) VALUES
(1, 1, 0, 49),
(2, 1, 0, 58),
(3, 1, 0, 52),
(4, 1, 0, 43),
(5, 1, 0, 46),
(6, 1, 0, 55),
(7, 1, 0, 39),
(8, 1, 0, 41),
(9, 1, 0, 1),
(10, 1, 0, 66),
(11, 1, 0, 65),
(12, 1, 0, 51),
(13, 1, 0, 60),
(14, 1, 0, 62),
(15, 1, 0, 54),
(16, 1, 0, 45),
(17, 1, 0, 64),
(18, 1, 0, 48),
(19, 1, 0, 57),
(20, 1, 0, 42),
(21, 1, 0, 50),
(22, 1, 0, 59),
(23, 1, 0, 61),
(24, 1, 0, 53),
(25, 1, 0, 44),
(26, 1, 0, 63),
(27, 1, 0, 47),
(28, 1, 0, 56),
(29, 1, 0, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lt_ad_blocks`
--
ALTER TABLE `lt_ad_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lt_articles`
--
ALTER TABLE `lt_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_reads` (`num_reads`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `blog_id_status_date` (`blog_id`,`status`,`date`),
  ADD KEY `global_category_status` (`global_category_id`,`status`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `lt_articles_categories`
--
ALTER TABLE `lt_articles_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `mangled_name` (`mangled_name`);

--
-- Indexes for table `lt_articles_comments`
--
ALTER TABLE `lt_articles_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `article_id_blog_id` (`article_id`,`blog_id`),
  ADD KEY `article_id_type` (`article_id`,`type`),
  ADD KEY `blog_id_type` (`blog_id`,`type`);
ALTER TABLE `lt_articles_comments` ADD FULLTEXT KEY `normalized_fields` (`normalized_text`,`normalized_topic`);
ALTER TABLE `lt_articles_comments` ADD FULLTEXT KEY `normalized_text` (`normalized_text`);
ALTER TABLE `lt_articles_comments` ADD FULLTEXT KEY `normalized_topic` (`normalized_topic`);

--
-- Indexes for table `lt_articles_notifications`
--
ALTER TABLE `lt_articles_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `lt_articles_text`
--
ALTER TABLE `lt_articles_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);
ALTER TABLE `lt_articles_text` ADD FULLTEXT KEY `normalized_text` (`normalized_text`);
ALTER TABLE `lt_articles_text` ADD FULLTEXT KEY `normalized_topic` (`normalized_topic`);
ALTER TABLE `lt_articles_text` ADD FULLTEXT KEY `normalized_fields` (`normalized_text`,`normalized_topic`);

--
-- Indexes for table `lt_article_categories_link`
--
ALTER TABLE `lt_article_categories_link`
  ADD PRIMARY KEY (`article_id`,`category_id`);

--
-- Indexes for table `lt_bayesian_filter_info`
--
ALTER TABLE `lt_bayesian_filter_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `lt_bayesian_tokens`
--
ALTER TABLE `lt_bayesian_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `token` (`token`);

--
-- Indexes for table `lt_blogs`
--
ALTER TABLE `lt_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `mangled_blog` (`mangled_blog`),
  ADD KEY `blog_category_id` (`blog_category_id`),
  ADD KEY `custom_domain` (`custom_domain`),
  ADD KEY `create_date` (`create_date`);

--
-- Indexes for table `lt_blog_categories`
--
ALTER TABLE `lt_blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mangled_name` (`mangled_name`);

--
-- Indexes for table `lt_config`
--
ALTER TABLE `lt_config`
  ADD PRIMARY KEY (`config_key`);

--
-- Indexes for table `lt_custom_fields_definition`
--
ALTER TABLE `lt_custom_fields_definition`
  ADD PRIMARY KEY (`id`,`field_name`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `lt_custom_fields_values`
--
ALTER TABLE `lt_custom_fields_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `blog_id_article_id` (`blog_id`,`article_id`);
ALTER TABLE `lt_custom_fields_values` ADD FULLTEXT KEY `normalized_value` (`normalized_value`);

--
-- Indexes for table `lt_feedreader_data`
--
ALTER TABLE `lt_feedreader_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lt_filtered_content`
--
ALTER TABLE `lt_filtered_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `lt_gallery_albums`
--
ALTER TABLE `lt_gallery_albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `mangled_name` (`mangled_name`),
  ADD KEY `owner_id_mangled_name` (`owner_id`,`mangled_name`);
ALTER TABLE `lt_gallery_albums` ADD FULLTEXT KEY `normalized_name` (`normalized_name`);
ALTER TABLE `lt_gallery_albums` ADD FULLTEXT KEY `normalized_description` (`normalized_description`);
ALTER TABLE `lt_gallery_albums` ADD FULLTEXT KEY `normalized_fields` (`normalized_name`,`normalized_description`);

--
-- Indexes for table `lt_gallery_resources`
--
ALTER TABLE `lt_gallery_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `file_name` (`file_name`),
  ADD KEY `album_id_owner_id` (`album_id`,`owner_id`),
  ADD KEY `resource_type` (`resource_type`);
ALTER TABLE `lt_gallery_resources` ADD FULLTEXT KEY `normalized_description` (`normalized_description`);

--
-- Indexes for table `lt_global_articles_categories`
--
ALTER TABLE `lt_global_articles_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mangled_name` (`mangled_name`);

--
-- Indexes for table `lt_host_blocking_rules`
--
ALTER TABLE `lt_host_blocking_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_type` (`block_type`),
  ADD KEY `blog_id_block_type` (`blog_id`,`block_type`);

--
-- Indexes for table `lt_mailcentre_sent`
--
ALTER TABLE `lt_mailcentre_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lt_mylinks`
--
ALTER TABLE `lt_mylinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `lt_mylinks_categories`
--
ALTER TABLE `lt_mylinks_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `lt_permissions`
--
ALTER TABLE `lt_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lt_phpbb2_users`
--
ALTER TABLE `lt_phpbb2_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phpbb_id` (`phpbb_id`);

--
-- Indexes for table `lt_polls`
--
ALTER TABLE `lt_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `lt_polls_settings`
--
ALTER TABLE `lt_polls_settings`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `lt_poll_votes`
--
ALTER TABLE `lt_poll_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`),
  ADD KEY `choice_id` (`choice_id`);

--
-- Indexes for table `lt_referers`
--
ALTER TABLE `lt_referers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `blog_id_article_id` (`blog_id`,`article_id`);

--
-- Indexes for table `lt_tmp_users_permissions`
--
ALTER TABLE `lt_tmp_users_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `lt_users`
--
ALTER TABLE `lt_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `lt_users_permissions`
--
ALTER TABLE `lt_users_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lt_ad_blocks`
--
ALTER TABLE `lt_ad_blocks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_articles`
--
ALTER TABLE `lt_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_articles_categories`
--
ALTER TABLE `lt_articles_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lt_articles_comments`
--
ALTER TABLE `lt_articles_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lt_articles_notifications`
--
ALTER TABLE `lt_articles_notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_articles_text`
--
ALTER TABLE `lt_articles_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_bayesian_filter_info`
--
ALTER TABLE `lt_bayesian_filter_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_bayesian_tokens`
--
ALTER TABLE `lt_bayesian_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `lt_blogs`
--
ALTER TABLE `lt_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_blog_categories`
--
ALTER TABLE `lt_blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_custom_fields_definition`
--
ALTER TABLE `lt_custom_fields_definition`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lt_custom_fields_values`
--
ALTER TABLE `lt_custom_fields_values`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `lt_feedreader_data`
--
ALTER TABLE `lt_feedreader_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_filtered_content`
--
ALTER TABLE `lt_filtered_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_gallery_albums`
--
ALTER TABLE `lt_gallery_albums`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_gallery_resources`
--
ALTER TABLE `lt_gallery_resources`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_global_articles_categories`
--
ALTER TABLE `lt_global_articles_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_host_blocking_rules`
--
ALTER TABLE `lt_host_blocking_rules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_mailcentre_sent`
--
ALTER TABLE `lt_mailcentre_sent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_mylinks`
--
ALTER TABLE `lt_mylinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_mylinks_categories`
--
ALTER TABLE `lt_mylinks_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_permissions`
--
ALTER TABLE `lt_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `lt_phpbb2_users`
--
ALTER TABLE `lt_phpbb2_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_polls`
--
ALTER TABLE `lt_polls`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_poll_votes`
--
ALTER TABLE `lt_poll_votes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_referers`
--
ALTER TABLE `lt_referers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `lt_tmp_users_permissions`
--
ALTER TABLE `lt_tmp_users_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_users`
--
ALTER TABLE `lt_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_users_permissions`
--
ALTER TABLE `lt_users_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
