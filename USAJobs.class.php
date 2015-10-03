<?php
  /**
   *  Name: USAJobs.class.php
   *  URL: github.com/mrandrewmills/USAJobs
   *  API Documentation: https://developer.usajobs.gov/Search-API/Overview
   */

   class USAJobs {

     private $baseURL = "https://data.usajobs.gov/api/search";

     // required request headers
     private host = "data.usajobs.gov";
     private user_agent;
     private authorization_key;

     // optional query parameters
     private keyword;
     private keywordExclusion;
     private keywordFilter;
     private PositionTitle;
     private remunerationMinimumAmount;
     private remunerationMaximumAmount;
     private payGradeHigh;
     private payGradeLow;
     private jobCategoryCode;
     private locationName;
     private postingChannel;
     private organization;
     private positionOfferingTypeCode;
     private travelPercentage;
     private positionScheduleTypeCode;
     private relocationIndicator;
     private securityClearanceRequired;
     private supervisoryStatus;
     private excludeJOAOpenFor30Days;
     private datePosted;
     private jobGradeCode;
     private sortField;
     private sortDirection;
     private page;
     private resultsPerPage;
     private whoMayApply;
     private radius;
     private fields;
     private salaryBucket;
     private gradeBucket;
     private SES;
     private Student;
     private Internship;
     private recentGrad;

     function __constructor($ua, $apikey){

       if ($ua) { $this->setUserAgent($ua); }
       if ($apikey) { $this->setAPIKey($apikey); }
     }

     /*
        Note: there is no setHost method b/c host should never change.
        There are also no getUserAgent or getAPIKey methods for seurity reasons.
     */

     function setUserAgent($ua) {
       // TODO: regex for email validation
       $this->user_agent = $ua;
     }

     function setAPIKey($apikey) {
       $this->authorization_key = $apikey;
     }

   }
?>
