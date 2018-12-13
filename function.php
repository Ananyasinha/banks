https://www.thesoftwareguy.in/how-to-generate-pdf-file-with-php/

<?php  $pfd_url = base_url().'salesorder/salesinvoicepdf'; ?>
    <button type="button" data-tooltip="PDF Download"  title="PDF Download" onclick="pdfdownload('<?php echo $pfd_url;?>')" data-original-title="PDF" class="btn btn-primary btn-xs waves-effect waves-light border-lt">
        <i class="icofont icofont-file-pdf"> </i>
    </button>

<?php 
	public function salesinvoicepdf(){
		if($this->session->userdata('salesorder_id_ses') == ""){  
			$salesorder_id = $this->input->post('salesorder_id');
			$this->data['nature'] = 'downloadpfdfile';
			$this->session->unset_userdata('invoice_id_ses');
		}else{
			$salesorder_id = $this->session->userdata('salesorder_id_ses');
			$this->data['nature'] = 'storepfdfile';
			$this->session->unset_userdata('salesorder_id_ses');
		}
		$this->data['franchise_details']	= $this->salesmodel->franchiseorderdetails($salesorder_id);
		$this->data['franchise_basic_data'] = $this->salesmodel->franchisebasicorder($salesorder_id);
		$this->data['invoice_basic_data'] = $this->salesmodel->getbasicorderdata($salesorder_id);
		$this->data['invoice_product_data'] =  $this->salesmodel->getsalesproductdata($salesorder_id);
		$this->data['invoice_basic_data1']  = $this->salesmodel->getcompanybasicdata($salesorder_id);
		$this->data['title'] = 'PDF Generate ';
		$this->load->view("companymodule/salesinvoice_pdf", $this->data);
	}




?>