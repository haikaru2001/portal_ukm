<?php 

	class User extends Connection
	{
        private $nim =0; 
		private $nama='';
		private $email='';
		private $password='';			
		private $role='';
		private $idrole=0;
        private $ukm='';
		private $idukm=0;	
		private $sex = '';
        private $telp = '';
        private $foto ='';
        private $status = '0';
        private $bio ='';
        private $hasil = false;

        public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
			}
		}
	
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}

        public function AddAccount(){
			
			$sql = "INSERT INTO user(nim, nama, email, sex, notelp, password) 
		            values ('$this->nim','$this->nama', '$this->email', '$this->sex','$this->telp','$this->password')";
			$this->hasil = mysqli_query($this->connection, $sql);
			$this->nim = $this->connection->insert_id;	
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}

        public function DeleteAccount(){
			$sql = "DELETE FROM user WHERE nim=$this->nim";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';				
		}


        public function Validate($nim){
			$sql = "SELECT * FROM user WHERE nim='$nim'";    
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nim=$data['nim'];
				$this->nama = $data['nama'];				
				$this->email=$data['email'];
				$this->password=$data['password'];										
				$this->idrole=$data['id_role'];							
				return true;		
			}							
		}
    }