<?php 
	class User extends koneksi
	{
        private $id =''; 
		private $name='';
		private $email='';
		private $password='';			
		private $id_role=0;
		private $role='';
		private $id_ukm=0;
		private $ukm='';
		private $sex = '';
        private $notelp = '';
        private $foto ='';
        private $status = '0';
        private $bio ='';
		private $sum = 0;
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

        public function AddUser(){
			$this->connect();
			$sql = "INSERT INTO user(nim, name, email, sex, notelp, pass, id_ukm, id_role) 
		            values ('$this->id','$this->name', '$this->email', '$this->sex','$this->notelp','$this->password', $this->id_ukm, $this->id_role)";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}
		public function UpdateUser(){
			$sql = "UPDATE user SET nim='$this->id', name='$this->name', email='$this->email', sex='$this->sex', notelp='$this->notelp', id_ukm=$this->id_ukm, id_role=$this->id_role WHERE nim='$this->id'";
			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}

		public function PromoteUser(){
			$sql = "UPDATE user SET id_role =$this->id_role WHERE nim='$this->id'";
			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';
			
		}
		public function EditProfile(){
			$sql = "UPDATE user SET nim='$this->id', name='$this->name', email='$this->email', sex='$this->sex', notelp='$this->notelp', id_ukm=$this->id_ukm, id_role=$this->id_role, foto='$this->foto', bio = '$this->bio' WHERE nim='$this->id'";
			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}

		
		public function changePassword(){
			$sql = "UPDATE user SET pass='$this->password' where nim='$this->id'";	$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';
		}
		
        public function DeleteUser(){
			$sql = "DELETE FROM user WHERE nim='$this->id'";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';				
		}

		public function loginUser(){
			$sql = "UPDATE user set status = 1 WHERE nim='$this->id'";
			$this->hasil = mysqli_query($this->connection, $sql);
		}

		public function logoutUser(){
			$sql = "UPDATE user set status = 0 WHERE nim='$this->id'";
			$this->hasil = mysqli_query($this->connection, $sql);
		}

        public function Validate($id){
			$this->connect();
			$sql = "SELECT * FROM user WHERE nim='$id' OR email = '$id'";
			$resultOne = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->id=$data['nim'];
				$this->name = $data['name'];
				$this->email=$data['email'];
				$this->password=$data['pass'];						
				$this->id_role=$data['id_role'];
				$this->id_ukm=$data['id_ukm'];
				$this->status=$data['status'];
				return true;		
			}							
		}

		public function SelectAllUser(){
			$this->connect();
			$sql = "SELECT a.*, b.nama as nama_role, c.nama as nama_ukm from user a, role b, ukm c where a.id_role = b.id_role AND a.id_ukm = c.id_ukm;";
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			
			$arrResult = Array();
			$i=0;
			if(mysqli_num_rows($result)>0){
				while($data = mysqli_fetch_array($result))
				{
					$objUser = new User();
					$objUser->id=$data['nim'];
					$objUser->name=$data['name'];
					$objUser->email=$data['email'];
					$objUser->password=$data['pass'];
					$objUser->id_role=$data['id_role'];
					$objUser->role=$data['nama_role'];
					$objUser->id_ukm=$data['id_ukm'];
					$objUser->ukm=$data['nama_ukm'];
					$objUser->status=$data['status'];
					$objUser->notelp=$data['notelp'];
					$objUser->sex=$data['sex'];
					$objUser->foto=$data['foto'];
					$objUser->bio=$data['bio'];
					$arrResult[$i] = $objUser;
					$i++;
				}
			}
			return $arrResult;
		}

		public function SelectAllUserByUkm($ukm){
			$this->connect();
			$sql = "SELECT * From v_user where id_ukm = $ukm order by nim";
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
			
			$arrResult = Array();
			$i=0;
			if(mysqli_num_rows($result)>0){
				while($data = mysqli_fetch_array($result))
				{
					$objUser = new User();
					$objUser->id=$data['nim'];
					$objUser->name=$data['name'];
					$objUser->email=$data['email'];
					$objUser->password=$data['pass'];
					$objUser->id_role=$data['id_role'];
					$objUser->role=$data['nama_role'];
					$objUser->id_ukm=$data['id_ukm'];
					$objUser->ukm=$data['nama_ukm'];
					$objUser->status=$data['status'];
					$objUser->notelp=$data['notelp'];
					$objUser->sex=$data['sex'];
					$objUser->foto=$data['foto'];
					$objUser->bio=$data['bio'];
					$arrResult[$i] = $objUser;
					$i++;
				}
			}
			return $arrResult;
		}

		public function SelectUserByNim($nim){
			$this->connect();
			$sql = "SELECT a.*, b.nama as nama_role, c.nama as nama_ukm from user a, role b, ukm c where a.id_role = b.id_role AND a.id_ukm = c.id_ukm AND nim='$nim' order by nim";
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			
			if(mysqli_num_rows($result)==1){
				$data = mysqli_fetch_assoc($result);
				$this->id=$data['nim'];
				$this->name=$data['name'];
				$this->email=$data['email'];
				$this->password=$data['pass'];
				$this->id_role=$data['id_role'];
				$this->role=$data['nama_role'];
				$this->id_ukm=$data['id_ukm'];
				$this->ukm=$data['nama_ukm'];
				$this->status=$data['status'];
				$this->notelp=$data['notelp'];
				$this->sex=$data['sex'];
				$this->foto=$data['foto'];
				$this->bio=$data['bio'];
			}
		}

		public function SelectUserByMail($mail){
			$this->connect();
			$sql = "SELECT a.*, b.nama as nama_role, c.nama as nama_ukm from user a, role b, ukm c where a.id_role = b.id_role AND a.id_ukm = c.id_ukm AND email='$mail' order by nim";
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			
			if(mysqli_num_rows($result)==1){
				$data = mysqli_fetch_assoc($result);
				$this->id=$data['nim'];
				$this->name=$data['name'];
				$this->email=$data['email'];
				$this->password=$data['pass'];
				$this->id_role=$data['id_role'];
				$this->role=$data['nama_role'];
				$this->id_ukm=$data['id_ukm'];
				$this->ukm=$data['nama_ukm'];
				$this->status=$data['status'];
				$this->notelp=$data['notelp'];
				$this->sex=$data['sex'];
				$this->foto=$data['foto'];
				$this->bio=$data['bio'];
			}
		}

		public function SelectAllUserByUkmNim($ukm,$nim){
			$this->connect();
			$sql = "SELECT a.*, b.nama as nama_role, c.nama as nama_ukm from user a, role b, ukm c where a.id_role = b.id_role AND a.id_ukm = c.id_ukm AND nim='$nim' AND id_ukm = $ukm order by nim";
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			
			if(mysqli_num_rows($result)==1){
				$data = mysqli_fetch_assoc($result);
				$this->id=$data['nim'];
				$this->name=$data['name'];
				$this->email=$data['email'];
				$this->password=$data['pass'];
				$this->id_role=$data['id_role'];
				$this->id_ukm=$data['id_ukm'];
				$this->status=$data['status'];
				$this->notelp=$data['notelp'];
				$this->sex=$data['sex'];
				$this->foto=$data['foto'];
				$this->bio=$data['bio'];
			}
		}


		public function countUserByUkm($ukm)
		{
			$this->connect();
			$sql = "SELECT * FROM user where id_ukm = $ukm";
			$result = mysqli_query($this->connection, $sql);
			$objsum = new User();
			$objsum->sum = mysqli_num_rows($result);
			return $objsum->sum;
		}
    }