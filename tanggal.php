<?php
	/**
	  * 
	  */
	 class Tanggal
	 {
	 	
	 	function hari(){
	 		// code...
	 		$hari = date('D');
          	switch ($hari) {
	            case 'Sun':
	              $hari = "Minggu";
	            break;
	         
	            case 'Mon':     
	              $hari = "Senin";
	            break;
	         
	            case 'Tue':
	              $hari = "Selasa";
	            break;
	         
	            case 'Wed':
	              $hari = "Rabu";
	            break;
	         
	            case 'Thu':
	              $hari = "Kamis";
	            break;
	         
	            case 'Fri':
	              $hari = "Jumat";
	            break;
	         
	            case 'Sat':
	              $hari = "Sabtu";
	            break;
	            
	            default:
	              $hari = "";   
	            break;
          	}
          return $hari;
        }

        function tanggal(){
        	return $tanggal = date('d');
        }

        function bulan(){
        	$bulan = date('n');
          	switch ($bulan) {
	            case 1:
	              $bulan = "Januari";
	            break;

	            case 2:
	              $bulan = "Februari";
	            break;

	            case 3:
	              $bulan = "Maret";
	            break;

	            case 4:
	              $bulan = "April";
	            break;

	            case 5:
	              $bulan = "Mei";
	            break;

	            case 6:
	              $bulan = "Juni";
	            break;

	            case 7:
	              $bulan = "Juli";
	            break;

	            case 8:
	              $bulan = "Agustus";
	            break;

	            case 9:
	              $bulan = "September";
	            break;

	            case 10:
	              $bulan = "Oktober";
	            break;

	            case 11:
	              $bulan = "November";
	            break;

	            case 12:
	              $bulan = "Desember";
	            break;
	            
	            default:
	              $bulan = "";   
	            break;
	        }
	        return $bulan;
        }

        function tahun(){
        	return $tahun = date('Y');
        }          
	} 
?>