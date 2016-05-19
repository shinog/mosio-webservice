<?php

    
App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::import('Vendor', 'facebook', 
   array('file' => 'facebook/src/facebook.php')
);    


class FacebookAuthenticate extends BaseAuthenticate {

  
  public $settings = array(
    
      'fields' => array(
      'fbUserId'      => 'fb_user_id',
      'fbToken' => 'fb_token'
    ),
    'userModel' => 'User',
    'fbScope' => 'publish_stream,
  );

  public function authenticate(CakeRequest $request, CakeResponse $response) {

     try{
	      $facebook = new Facebook(array(
			  'appId' => $this->settings['fbAppId'],
			  'secret' => $this->settings['fbAppSecret'],
			  'cookie' => true
			  ));

		   switch ($request->params['action']){
		     case 'login':
				$login_url = $facebook->getLoginUrl(array(
					'redirect_uri' => $this->settings['fbRedirect'],
					'scope' => $this->settings['fbScope'],
				));
				$response->header('Location', $login_url);
				$response->send();
				break;
			
			case 'callback':
				 return $this->_fb_update_user(
					 $user_id = $facebook->getUser(),
					 $facebook->getAccessToken()
				);
				break;
	    }
		} catch(OAuthExeption $e){
		     debug($e);
		}
	}
	
	
	private function _fb_update_user($user_id, $token){
		 $fields = $this->settings['fields'];
		 $model_name = $this->settings['userModel'];
		 
		 $model = ClassRegistry::init($model_name);
		 $user = $model->find(
		     'first',
			 array(
				 'conditions' => array(
					 $model_name.'.'.$fields['fbUserId'] => $user_id
				),
				'recursive' => 0
				)
		);
		if (empty($user) || empty($user[$model_name])){
			$model->create();
			$user = array(
				 $model_name => array(
					 $fields['fbUserId'] => $user_id,
					 $fields['fbToken'] => $token,
			));
		} else{
		    $user[$model_name][$fields['fbToken']] = $token;
		}
		return $model->save($user);
	}
}


			
		
		