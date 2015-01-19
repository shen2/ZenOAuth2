ZenOAuth2
=========

一个更好更完善的OAuth2访问库

## 库的基本说明
*  oauth client类：集成了对授权后的各种访问借口如get、post
*  oauth OAuth2Abstract类：一个抽象类包含了如何授权，获取token的基本操作
*  各种平台类包括weibo、qq、renren

## 一个微博授权登陆实例

> 部分代码如下：
前往微博登陆
```
$config = require APPLICATION_PATH . '/configs/weibo.php';
		$oauth = new ZenOAuth2\WeiboOAuth2($config['akey'], $config['skey']);  //初始化oauth
		$params = array(
			'client_id'		=> $config['akey'],
			'redirect_uri'	=> SERVER . 'weibo/connect/',//设置回调
			'response_type'	=> 'code',
			'state'			=> $state,
			'display'		=> null,
			'scope'			=> $config['scope'],
		);
		if(isset($sessionArray['forcelogin']))
			$params['forcelogin'] = $sessionArray['forcelogin'];
		$detect = new Mobile_Detect();
		// Exclude tablets.
		if ($detect->isMobile() && !$detect->isTablet())
			$params['display'] = 'mobile';
		$this->_redirect($oauth->authorizeURL() . "?" . http_build_query($params));
```
>  授权获取数据:
 ```
 keys = array(
			'code'	=> $_REQUEST['code'],
			'redirect_uri'=>SERVER . 'weibo/connect/',
		);
		$token = $oauth->getAccessToken('code', $keys);  //获取token
		$client = new ZenOAuth2\WeiboClient($token['access_token']);
		$info = $client->get('users/show', array('uid'=>$token['uid']));  //根据token获取数据
```
