
<?php
 
 
 class country
{

private $id;
private $name;

public function getCID(){
return $this->id;
}
public function setCID($idd){
$this->id = $idd;
}
public function getNAME(){
return $this->name;
}
public function setNAME($nm){
$this->name = $nm;
}

 //-------------------------------------------------- --------------------------------------------------
function addcountry($name, $mysqli){
 $mysqli->query("INSERT INTO tbl_country(name) VALUES ('$name')");
}
//------------------------------------------------------------------------------------------------------


}


 class agency
{

private $id;
private $name;
private $contact;
private $email;

public function getCID(){
return $this->id;
}
public function setCID($idd){
$this->id = $idd;
}
public function getNAME(){
return $this->name;
}
public function setNAME($nm){
$this->name = $nm;
}
 public function getCONTACT(){
return $this->contact;
}
public function setCONTACT($cnt){
$this->contact = $cnt;
}
 public function getEMAIL(){
return $this->email;
}
public function setEMAIL($em){
$this->email = $em;
}
 //-------------------------------------------------- --------------------------------------------------
function addagency($id,$name,$contact,$email, $mysqli){
 $mysqli->query("INSERT INTO tbl_agency(countryid,name,contact,email) VALUES ('$id','$name','$contact','$email')");
}
//------------------------------------------------------------------------------------------------------

}


class ca
{
private $branchid;
private $countryid;
private $branchname;
private $address;
private $contact;
private $email;
private $district;
private $lat;
private $long;

public function getBID(){
return $this->branchid;
}
public function setBID($bd){
$this->branchid = $bd;
}
public function getCOUNTRY(){
return $this->countryid;
}
public function setCOUNTRY($cid){
$this->countryid = $cid;
}
public function getBNAME(){
return $this->branchname;
}
public function setBNAME($bn){
$this->branchname = $bn;
}
public function getADDR(){
return $this->address;
}
public function setADDR($adr){
$this->address = $adr;
}
public function getCONTACT(){
return $this->contact;
}
public function setCONTACT($ct){
$this->contact = $ct;
} 
public function getBEMAIL(){
return $this->email;
}
public function setBEMAIL($be){
$this->email = $be;
} 
public function getDISTRICT(){
return $this->district;
}
public function setDISTRICT($dde){
$this->district = $dde;
}
public function getLAT(){
return $this->lat;
}
public function setLAT($lati){
$this->lat = $lati;
}
public function getLONG(){
return $this->long;
}
public function setLONG($lon){
$this->long = $lon;
}

 //-------------------------------------------------- --------------------------------------------------
function addCa($countryid,$branchname,$address,$contact,$email,$district,$lat,$long, $mysqli){
 $mysqli->query("INSERT INTO tbl_branch (companyid, branchname, address, contact, email,districtid,latitude,longitude) VALUES ('$countryid', '$branchname','$address','$contact','$email','$district','$lat','$long')");
}
//-------------------------------------------------- --------------------------------------------------

}


class users
{
private $id;
private $utype;
private $uname;
private $pword;
private $salt;
private $email;
private $rdate;
private $branchid;
private $agencyid;
private $contact;
private $session;

public function getUID(){
return $this->id;
}
public function setUID($uid){
$this->id = $uid;
}
public function getUTYPE(){
return $this->utype;
}
public function setUTYPE($utp){
$this->utype = $utp;
}
public function getUNAME(){
return $this->uname;
}
public function setUNAME($unm){
$this->uname = $unm;
}
public function getPWORD(){
return $this->pword;
}
public function setPWORD($pwd){
$this->pword = $pwd;
}
public function getSALT(){
return $this->salt;
}
public function setSALT($slt){
$this->salt = $slt;
}
public function getEMAIL(){
return $this->email;
}
public function setEMAIL($eml){
$this->email = $eml;
}
public function getDATE(){
return $this->rdate;
}
public function setDATE($rdt){
$this->rdate = $rdt;
}
public function getBRANCHID(){
return $this->branchid;
}
public function setBRANCHID($bra){
$this->branchid = $bra;
}
public function getAGENCYID(){
return $this->agencyid;
}
public function setAGENCYID($age){
$this->agencyid = $age;
}
public function getCONTACT(){
return $this->contact;
}
public function setCONTACT($con){
$this->contact = $con;
}
public function getSESSION(){
return $this->session;
}
public function setSESSION($sess){
$this->session = $sess;
}


  //-------------------------------------------------- --------------------------------------------------
function adduser($utype,$uname,$pword,$salt,$email,$rdate,$branchid,$agencyid,$contact,$session, $mysqli){
 $mysqli->query("INSERT INTO users (usertype,username,password,salt,email,date,branchid,agencyid,contact,sessionuser)values('". $utype. "','" . $uname . "', '" . $pword . "', '" . $salt . "','" . $email . "','" . $rdate . "','" . $branchid . "','" . $agencyid . "','" . $contact . "','" . $session . "')");
}
//-------------------------------------------------- --------------------------------------------------


}

//-------------------------------



class products
{

 
/*
-- branch starts here --
*/



private $productcat;
private $productcode;
private $productname;
private $cost;
private $rentalcost;
private $discount;
private $pdate;

private $minlevel;
private $maxlevel;

private $typename;
private $stockqty; 

private $supplier;
private $invoice; 
private $invoicedate;
 

//-------------------------------------------------------

public function getPCAT(){
return $this->productcat;
}
public function setPCAT($pc){
$this->productcat = $pc;
}
public function getPCODE(){
return $this->productcode;
}
public function setPCODE($pcd){
$this->productcode = $pcd;
}
public function getPNAME(){
return $this->productname;
}
public function setPNAME($pn){
$this->productname = $pn;
}
public function getCOST(){
return $this->cost;
}
public function setCOST($ct){
$this->cost = $ct;
}
public function getRCOST(){
return $this->rentalcost;
}
public function setRCOST($rct){
$this->rentalcost = $rct;
}
public function getDISC(){
return $this->discount;
}
public function setDISC($ds){
$this->discount = $ds;
}
public function getDATE(){
return $this->pdate;
}
public function setDATE($dt){
$this->pdate = $dt;
}
public function getMINLEVEL(){
return $this->minlevel;
}
public function setMINLEVEL($mnl){
$this->minlevel = $mnl;
}
public function getMAXLEVEL(){
return $this->maxlevel;
}
public function setMAXLEVEL($mxl){
$this->maxlevel = $mxl;
}
//-----------------------------------------------------

public function getTYPENAME(){
return $this->typename;
}
public function setTYPENAME($typ){
$this->typename = $typ;
}
public function getSTOCKQTY(){
return $this->stockqty;
}
public function setSTOCKQTY($qt){
$this->stockqty = $qt;
}

//---------------------------------------------------
public function getSUPPLIER(){
return $this->supplier;
}
public function setSUPPLIER($sup){
$this->supplier = $sup;
}
public function getINVOICE(){
return $this->invoice;
}
public function setINVOICE($inv){
$this->invoice = $inv;
}
public function getIDATE(){
return $this->invoicedate;
}
public function setIDATE($idt){
$this->invoicedate = $idt;
}
 
/*
-- branch ends here --
*/

  //-------------------------------------------------- --------------------------------------------------
function addproductlevel($productcat,$productcode,$minlevel,$maxlevel,$pdate,$branchid, $mysqli){
 $mysqli->query("INSERT INTO tbl_productlevel(productcat, productcode, minlevel, maxlevel, date,branchid) VALUES ('$productcat', '$productcode','$minlevel','$maxlevel','$pdate','$branchid')");
}
//-------------------------------------------------- --------------------------------------------------
 //-------------------------------------------------- --------------------------------------------------
function addproducttype($typename, $mysqli){
 $mysqli->query("INSERT INTO tbl_producttype (typename) VALUES ('$typename')");
}
//-------------------------------------------------- -------------------------------------------------- 
 //-------------------------------------------------- --------------------------------------------------
function addproduct($productcat,$productcode,$productname,$cost,$rentalcost,$discount,$pdate,$branchid, $mysqli){
 $mysqli->query("INSERT INTO tbl_product(productcat,productcode,productname,cost,rentalcost,discount,date,branchid) VALUES ('$productcat','$productcode','$productname','$cost','$rentalcost','$discount','$pdate','$branchid')");
}
//-------------------------------------------------- -------------------------------------------------- 

 //-------------------------------------------------- --------------------------------------------------
function addstock($productcat,$productcode,$stockqty,$pdate,$branchid, $mysqli){
 $mysqli->query("INSERT INTO tbl_stock(productcat,productcode,stockqty,date,branchid) VALUES ('$productcat','$productcode','$stockqty','$pdate','$branchid')");
}
//-------------------------------------------------- -------------------------------------------------- 

 //-------------------------------------------------- --------------------------------------------------
function addproductpurchase($productcode,$stockqty,$cost,$pdate,$supplier,$invoice,$invoicedate,$branchid, $mysqli){
 $mysqli->query("INSERT INTO tbl_productpurchases(productcode,qty,unitcost,date,supplier,invoice,invoicedate,branchid) VALUES ('$productcode','$stockqty','$cost','$pdate','$supplier','$invoice','$invoicedate','$branchid')");
}
//-------------------------------------------------- -------------------------------------------------- 

 
} // product class end

class flag
{


private $fid;
private $email;
private $comment;
private $sessionuser;
private $rdate;
private $rtime;
private $caseno;


public function getFID(){
return $this->fid;
}
public function setFID($fi){
$this->fid=$fi;
}
public function getCASENO(){
return $this->caseno;
}
public function setCASENO($cas){
$this->caseno=$cas;
}
public function getEMAIL(){
return $this->email;
}
public function setEMAIL($em){
$this->email=$em;
}
public function getCOMMENT(){
return $this->comment;
}
public function setCOMMENT($comm){
$this->comment=$comm;
}
public function getSESSIONUSER(){
return $this->sessionuser;
}
public function setSESSIONUSER($suser){
$this->sessionuser=$suser;
}
public function getDATE(){
return $this->rdate;
}
public function setDATE($rda){
$this->rdate=$rda;
}
public function getTIME(){
return $this->rtime;
}
public function setTIME($rti){
$this->rtime=$rti;
}


 //-------------------------------------------------- --------------------------------------------------
function addflagcomment($caseno,$email,$comment,$rdate,$rtime,$sessionuser, $mysqli){
 $mysqli->query("INSERT INTO tbl_flaggedcomment(caseno,email,comment,rdate,rtime,sessionuser) VALUES ('$caseno','$email','$comment','$rdate','$rtime','$sessionuser')");
}
//-------------------------------------------------- --------------------------------------------------


}
  
/*
-- branch ends here --
*/
class departments
{


private $did;
private $branchid;
private $deptname;
private $cid;
private $companyname; 

private $custtypeid; 
private $custtypename; 
private $custtypedisc; 
private $country;
private $region;

public function getCID(){
return $this->cid;
}
public function setCID($ci){
$this->cid=$ci;
}
public function getCNAME(){
return $this->companyname;
}
public function setCNAME($cnm){
$this->companyname=$cnm;
}

public function getDID(){
return $this->did;
}
public function setDID($di){
$this->did=$di;
}
public function getBID(){
return $this->branchid;
}
public function setBID($bi){
$this->branchid=$bi;
}
public function getDEPTNAME(){
return $this->deptname;
}
public function setDEPTNAME($dn){
$this->deptname=$dn;
} 
 
public function getCUSTTYPEID(){
return $this->custtypeid;
}
public function setCUSTTYPEID($cu){
$this->custtypeid=$cu;
} 
public function getCUSTTYPENAME(){
return $this->custtypename;
}
public function setCUSTTYPENAME($cun){
$this->custtypename=$cun;
} 
public function getCUSTTYPEDISC(){
return $this->custtypedisc;
}
public function setCUSTTYPEDISC($cdis){
$this->custtypedisc=$cdis;
} 
public function getCOUNTRY(){
return $this->country;
}
public function setCOUNTRY($cnt){
$this->country=$cnt;
}

//-------------------------------------------------- --------------------------------------------------
function adddistrict($deptname,$country, $mysqli){
 $mysqli->query("INSERT INTO tbl_district (name,country) VALUES ('$deptname', '$country')");
}
//-------------------------------------------------- --------------------------------------------------

//-------------------------------------------------- --------------------------------------------------
function adddepartment($branchid, $deptname, $mysqli){
 $mysqli->query("INSERT INTO tbl_department (branchid, deptname) VALUES ('$branchid', '$deptname')");
}
//-------------------------------------------------- --------------------------------------------------
 
//-------------------------------------------------- --------------------------------------------------
function addcompany($companyname, $mysqli){
 $mysqli->query("INSERT INTO tbl_company (companyname) VALUES ('$companyname')");
}
//-------------------------------------------------- --------------------------------------------------

//-------------------------------------------------- --------------------------------------------------
function addcustomertype($custtypename,$custtypedisc, $mysqli){
 $mysqli->query("INSERT INTO tbl_customertype (typename,discount) VALUES ('$custtypename','$custtypedisc')");
}
//-------------------------------------------------- --------------------------------------------------


}






class suppliers
{

private $supplier;
private $contact;
private $sdate;

public function getSNAME(){
return $this->supplier;
}
public function setSNAME($sn){
$this->supplier = $sn;
}

public function getCONTACT(){
return $this->contact;
}
public function setCONTACT($ct){
$this->contact = $ct;
}
public function getSDATE(){
return $this->sdate;
}
public function setSDATE($dt){
$this->sdate = $dt;
}

//-------------------------------------------------- --------------------------------------------------

function addsupplier($supplier,$contact,$sdate, $mysqli){
 $mysqli->query("INSERT INTO tbl_supplier (supname,contact,date) VALUES ('$supplier','$contact','$sdate')");
}
//-------------------------------------------------- --------------------------------------------------

}

class suspects
{
private $cid;
private $sid;
private $ca;
private $stationid;
private $ucode;
private $flagno;
private $flagdate;
private $fname;
private $mname;
private $sname;
private $gender;
private $offenceid;
private $districtid;
private $statusid;
private $comment; 
private $rtime; 
private $sessionuser; 
private $dob;
private $residence;
private $contact;
private $nid;
private $nationality;
private $passport;
private $occupation;
private $nok;
private $ncontact;
private $start;
private $end;
private $entityid;
private $agencyid;
 

public function getENTITYID(){
return $this->entityid;
}
public function setENTITYID($entt){
$this->entityid = $entt;
}
public function getAGENCYID(){
return $this->agencyid;
}
public function setAGENCYID($egt){
$this->agencyid = $egt;
}
public function getCID(){
return $this->cid;
}
public function setCID($cd){
$this->cid = $cd;
}
public function getSID(){
return $this->sid;
}
public function setSID($sd){
$this->sid = $sd;
}
public function getCA(){
return $this->ca;
}
public function setCA($cty){
$this->ca = $cty;
}
public function getSTATIONID(){
return $this->stationid;
}
public function setSTATIONID($stn){
$this->stationid = $stn;
}
public function getUCODE(){
return $this->ucode;
}
public function setUCODE($cod){
$this->ucode = $cod;
}
public function getFLAGNO(){
return $this->flagno;
}
public function setFLAGNO($csn){
$this->flagno = $csn;
}
public function getARRESTDATE(){
return $this->flagdate;
}
public function setARRESTDATE($adate){
$this->flagdate = $adate;
}
public function getFNAME(){
return $this->fname;
}
public function setFNAME($fsn){
$this->fname = $fsn;
}
public function getMNAME(){
return $this->mname;
}
public function setMNAME($msn){
$this->mname = $msn;
}
public function getSNAME(){
return $this->sname;
}
public function setSNAME($asn){
$this->sname = $asn;
}
public function getGENDER(){
return $this->gender;
}
public function setGENDER($sex){
$this->gender = $sex;
}
public function getOFFENCEID(){
return $this->ofenceid;
}
public function setOFFENCEID($ofd){
$this->offenceid = $ofd;
}
public function getDISTRICTID(){
return $this->districtid;
}
public function setDISTRICTID($dst){
$this->districtid = $dst;
}
public function getSTATUSID(){
return $this->statusid;
}
public function setSTATUSID($stt){
$this->statusid = $stt;
}
public function getCOMMENT(){
return $this->comment;
}
public function setCOMMENT($com){
$this->comment=$com;
}
public function getRTIME(){
return $this->rtime;
}
public function setRTIME($rdt){
$this->rtime=$rdt;
}
public function getSUSER(){
return $this->sessionuser;
}
public function setSUSER($su){
$this->sessionuser=$su;
}
public function getDOB(){
return $this->dob;
}
public function setDOB($db){
$this->dob=$db;
}
public function getRESIDENCE(){
return $this->residence;
}
public function setRESIDENCE($res){
$this->residence=$res;
}
public function getCONTACT(){
return $this->contact;
}
public function setCONTACT($cont){
$this->contact=$cont;
}
public function getNID(){
return $this->nid;
}
public function setNID($nd){
$this->nid=$nd;
}
public function getNATIONALITY(){
return $this->nationality;
}
public function setNATIONALITY($nat){
$this->nationality=$nat;
}
public function getPASSPORT(){
return $this->passport;
}
public function setPASSPORT($pass){
$this->passport=$pass;
}
public function getOCCUPATION(){
return $this->occupation;
}
public function setOCCUPATION($occup){
$this->occupation=$occup;
}
public function getNOK(){
return $this->nok;
}
public function setNOK($nk){
$this->nok=$nk;
}
public function getNCONTACT(){
return $this->ncontact;
}
public function setNCONTACT($ncont){
$this->ncontact=$ncont;
}
//-------------------------------------------------- --------------------------------------------------
function addnewcase($ca,$stationid,$ucode,$caseno,$offenceid,$rdate,$sessionuser,$statusid, $mysqli){
$mysqli->query("INSERT INTO tbl_cases(ca,stationid,ucode,caseno,offenceid,rdate,sessionuser,statusid)values('$ca','$stationid','$ucode','$caseno','$offenceid','$rdate','$sessionuser','$statusid')");}
function addsuspect($flagno,$flagdate,$fname,$mname,$sname,$gender,$offenceid,$districtid,$statusid,$comment,$dob,$residence,$contact,$nid,$nationality,$passport,$occupation,$nok,$ncontact,$rtime,$sessionuser, $mysqli){
 $mysqli->query("INSERT INTO tbl_suspect (flagno,flagdate,fname,mname,sname,gender,offenceid,districtid,statusid,comment,dob,residence,contact,nid,nationality,passport,occupation,nok,ncontact,rtime,sessionuser) VALUES ('$flagno','$flagdate','$fname','$mname','$sname','$gender','$offenceid','$districtid','$statusid','$comment','$dob','$residence','$contact','$nid','$nationality','$passport','$occupation','$nok','$ncontact','$rtime','$sessionuser')");}
function addgencaseid($cid, $mysqli){
 $mysqli->query("insert into tbl_gencaseid(code)values('$cid')");}
function addflag($flagno,$start,$end,$rtime, $mysqli){
$mysqli->query("insert into tbl_flagcase(flagno,startdate,enddate,createtime)values('$flagno','$start','$end','$rtime')");}
function addAttribute($flagno,$flagdate,$entityid,$comment,$rtime,$sessionuser,$agencyid, $mysqli){
$mysqli->query("insert into tbl_flag(flagno,flagdate,entityid,comment,flagtime,sessionuser,agencyid)values('$flagno','$flagdate','$entityid','$comment','$rtime','$sessionuser','$agencyid')");}
//-------------------------------------------------- --------------------------------------------------

}



class bookings
{
private $bkid;

public function getBID(){
return $this->bkid;
}
public function setBID($bd){
$this->bkid = $bd;
}

//-------------------------------------------------- --------------------------------------------------

function addgeninvoice($bkid, $mysqli){
 $mysqli->query("insert into tbl_geninvoiceno(id)values('$bkid')");
}
//-------------------------------------------------- --------------------------------------------------


}
 
 
class admin
{
private $id;
private $role;
private $purpose;
private $rdate;
private $status;
private $specie;
private $measure;
private $store;
 
public function getRID(){
return $this->id;
}
public function setRID($rd){
$this->id = $rd;
}

public function getROLE(){
return $this->role;
}
public function setROLE($rl){
$this->role = $rl;
}

public function getPURPOSE(){
return $this->purpose;
}
public function setPURPOSE($ps){
$this->purpose = $ps;
}
public function getRDATE(){
return $this->rdate;
}
public function setRDATE($rdt){
$this->rdate = $rdt;
}
public function getSTATUS(){
return $this->status;
}
public function setSTATUS($sts){
$this->status = $sts;
} 
public function getSPECIE(){
return $this->specie;
}
public function setSPECIE($spc){
$this->specie = $spc;
} 
public function getMEASURE(){
return $this->measure;
}
public function setMEASURE($msr){
$this->measure = $msr;
}
public function getSTORE(){
return $this->store;
}
public function setSTORE($tr){
$this->store = $tr;
}
//-------------------------------------------------- --------------------------------------------------

function addroles($role,$purpose,$rdate, $mysqli){
 $mysqli->query("insert into privileges(role,purpose,date)values('$role','$purpose','$rdate')");
}
//-------------------------------------------------- --------------------------------------------------
//-------------------------------------------------- --------------------------------------------------

function addstatus($status, $mysqli){
 $mysqli->query("insert into tbl_status(name)values('$status')");
}
//-------------------------------------------------- --------------------------------------------------
//-------------------------------------------------- --------------------------------------------------

function addspecies($specie, $mysqli){
 $mysqli->query("insert into tbl_species(name)values('$specie')");
}
//-------------------------------------------------- --------------------------------------------------
//-------------------------------------------------- --------------------------------------------------

function addmeasurement($measure, $mysqli){
 $mysqli->query("insert into tbl_measure(name)values('$measure')");
}
//-------------------------------------------------- --------------------------------------------------
//-------------------------------------------------- --------------------------------------------------

function addadminstatus($status, $mysqli){
 $mysqli->query("insert into tbl_casestatus(name)values('$status')");
}
//-------------------------------------------------- --------------------------------------------------
//-------------------------------------------------- --------------------------------------------------

function addstore($store, $mysqli){
 $mysqli->query("insert into tbl_store(name)values('$store')");
}
//-------------------------------------------------- --------------------------------------------------
}


class exhibit
{
private $id;
private $rdate;
private $caseno;
private $exno;
private $edesc;
private $piece;
private $qty;
private $measure;
private $specie;
private $sessionuser;
 
public function getCID(){
return $this->id;
}
public function setCID($cid){
$this->id = $cid;
}
public function getRDATE(){
return $this->rdate;
}
public function setRDATE($rdt){
$this->rdate = $rdt;
}
public function getCASENO(){
return $this->caseno;
}
public function setCASENO($csn){
$this->caseno = $csn;
}
public function getEXNO(){
return $this->exno;
}
public function setEXNO($ex){
$this->exno = $ex;
}
public function getEDESC(){
return $this->edesc;
}
public function setEDESC($ede){
$this->edesc = $ede;
}
public function getPIECE(){
return $this->piece;
}
public function setPIECE($pc){
$this->piece = $pc;
}
public function getQTY(){
return $this->qty;
}
public function setQTY($qt){
$this->qty = $qt;
}
public function getMEASURE(){
return $this->measure;
}
public function setMEASURE($msr){
$this->measure = $msr;
}
public function getSPECIE(){
return $this->specie;
}
public function setSPECIE($spe){
$this->speice = $spe;
}
public function getSESSIONUSER(){
return $this->sessionuser;
}
public function setSESSIONUSER($sur){
$this->sessionuser = $sur;
}


//-------------------------------------------------- --------------------------------------------------

function addexhibit($rdate,$caseno,$exno,$edesc,$piece,$qty,$measure,$specie,$sessionuser, $mysqli){
 $mysqli->query("insert into tbl_exhibit(rdate,caseno,exno,edesc,piece,qty,measureid,specieid,sessionuser)values('$rdate','$caseno','$exno','$edesc','$piece','$qty','$measure','$specie','$sessionuser')");
}
//-------------------------------------------------- --------------------------------------------------

}


class coc
{
private $id;
private $exno;
private $caseno;
private $labno;
private $sealed;
private $receivedvia;
private $acceptedby;
private $receivingofficer;
private $openedby;
private $scd;
private $comment;
private $storage;
private $rtime;
private $rdate;
private $sessionuser;


public function getCID(){
return $this->id;
}
public function setCID($cic){
$this->id = $cic;
}
public function getEXNO(){
return $this->exno;
}
public function setEXNO($ex){
$this->exno = $ex;
}
public function getCASENO(){
return $this->caseno;
}
public function setCASENO($cas){
$this->caseno = $cas;
}
public function getLABNO(){
return $this->labno;
}
public function setLABNO($lab){
$this->labno = $lab;
}
public function getSEALED(){
return $this->sealed;
}
public function seSEALED($sel){
$this->sealed = $sel;
}
public function getVIA(){
return $this->receivedvia;
}
public function setVIA($via){
$this->receivedvia = $via;
}
public function getACCEPTEDBY(){
return $this->acceptedby;
}
public function setACCEPTEDBY($accep){
$this->acceptedby = $accep;
}
public function getROFFICER(){
return $this->receivingofficer;
}
public function setROFFICER($roff){
$this->receivingofficer = $roff;
}
public function getOPENEDBY(){
return $this->openedby;
}
public function setOPENEDBY($open){
$this->openedby = $open;
}
public function getSCD(){
return $this->scd;
}
public function setSCD($sc){
$this->scd = $sc;
}
public function getCOMMENT(){
return $this->comment;
}
public function setCOMMENT($com){
$this->comment = $com;
}
public function getSTORAGE(){
return $this->storage;
}
public function setSTORAGE($sto){
$this->storage = $sto;
}
public function getTIME(){
return $this->rtime;
}
public function setTIMER($rtm){
$this->rtime = $rtm;
}
public function getRDATE(){
return $this->rdate;
}
public function setRDATE($rd){
$this->rdate = $rd;
}
public function getSUSER(){
return $this->sessionuser;
}
public function setSUSER($su){
$this->sessionuser = $su;
}


//-------------------------------------------------- --------------------------------------------------

function addcoc($exno,$caseno,$labno,$sealed,$receivedvia,$acceptedby,$receivingofficer,$openedby,$scd,$comment,$storage,$rtime,$rdate,$sessionuser, $mysqli){
 $mysqli->query("insert into tbl_coc(exno,caseno,labno,sealed,receivedvia,acceptedby,receivingofficer,openedby,scd,comment,storage,time,rdate,sessionuser)values('$exno','$caseno','$labno','$sealed','$receivedvia','$acceptedby','$receivingofficer','$openedby','$scd','$comment','$storage','$rtime','$rdate','$sessionuser')");
}
//-------------------------------------------------- --------------------------------------------------

}






class police
{
private $region;
private $division;
private $station;
private $offence;


public function getREGION(){
return $this->region;
}
public function setREGION($rg){
$this->region = $rg;
}
 public function getDIVISION(){
return $this->division;
}
public function setDIVISION($dv){
$this->division = $dv;
}
 public function getSTATION(){
return $this->station;
}
public function setSTATION($st){
$this->station = $st;
}
 public function getOFFENCE(){
return $this->offence;
}
public function setOFFENCE($off){
$this->offence = $off;
}

   //-------------------------------------------------- --------------------------------------------------

function addregion($regname, $mysqli){
 $mysqli->query("insert into tbl_region(regname)values('$regname')");
}
//-------------------------------------------------- --------------------------------------------------
   //-------------------------------------------------- --------------------------------------------------

function adddivision($regname,$division, $mysqli){
 $mysqli->query("insert into tbl_division(regionid,divname)values('$regname','$division')");
}
//-------------------------------------------------- --------------------------------------------------
   //-------------------------------------------------- --------------------------------------------------

function addstation($division,$station, $mysqli){
 $mysqli->query("insert into tbl_station(divid,stationame)values('$division','$station')");
}
//-------------------------------------------------- --------------------------------------------------
   //-------------------------------------------------- --------------------------------------------------

function addoffence($offence, $mysqli){
 $mysqli->query("insert into tbl_offence(name)values('$offence')");
}
//-------------------------------------------------- --------------------------------------------------
}
?>
