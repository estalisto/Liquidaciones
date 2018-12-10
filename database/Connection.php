<?php

//require_once('configuracion/configuracion.php');
class Connection{

		protected $isConn;
		public $datab;
		protected $transaction;
        protected $username;
        protected $password;
        protected $host;
        protected $dbname;




	    //public function __construct($username="admin", $password ="admin", $host="10.150.14.73", $dbname="prodvm01", $options = []){
        //public function __construct($username="root", $password ="3l3m3nt0linux", $host="localhost", $dbname="prodvm01", $options = []){
		//  public function __construct($username=USERDB, $password =PASSDB, $host=HOSTDB, $dbname=INSTANCIADB, $options = []){
        public function __construct($username="root", $password ="", $host="localhost", $dbname="prodvm01", $options = []){
         //public function __construct($username="root", $password ="123456", $host="localhost", $dbname="prodvm01", $options = []){
	   //  public function __construct($username="root", $password ="", $host="localhost", $dbname="prodvm01", $options = []){
		$this->isConn = TRUE;
		try{
                        //mysql_query("SET NAMES 'utf8'");
			$this->datab = new PDO("mysql:host={$host};  dbname={$dbname}; charset=utf8;", $username, $password, $options);
                        $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->transaction = $this->datab;
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			//echo 'Connected Successfully!!!';

                        $this->username = $username;
                        $this->password = $password;
                        $this->host     = $host;
                        $this->dbname   = $dbname;

		}catch(PDOException $e){
			throw new Exception($e->getMessage());
		}

	}//endDefaultConstructor


	//disconnect from db
	public function Disconnect(){
		$this->datab = NULL;//close connection in PDO
		$this->isConn = FALSE;
	}//endDisconnectFunction





}//endClassDatabase

 //$con = new Connection(); //for debugging only
//echo '	debug connection';
?>
