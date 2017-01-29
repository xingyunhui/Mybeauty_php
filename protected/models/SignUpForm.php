<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SignUpForm extends CFormModel
{
	public $username;
	public $password;
        public $repassword;
        public $email;
        public $verifyCode;

        public $_identity;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, repassword,email', 'required'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			array('repassword', 'authenticate'),
                        //verifCode needs to be;
                        array('verifyCode','captcha','allowEmpty'=>!CCaptcha::checkRequirements()),
                        //email must be valid;
                        array('email','email'),
                        //email uniq
                        array('email','unique', 'message' => '邮箱名已存在.'),
		);
	}


        public function actions()
        {
            return array(
             // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                 'class'=>'CCaptchaAction',
                 'backColor'=>0xf4f4f4,
                 'padding'=>0,
                 'height'=>30,
                 'maxLength'=>4,
                ),
            );
        }

	/**
	 * Declares attribute labels.
	 */
#	public function attributeLabels()
#	{
#		return array(
#			'rememberMe'=>'Remember me next time',
#		);
#	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function signUp()
	{
              $usernames = Yii::app()->cache->smembers('username');
              if (isset($usernames)){
                   if(in_array($this->username,$usernames)){
                       return FALSE;//username已经注册过，todo!! 提示
                   }
                   else{
                      Yii::app()->cache->sadd('username',$this->username);
                   }
              }
              if ($this->password != $this->repassword){
                  return FALSE;
              }
              
              $db = new SignUpDBForm;
              $db->created_at = time();
              $db->updated_at = time();
              $db->username = $this->username;
              $db->password_hash = md5($this->password);
              $db->email = $this->email;             
              $db->role = 1;
              $db->status = 1;
              $db->save();
              return TRUE;
	}
 
}
