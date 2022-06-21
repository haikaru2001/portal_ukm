<?php
// include('class.Mail.php');
class Broadcast extends koneksi{

    private $id =0;
    private $pengirim ='';
    private $namapengirim ='';
    private $judul ='';
    private $isi ='';
    private $status ='';
    private $penerima ='';
    private $id_ukm =0;
    private $ukm ='';
    private $date ='';
    private $reason ='';
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
    
    public function addBroadcast()
    {
        $this->connect();
        $sql = "INSERT INTO broadcast(id_broadcast, pengirim, judul, isi, penerima, id_ukm, date) values ($this->id,'$this->pengirim', '$this->judul', '$this->isi','$this->penerima',$this->id_ukm, '$this->date')";
			$this->hasil = mysqli_query($this->connection, $sql);
    }

    public function setStatus()
    {
        $sql = "UPDATE broadcast SET status = '$this->status', reason = '$this->reason' where id_broadcast = $this->id";
        $this->hasil = mysqli_query($this->connection, $sql);
    }

    public function editBroadcast()
    {
        $sql = "UPDATE broadcast SET judul='$this->judul', isi='$this->isi',penerima='$this->penerima', date='$this->date'";
        $this->hasil = mysqli_query($this->connection, $sql);
    }

    public function deleteBroadcast()
    {
        $sql = "DELETE FROM broadcast WHERE id_broadcast=$this->id";
        $this->hasil = mysqli_query($this->connection, $sql);
    }

    public function getAllBroadcast()
    {
        $this->connect();
        $sql = "SELECT b.*, u.name as nama FROM broadcast b INNER JOIN user u ON b.pengirim = u.nim";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		$arrResult = Array();
		$i=0;
        if(mysqli_num_rows($result) > 0){
            while($data = mysqli_fetch_array($result))
            {
                $broadcast = new Broadcast();
                $broadcast->id = $data['id_broadcast'];
                $broadcast->pengirim = $data['pengirim'];
                $broadcast->namapengirim = $data['nama'];
                $broadcast->judul = $data['judul'];
                $broadcast->isi = $data['isi'];
                $broadcast->status = $data['status'];
                $broadcast->penerima = $data['penerima'];
                $broadcast->id_ukm = $data['id_ukm'];
                $broadcast->date = $data['date'];
                $broadcast->reason = $data['reason'];
                $arrResult[$i] = $broadcast;
                $i++;
            }
        }
        return $arrResult;

    }

    public function getAllBroadcastMe()
    {
        $this->connect();
        $sql = "SELECT b.*, u.name as nama FROM broadcast b INNER JOIN user u ON b.pengirim = u.nim WHERE pengirim='$this->id'";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		$arrResult = Array();
		$i=0;
		if(mysqli_num_rows($result)>0){
			while($data = mysqli_fetch_array($result))
			{
                $broadcast = new Broadcast();
                $broadcast->id = $data['id_broadcast'];
                $broadcast->pengirim = $data['pengirim'];
                $broadcast->namapengirim = $data['nama'];
                $broadcast->judul = $data['judul'];
                $broadcast->isi = $data['isi'];
                $broadcast->status = $data['status'];
                $broadcast->penerima = $data['penerima'];
                $broadcast->id_ukm = $data['id_ukm'];
                $broadcast->date = $data['date'];
                $broadcast->reason = $data['reason'];
                $arrResult[$i] = $broadcast;
                $i++;
            }
        }
        return $arrResult;
    }
}

?>