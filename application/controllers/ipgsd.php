<?php
class Ipgsd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('table');
		$this->load->database('');
		$this->load->helper('file');
		$this->load->library('session');
















	}

    public function index() {
	    $this->session->unset_userdata('acct');     //unset account8 becouse of pegenation 
		if (file_exists('./reports/csv_report.csv')){ unlink('./reports/csv_report.csv');}   //delete csv_report.csv report file before new one is created
		$this->session->unset_userdata('from_date');
       		$this->session->unset_userdata('to_date');
		$this->load->view('search_form');
						}




	public function start()
	{
$from_date = $_POST['from_month']."/".$_POST['from_day']."/".$_POST['from_year'];
$to_date = $_POST['to_month']."/".$_POST['to_day']."/".$_POST['to_year'];
// $this->load->database('');
/*
$accnt       = $_POST['account_num'];
$from_day    = $_POST['from_day'];
$from_month  = $_POST['from_month'];
$from_year   = $_POST['from_year'];
$to_day      = $_POST['to_day'];
$to_month    = $_POST['to_month'];
$to_year     = $_POST['to_year'];
$report      = $_POST['report'];
*/

/* set settion for account number */
      if (!empty($this->input->post('account_num'))){
      $this->session->set_userdata('acct', $_POST['account_num']);
                                                    }


if ($from_date != "//")
{
  $this->session->set_userdata('from_date', $from_date);
 $this->session->set_userdata('to_date', $to_date);
}

$from_m = $this->session->userdata('from_date');
$to_m = $this->session->userdata('to_date');



/* errors */
/* Dispaly day error  */
if ($_POST['from_year'] > $_POST['to_year']) { $this->session->set_flashdata('status','Check Year range');  redirect('/ipgsd/', 'refresh');} 
if ($_POST['from_year'] == $_POST['to_year'] && $_POST['from_month'] > $_POST['to_month'] ) {$this->session->set_flashdata('status','Check Month range');  redirect('/ipgsd/', 'refresh');} 
if ($_POST['from_year'] == $_POST['to_year'] && $_POST['from_month'] == $_POST['to_month'] && $_POST['from_day'] > $_POST['to_day']) {$this->session->set_flashdata('status','Check Day range');  redirect('/lipgsd/', 'refresh');} 

/* get number of rows */
$sql = "STR_TO_DATE(`Report Date`,  '%d/%m/%Y' ) BETWEEN  STR_TO_DATE('$from_m', '%d/%m/%Y') AND  STR_TO_DATE('$to_m', '%d/%m/%Y')";
     $this->db->where($sql);






/* --- cash flow report ---NUM ROWS */
$this->db->where("(Blotter_Code='AC' AND Trans_Code='DCD' OR Trans_Code='DCW')", NULL, FALSE);




/*
$where = "Blotter_Code=AC AND Trans_Code='DCD' OR Trans_Code='DCW'";
$this->db->where($where);


$where_1 = "Blotter_Code='FF' AND Trans_Code='DWT' OR status='DDP'";
$this->db->or_where($where_1); 

$where_2 = "Blotter_Code='RF' AND Trans_Code='DCW'";
$this->db->or_where($where_2); 

$where_3 = "Blotter_Code='CC' AND Trade Entry Field!='DCD'";
$this->db->or_where($where_3); 


*/










/******************************/










     
$data['num_rows'] =  $this->db->get_where('transactions_archive', array('Account8' => $this->session->userdata('acct')))->num_rows();

/* start pagenation */
$this->load->library('pagination');

$config['base_url'] = 'http://localhost/ipgsd_query/index.php/ipgsd/start/';
//$config['base_url'] = 'http://10.10.10.226/dev/index.php/ipgsd/start/';
$config['total_rows'] = $data['num_rows'];
$config['per_page'] = 20;
$config['num_links'] = 5;


$this->pagination->initialize($config);
/*   query by day   */
$sql = "STR_TO_DATE(`Report Date`,  '%d/%m/%Y' ) BETWEEN  STR_TO_DATE('$from_m', '%d/%m/%Y') AND  STR_TO_DATE('$to_m', '%d/%m/%Y')";
     $this->db->where($sql);
     
/* --- cash flow report ---BY DAY  */
$this->db->where("(Blotter_Code='AC' AND Trans_Code='DCD' OR Trans_Code='DCW')", NULL, FALSE);








$data['q'] =  $this->db->get_where('transactions_archive', array('Account8' => $this->session->userdata('acct')),$config['per_page'], $this->uri->segment(3));


/*-----------adder Fridat dec 05---------------*/
if (!file_exists('./reports/csv_report.csv'))												{   //if file does not exist create it. if not then no.
/*   query by day   */
$sql = "STR_TO_DATE(`Report Date`,  '%d/%m/%Y' ) BETWEEN  STR_TO_DATE('$from_m', '%d/%m/%Y') AND  STR_TO_DATE('$to_m', '%d/%m/%Y')";
     $this->db->where($sql);
     
/* --- cash flow report ---FOR CSV REPORT */
$this->db->where("(Blotter_Code='AC' AND Trans_Code='DCD' OR Trans_Code='DCW')", NULL, FALSE);





$data['csv'] =  $this->db->get_where('transactions_archive', array('Account8' => $this->session->userdata('acct')));   // csv export query no limits for pegenation




	/*-----added Friday Dec 05 ---------
	*  export to csv
	*  
	*
	*/
	$this->load->dbutil();
 
	$delimiter = ",";
	$newline = "\r\n";
   
    write_file('./reports/csv_report.csv', $this->dbutil->csv_from_result($data['csv']));   }
	
/*----------end of csv generator--------------------------------------------*/

$data["links"] = $this->pagination->create_links();


$this->load->view('ipgsd_view', $data);		
		
		
	}
		public function csvgenerator()
   {
	$this->load->helper('download');
	$data = file_get_contents("./reports/csv_report.csv"); // Read the file's contents
	$name = 'csv_report.csv';
	force_download($name, $data); 
//	$this->load->view('search_form');
   }

	



}
