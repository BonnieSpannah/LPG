<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User managemenent module 
 *
 * @author Mutinda Boniface <bmutinda.com>
 * @project SmartInsurance 
 * @copyright 2015
 */
class User_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Logins a user to the system 
	 *
	 * @identity string  
	 * @password string 
	 * @return boolean 
	 */
	public function attemptLogin( $identity, $password ){
		if ( empty( $identity) || empty( $password )) {
			return false;
		}

		$user = $this->db->select('*')
		    ->from('users')
		    ->where('email', $identity)
		    ->get()
		    ->row();

		if ( count($user) > 0 ) {
			$response = self::verifyLogin( $user, $password);
			if ($response == 'success'){
				$this->set_user( $user );
			}return $response;
		} else {
			return "FAIL - user <b>{$identity}</b> does NOT exist!";
		}
		return false;
	}

    //====================================================================
	public static function verifyLogin( $row, $password ){
        $status = 0;
        $message = "Error while logging in. Try again or contact the administrator";
        $data = array();
        $access_token = null;

                if ( $row->status == 0 ) {
                    $message = "FAIL - user <b> {$row->email}</b> is NOT activated!";
                }else{
                    if ( ! self::compareHashValue( $password, $row->password ) ) {
                        $message = "FAIL - invalid Email/Password combination!";
                    }else{
                        $status = 1;
                        $message = "success";
                        $data = $row;
                        $access_token = self::generateAccessToken( $row->user_id );
                    }
                }
        return $message;
       /* return array(
            "status"=>$status,
            "message"=>$message,
            "access_token"=>$access_token,
            "data"=>$data
        );*/
    }

    public static function compareHashValue( $plain_password, $hashed_password ){
        $bcrypt = new Bcrypt();
        return  $bcrypt->verify( $plain_password, $hashed_password );
    }

    public static function generateAccessToken( $user_id ){
        $bcrypt = new Bcrypt();
        return $bcrypt->hash("SM_".$user_id)."_LP";
    }
    //====================================================================

	/**
	 * Checks whether their is a currently logged in user 
	 * 
	 * @return boolean 
	 */
	public function is_logged_in(){
		return $this->session->userdata("isLoggedIn");
	}

	/**
	 * Set the user who is loggin in to the session. Triggered during login 
	 *
	 * @user_data array - An array containing user information 
	 * @return array - user()
	 */
	private function set_user( $user_data = array() ){
		$data  = array();
		$user_type = "HQ Admin";
		$user_role = "VIVO Energy (<i>$user_type</i>)";
		if ($user_data->user_type == 2){
			$depot = self::getDepot($user_data->depot_id);

			$user_type = "Depot Admin";
			$user_role = "$depot->name (<i>$user_type</i>)";
		}
		$data["user_id"] = $user_data->user_id;
		$data["user_type_id"] = $user_data->user_type;
		$data["user_type"] = $user_type;
		$data["user_role"] = $user_role;
		$data["company_id"] = $user_data->company_id;
		$data["depot_id"] = $user_data->depot_id;
		$data["first_name"] = $user_data->first_name;
		$data["middle_name"] = $user_data->middle;
		$data["last_name"] = $user_data->last_name;
		$data["full_name"] = $user_data->first_name." ".$user_data->last_name;		
		$data["email"] = $user_data->email;
		$data["phone"] = $user_data->phone;
		$data["status"] = $user_data->status;
		$data["date_created"] = $user_data->date_created;
		$data["isLoggedIn"] = TRUE;
		$this->session->set_userdata( $data ) ;
		return true;
	}

	public function getDepot($depot_id){
		return $depot = $this->db->select('*')
		    ->from('company_depots')
		    ->where('id', $depot_id)
		    ->get()
		    ->row();
	}

	/**
	 * Flushs all the logged in user sessions 
	 *
	 * @return boolean 
	 */
	public function logout( ){
		$this->session->sess_destroy();
		return true;
	}

	/**
	 * Get the current logged in user data 
	 *
	 * @return array
	 */
	public function user(){
		return $this->session->all_userdata();
	}

	/**
	 * Request for a new password 
	 *
	 * @identity string
	 * @return array - status and message 
	 */
	public function forgotten_password( $identity ){

	}

	/**
	 * Update the currently logged in user password with the new password 
	 *
	 * @new_password string
	 * @return array - status and message 
	 */
	public function update_password( $new_password ){
	}

}

?>