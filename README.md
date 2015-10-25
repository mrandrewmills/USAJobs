# USAJobs

a PHP utility class for USAJobs' new Search API

## Contents

[Frequently Asked Questions](#frequently-asked-questions)
[Tutorial](#tutorial)

## Frequently Asked Questions

Q. WHAT IS THIS EXACTLY?

USAJobs announced they would replace their existing Search API in October 2015. Although the new API is not much more complicated, I felt there were enough differences that making a PHP utility/helper class might be helpful to others.

## Tutorial

To use the USAJobs utility class in your PHP code, you must first include it.

```html
<?php

	require_once 'USAJobs.class.php';
```

Once that's been accomplished, you'll need to create an object and initialize it with your USAJobs account information.

```html

	// initialize the object with email address and API Key you received from USAJobs website
	$objUSAJobs = new USAJobs("YourEmailAddress","YourAPIKeyValue");
```


```html
	// let's set a keyword parameter
	$objUSAJobs->setKeyword("NPS");
	
	// retrieve the list!
	$jobs = json_decode($objUSAJobs->getJobListing());
?>
```

*IMPORTANT NOTE:* If you invoke the getJobListing() method without first using any query filtering parameters, the USAJobs web server will return a 503 Error/Service Unavailable error. 
