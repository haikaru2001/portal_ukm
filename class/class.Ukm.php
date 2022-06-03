<?php 
	class Ukm extends koneksi
	{
		private $id =0;
		private $ukm = '';		
		private $hasil = false;
		private $message ='';

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
				
		public function Addukm(){
			$sql = "INSERT INTO ukm(nama) 
		            values ('$this->ukm')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function Updateukm(){
			$sql = "UPDATE ukm SET nama ='$this->ukm'
					WHERE id_ukm = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}
		
		public function Deleteukm(){
			$sql = "DELETE FROM ukm WHERE id_ukm = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllukm(){
			$sql = "SELECT * FROM ukm";
				
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objukm = new Ukm(); 
					$objukm->id=$data['id_ukm'];
					$objukm->ukm=$data['nama'];
					$arrResult[$cnt] = $objukm;
					$cnt++;
				}
			}
			return $arrResult;			
		}

		
		
		public function SelectOneukm(){
			$sql = "SELECT * FROM ukm WHERE id_ukm='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->ukm = $data['ukm'];				
							
			}							
		}
 	}	 
?>
