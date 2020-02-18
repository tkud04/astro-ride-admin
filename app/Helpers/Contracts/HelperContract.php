<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmailSMTP($data,$view,$type);
        public function createUser($data);

        public function bomb($data);
        public function appLogin($data);
        public function appSignup($data);
        public function appSync($data);
        public function appSyncSend($data);
        public function appSyncReceive($data);
        public function isValidUser($data);
        public function clearData($user);
		public function checkNumber($num);
}
 ?>