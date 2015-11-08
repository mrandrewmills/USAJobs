<?php
  /**
   *  Name: USAJobs.class.php
   *  URL: github.com/mrandrewmills/USAJobs
   *  API Documentation: https://developer.usajobs.gov/Search-API/Overview
   */

   class USAJobs {

     private $baseURL = "https://data.usajobs.gov/api/search";

     // required request headers
     private $host = "data.usajobs.gov";
     private $user_agent;
     private $authorization_key;

     // optional query parameters
     private $keyword;
     private $keywordExclusion;
     private $keywordFilter;
     private $PositionTitle;
     private $remunerationMinimumAmount;
     private $remunerationMaximumAmount;
     private $payGradeHigh;
     private $payGradeLow;
     private $jobCategoryCode;
     private $locationName;
     private $postingChannel;
     private $organization;
     private $positionOfferingTypeCode;
     private $travelPercentage;
     private $positionScheduleTypeCode;
     private $relocationIndicator;
     private $securityClearanceRequired;
     private $supervisoryStatus;
     private $excludeJOAOpenFor30Days;
     private $datePosted;
     private $jobGradeCode;
     private $sortField;
     private $sortDirection;
     private $page;
     private $resultsPerPage;
     private $whoMayApply;
     private $radius;
     private $fields;
     private $salaryBucket;
     private $gradeBucket;
     private $SES;
     private $Student;
     private $Internship;
     private $recentGrad;
     
     // for internal use, enumerations, etc.

     private $countrysubdivisions;
     private $countries;
     private $geoloccodes;
     private $postalcodes;
     private $payplans;
     private $OccupationalSeries;
     private $agencysubelements;

     function __construct($ua, $apikey){

       $this->setUserAgent($ua);
       $this->setAPIKey($apikey);
     }

     /*
        REQUIRED PROPERTIES
     
        Notes: 
        
        1) There is no setHost method b/c host should NEVER change.
        2) There are also no getUserAgent or getAPIKey methods for security reasons.
     */
     
     function setUserAgent($ua) {
     	// TODO: regex to verify email format
     	$this->user_agent = $ua;
     }
     
     function setAPIKey($apikey) {
     	$this->authorization_key = $apikey;
     }


     /* OPTIONAL PROPERTIES
     
        Notes:
        
        1) If you query with no filtering parameters, you will get a 503-Service Unavailable status. Don't be a jerk, ok?   
     */
     
     function setKeyword($kw) {
     	$this->keyword = $kw;
     }
     function getKeyword() {
     	return $this->keyword;
     }
     
     function setKeywordExclusion($kwe) {
     	$this->keywordExclusion = $kwe;
     }
     function getKeywordExclusion() {
     	return $this->keywordExclusion;
     }
     
     function setKeywordFilter($kwf) {
     	$this->keywordFilter = $kwf;
     }
     function getKeywordFilter() {
     	return $this->keywordFilter;
     }

     function setPositionTitle($pt) {
     	$this->PositionTitle = $pt;
     }
     function getPositionTitle() {
     	return $this->PositionTitle;
     }
     
     function setRemunerationMinimumAmount($remMin) {
     	$this->remunerationMinimumAmount = $remMin;
     }
     function getRemunerationMinimumAmount() {
     	return $this->remunerationMinimumAmount;
     }
     
     function setRemunerationMaximumAmount($remMax) {
     	$this->remunerationMaximumAmount = $remMax;
     }
     function getRemunerationMaximumAmount() {
     	return $this->remunerationMaximumAmount;
     }
     
     function setPayGradeHigh($pgh) {
     	$this->payGradeHigh = $pgh;
     }
     function getPayGradeHigh() {
     	return $this->payGradeHigh;
     }
     
     function setPayGradeLow($pgl) {
     	$this->payGradeLow = $pgl;
     }
     function getPayGradeLow($pgl) {
     	return $this->payGradeLow;
     }
     
     function setJobCategoryCode($jcc) {
     	$this->jobCategoryCode = $jcc;
     }
     function getJobCategoryCode() {
     	return $this->jobCategoryCode;
     }
     
     function setLocationName($ln) {
     	$this->locationName = $ln;
     }
     function getLocationName() {
     	return $this->locationName;
     }
     
     function setPostingChannel($pc) {
     	$this->postingChannel = $pc;
     }
     function getPostingChannel() {
     	return $this->postingChannel;
     }
     
     function setOrganization($o) {
     	$this->organization = $o;
     }
     function getOrganization() {
     	return $this->organization;
     }
     
     function setPositionOfferingTypeCode($potc) {
     	$this->positionOfferingTypeCode = $potc;
     }
     function getPositionOfferingTypeCode() {
     	return $this->positionOfferingTypeCode;
     }
     
     function setTravelPercentage($tp) {
     	$this->travelPercentage = $tp;
     }
     function getTravelPercentage() {
     	return $this->TravelPercentage;
     }
     
     function setPositionScheduleTypeCode($pstc) {
     	$this->positionScheduleTypeCode;
     }
     function getPositionScheduleTypeCode() {
     	return $this->positionScheduleTypeCode;
     }
     
     function setRelocationIndicator($ri) {
     	$this->relocationIndicator = $ri;
     }
     function getRelocationIndicator() {
     	return $this->relocationIndicator;
     }
     
     function setSecurityClearanceRequired($scr) {
     	$this->securityClearanceRequired = $scr;
     }
     function getSecurityClearanceRequired() {
     	return $this->securityClearanceRequired;
     }
     
     function setSupervisoryStatus($ss) {
     	$this->supervisoryStatus = $ss;
     }
     function getSupervisoryStatus() {
     	return $this->supervisoryStatus;
     }
     
     function setExcludeJOAOpenFor30Days($ejoaoftd) {
     	$this->excludeJOAOpenFor30Days = $ejoaoftd;
     }
     function getexcludeJOAOpenFor30Days() {
     	return $this->excludeJOAOpenFor30Days;
     }
          
     function setDatePosted($dp) {
     	$this->datePosted;
     }
     function getDatePosted() {
     	return $this->datePosted;
     }
     
     function setJobGradeCode($jgc) {
     	$this->jobGradeCode = $jgc;
     }
     function getJobGradeCode() {
     	return $this->jobGradeCode;
     }
     
     function setSortField($sf) {
     	$this->sortField = $sf;
     }
     function getsortField() {
     	return $this->sortField;
     }
     
     function setSortDirection($sd) {
     	$this->sortDirection = $sd;
     }
     function getSortDirection() {
     	return $this->sortDirection;
     }
          
     function setPage($pg) {
     	$this->Page = $pg;
     }
     function getPage() {
        return $this->page;
     }
     
     function setResultsPerPage($rpp) {
     	$this->resultsPerPage = $rpp;
     }
     function getResultsPerPage() {
     	return $this->resultsPerPage;
     }
     
     function setWhoMayApply($wma) {
     	$this->whoMayApply = $wma;
     }
     function getWhoMayApply() {
     	return $this->whoMayApply;
     }
          
     function setRadius($rd) {
     	$this->radius = $rd;
     }
     function getRadius() {
     	return $this->radius;
     }
     
     function setFields($f) {
     	$this->fields = $f;
     }
     function getFields() {
     	return $this->fields;
     }
     
     function setSalaryBucket($sb) {
     	$this->salaryBucket = $sb;
     }
     function getSalaryBucket() {
     	return $this->salaryBucket;
     }
     
     function setGradeBucket($gb) {
     	$this->gradeBucket = $gb;
     }
     function getGradeBucket() {
     	return $this->gradeBucket;
     }
     
     function setSES($ses) {
     	$this->SES = $ses;
     }
     function getSES() {
     	return $this->SES;
     }
     
     function setStudent($s) {
     	$this->Student = $s;
     }
     function getStudent() {
     	return $this->Student;
     }
     
     function setInternship($i) {
     	$this->Internship;
     }
     function getInternship() {
     	return $this->Internship;
     }
     
     function setRecentGrad($rg) {
     	$this->RecentGrad = $rg;
     }
     function getRecentGrad() {
     	return $this->RecentGrad;
     }
     
     // ENUMERATION RETRIEVAL
     
     function getCountrySubdivisions() {
     	$CountrySubdivisions = file_get_contents("https://data.usajobs.gov/api/codelist/countrysubdivisions");

     	return $CountrySubdivisions;
     }
     
     function getCountries() {
     	$Countries = file_get_contents("https://data.usajobs.gov/api/codelist/countries");

     	return $Countries;
     }
     
     function getGeoLocCodes() {
        $GeoLocCodes = file_get_contents("https://data.usajobs.gov/api/codelist/geoloccodes");

     	return $GeoLocCodes;     
     }
     
     function getPostalCodes() {
	$PostalCodes = file_get_contents("https://data.usajobs.gov/api/codelist/postalcodes");
	
	return $PostalCodes;
     }
     
     function getPayPlans() {
     	$PayPlans = file_get_contents("https://data.usajobs.gov/api/codelist/payplans");
     	
     	return $PayPlans;
     }
     
     function getOccupationalSeries() {
     	$OccupationalSeries = file_get_contents("https://data.usajobs.gov/api/codelist/OccupationalSeries");
     	
     	return $OccupationalSeries;
     }

     function getAgencySubelements() {
     	$AgencySubelements = file_get_contents("https://data.usajobs.gov/api/codelist/agencysubelements");
     	
     	return $AgencySubelements;
     }     

     
     // UTILITY METHODS (Where the actual work happens)
     
     function getJobListing() {

	if (($this->user_agent != "") && ($this->authorization_key != "")) {
          // establish our options (headers, etc.)
          $opts = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"Host: $this->host\r\n" .
                        "User-Agent: $this->user_agent\r\n" .
                        "Authorization-Key: $this->authorization_key\r\n"
            )
          );

          // convert our options into a context
          $context = stream_context_create($opts);
          
          // build our search URL
          // Note: using search API w/o any parameters seems to cause it to 503/Service Unavailable. Too many results returned, perhaps?
          // so use at least one parameter (e.g. "organization=TR") to reduce/filter results to avoid this.
          $searchURL = $this->baseURL . $this->createURLParams();

          // retrieve JSON of jobs listing with our options/context
          $file = file_get_contents($searchURL, false, $context);
          
          return $file;
          }
          else {
          	echo "Your user_agent and/or api key are missing!";
          	// TODO: throw an error?
          }

     }

     
     function createURLParams() {
     
        // TODO: tedious bullshittery. Maybe some kind of array that we can loop through instead?
     
     	$URLParams = "";
     	     	
     	if ($this->keyword != "") { 
     		$URLParams = $URLParams . "&Keyword=" . $this->keyword;
     	}
     	
	if ($this->keywordExclusion != "") { 
     		$URLParams = $URLParams . "&KeywordExclusion=" . $this->keywordExclusion;
	}
	
	if ($this->keywordFilter != "") { 
	     	$URLParams = $URLParams . "&KeywordFilter=" . $this->keywordFilter;
	}
	
	if ($this->PositionTitle != "") {
	     	$URLParams = $URLParams . "&PositionTitle=" . $this->PositionTitle;
	}
	
	if ($this->remunerationMinimumAmount != "") {
	     	$URLParams = $URLParams . "&RemunerationMinimumAmount=" . $this->RemunerationMinimumAmount;
	}
	
	if ($this->remunerationMaximumAmount != "") { 
	     	$URLParams = $URLParams . "&RemunerationMaximumAmount=" . $this->RemunerationMaximumAmount;
	}
	
	if ($this->payGradeHigh != "") { 
	     	$URLParams = $URLParams . "&PayGradeHigh=" . $this->payGradeHigh;
	}
	
	if ($this->payGradeLow != "") { 
	     	$URLParams = $URLParams . "&PayGradeLow=" . $this->payGradeLow;
	}
	
	if ($this->jobCategoryCode != "") { 
	     	$URLParams = $URLParams . "&JobCategoryCode=" . $this->jobCategoryCode;
	}

	if ($this->locationName != "") { 
	     	$URLParams = $URLParams . "&LocationName=" . $this->locationName;
	}

	if ($this->postingChannel != "") { 
	     	$URLParams = $URLParams . "&PostingChannel=" . $this->postingChannel;
	}

	if ($this->organization != "") { 
	     	$URLParams = $URLParams . "&Organization=" . $this->organization;
	}

	if ($this->positionOfferingTypeCode != "") { 
		$URLParams = $URLParams . "&PositionOfferingTypeCode=" . $this->positionOfferingTypeCode;
	}

	if ($this->travelPercentage != "") { 
	     	$URLParams = $URLParams . "&TravelPercentage=" . $this->travelPercentage;
	}

	if ($this->positionScheduleTypeCode != "") { 
	     	$URLParams = $URLParams . "&PositionSchedule=" . $this->positionScheduleTypeCode;
	}

	if ($this->relocationIndicator != "") { 
	     	$URLParams = $URLParams . "&RelocationIndicator=" . $this->relocationIndicator;
	}

	if ($this->securityClearanceRequired != "") { 
	     	$URLParams = $URLParams . "&securityClearanceRequired=" . $this->securityClearanceRequired;
	}

	if ($this->supervisoryStatus != "") { 
	     	$URLParams = $URLParams . "&SupervisoryStatus=" . $this->supervisoryStatus;
	}

	if ($this->excludeJOAOpenFor30Days != "") { 
	     	$URLParams = $URLParams . "&ExcludeJOAOpenFor30Days" . $this->excludeJOAOpenFor30Days;
	}

	if ($this->datePosted != "") { 
	     	$URLParams = $URLParams . "&DatePosted=" . $this->datePosted;
	}

	if ($this->jobGradeCode != "") { 
	     	$URLParams = $URLParams . "&JobGradeCode=" . $this->jobGradeCode;
	}

	if ($this->sortField != "") { 
	     	$URLParams = $URLParams . "&SortField=" . $this->sortField;
	}

	if ($this->sortDirection != "") { 
	     	$URLParams = $URLParams . "&SortDirection=" . $this->sortDirection;
	}

	if ($this->page != "") { 
	     	$URLParams = $URLParams . "&Page=" . $this->page;
	}

	if ($this->resultsPerPage != "") { 
	     	$URLParams = $URLParams . "&ResultPerPage=" . $this->resultsPerPage;
	}

	if ($this->whoMayApply != "") {
	     	$URLParams = $URLParams . "&WhoMayApply=" . $this->whoMayApply;
	}

	if ($this->radius != "") { 
	     	$URLParams = $URLParams . "KeywordFilter=" . $this->keywordFilter;
	}

	if ($this->fields != "") { 
	     	$URLParams = $URLParams . "KeywordFilter=" . $this->keywordFilter;
	}	

	if ($this->salaryBucket != "") { 
	     	$URLParams = $URLParams . "&SalaryBucket=" . $this->salaryBucket;
	}

	if ($this->gradeBucket != "") { 
	     	$URLParams = $URLParams . "&GradeBucket=" . $this->gradeBucket;
	}

	if ($this->SES != "") { 
	     	$URLParams = $URLParams . "&SES=" . $this->SES;
	}

	if ($this->Student != "") { 
	     	$URLParams = $URLParams . "&Student=" . $this->Student;
	}

	if ($this->Internship != "") { 
	     	$URLParams = $URLParams . "&Internship=" . $this->Internship;
	}

	if ($this->recentGrad != "") { 
	     	$URLParams = $URLParams . "&RecentGrad=" . $this->recentGrad;
	}
	
	// if URLParams is NOT empty, don't forget to prefix the string with a question mark
	if ($URLParams != "") {
		// since URLParams string will begin with a "&", we skip first char to "replace" it with a "?" instead 
		$URLParams = "?" . substr($URLParams,1);
		}
	else {
		// ToDo: user is querying with no paramters. Do we want to intervene, or let them get a 503/Service Unavailable?
	}
	
	return $URLParams;
     }
   }
?>
