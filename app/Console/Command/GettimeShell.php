<?php 
class GettimeShell extends AppShell {
	 public $uses = array('Time');
    public function main() {

    	$unixtime = file_get_contents('http://tuyennq.codelovers.vn:8080/time.php');
    	$time = date("Y-m-d\TH:i:s\Z",$unixtime);
        $newTime['Time']['time']= $time; 
        $this->Time->save($newTime);


    }
}
?>