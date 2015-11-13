<?php

	#Customer class, which includes variables, named after the same variables in the database for ease of modifying.
	#Constructor, getters and setters have been built, along with the __ToString method.
	class Customer
	{
		private $CustomerId;
		private $CustFirstName;
		private $CustLastName;
		private $CustAddress;
		private $CustCity;
		private $CustProv;
		private $CustPostal;
		private $CustCountry;
		private $CustHomePhone;
		private $CustBusPhone;
		private $CustEmail;
		private $AgentId;
		private $CustUsername;
		private $CustPassword;

		public function __construct($custid, $fname, $lname, $addr, $city, $prov, $postal, $ctry, $hphone, $bphone, $email, $agtid, $uname, $pwd)
		{
			$this->CustomerId = $custid;
			$this->CustFirstName = $fname;
			$this->CustLastName = $lname;
			$this->CustAddress = $addr;
			$this->CustCity = $city;
			$this->CustProv = $prov;
			$this->CustPostal = $postal;
			$this->CustCountry = $ctry;
			$this->CustHomePhone = $hphone;
			$this->CustBusPhone = $bphone;
			$this->CustEmail = $email;
			$this->AgentId = $agtid;
			$this->CustUsername = $uname;
			$this->CustPassword = $pwd;
		}
		public function _destruct()
		{
			print("Cleanup.<br />");
		}
		public function getCustomerId()
		{
			return $this->CustomerId;
		}
		public function setCustomerId($custid)
		{
			$this->CustomerId = $custid;
		}
		public function getFirstName()
		{
			return $this->CustFirstName;
		}
		public function setFirstName($fname)
		{
			$this->CustFirstname = $fname;
		}
		public function getLastName()
		{
			return $this->CustLastName;
		}
		public function setLastName($lname)
		{
			$this->CustLastname = $lname;
		}
		public function getAddress()
		{
			return $this->CustAddress;
		}
		public function setAddress($addr)
		{
			$this->CustAddress = $addr;
		}
		public function getCity()
		{
			return $this->CustCity;
		}
		public function setCity($city)
		{
			$this->CustCity = $city;
		}
		public function getProv()
		{
			return $this->CustProv;
		}
		public function setProv($prov)
		{
			$this->CustProv = $prov;
		}
		public function getPostal()
		{
			return $this->CustPostal;
		}
		public function setPostal($postal)
		{
			$this->CustPostal = $postal;
		}
		public function getCountry()
		{
			return $this->CustCountry;
		}
		public function setCountry($ctry)
		{
			$this->CustCountry = $ctry;
		}
		public function getHomePhone()
		{
			return $this->CustHomePhone;
		}
		public function setHomePhone($hphone)
		{
			$this->CustHomePhone = $hphone;
		}
		public function getBusPhone()
		{
			return $this->CustBusPhone;
		}
		public function setBusPhone($bphone)
		{
			$this->CustBusPhone = $bphone;
		}
		public function getEmail()
		{
			return $this->CustEmail;
		}
		public function setEmail($email)
		{
			$this->CustEmail = $email;
		}
		public function getAgencyId()
		{
			return $this->AgencyId;
		}
		public function setAgencyId($agtid)
		{
			$this->AgencyId = $agtid;
		}
		public function getUsername()
		{
			return $this->CustUsername;
		}
		public function setUsername($uname)
		{
			$this->CustUsername = $uname;
		}
		public function getPassword()
		{
			return $this->CustPassword;
		}
		public function setPassword($pwd)
		{
			$this->CustPassword = $pwd;
		}
		public function __toString()
		{
			//print("This is a customer.");
			return "Customer: " . $CustFirstName . ", " . $CustLastName . ", " . $CustAddress . ", " . $CustProv . ", " . $CustCity . ", " . $CustPostal . ", " . $CustCountry . ", " . $CustHomePhone . ", " . $CustBusPhone . ", " . $CustEmail . ", " . $CustUsername . "<br />";
		}
	}

?>
