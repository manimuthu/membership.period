<?php

class CRM_History_Page_HistoryPage extends CRM_Core_Page {
   var $cid=0;
   var $membership_id=0;

  public function run() {

  if(isset($_GET['cid']))
	$this->cid=$_GET['cid'];
  if(isset($_GET['membership_id']))
	$this->membership_id=$_GET['membership_id'];

    // Get User name from the contact id
    $query="select display_name from civicrm_contact where id={$this->cid}";    
    $dao = CRM_Core_DAO::executeQuery($query);
    $dao->fetch();
    $username=$dao->display_name;
    CRM_Utils_System::setTitle(ts("$username - Membership Periods"));

    $this->assign('periods',$this->getMembershipPeriod($this->membership_id)); 
    parent::run();
  }
  public function getMembershipPeriod($membership_id) {

    $query="SELECT pr.start_date,pr.end_date, p.contribution_id,p.membership_id 
		FROM civicrm_membershipperiod pr 
		INNER JOIN civicrm_membership_payment p ON pr.membership_id= p.membership_id
		where p.membership_id=$membership_id";

 $query="SELECT pr.start_date,pr.end_date
		FROM civicrm_membershipperiod pr 
		where pr.membership_id=$membership_id";

    $dao = CRM_Core_DAO::executeQuery($query);
    $i=0;//$cid=$this->cid;
    $validation_array=array();
    while ($dao->fetch()) {
      $data=[];
      $data['sno']=++$i;
      $data['start_date']=$dao->start_date;
      $data['end_date']=$dao->end_date;

//      $link="<a title='View Contribution' class='action-item crm-hover-button' href='./contact/view/contribution?reset=1&id=$contribution_id&cid=$cid&action=view&context=home&selectedChild=contribute'>Deatails</a>";

      $membership[]=$data;
  }

    return $membership;
  }
}
