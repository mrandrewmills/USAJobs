# USAJobs

a PHP utility class for USAJobs' new Search API

## Contents

[Frequently Asked Questions](#frequently-asked-questions)

[Tutorial](#tutorial)

## Frequently Asked Questions

Q. WHAT IS THIS EXACTLY?

USAJobs announced they would replace their existing Search API in October 2015. Although the new API is not much more complicated, there were enough differences that making a PHP utility/helper seemed potentially helpful to others.

## Tutorial

To use the USAJobs utility class in your PHP code, you must first include it.

```html
<?php

	require_once 'USAJobs.class.php';
```

To use this class, you must have an API Key. If you don't have an API Key, you can request one from the [USAJobs.gov website](https://developer.usajobs.gov/Search-API/Request-API-Key). 

Once you have an API Key, you'll use it to initialize an instance/object of our USAJobs class, like so:

```html

	// initialize the object with email address and API Key you received from USAJobs website
	$objUSAJobs = new USAJobs("YourEmailAddress","YourAPIKeyValue");
```



*IMPORTANT NOTE:* If you invoke the getJobListing() method without first setting _any_ query filtering parameters, the USAJobs web server will return a 503 Error/Service Unavailable error. 

```html
	// let's set a keyword parameter (NPS is National Park Service, by the way.)
	$objUSAJobs->setKeyword("NPS");
```

```html
	// retrieve the list!
	$jobs = json_decode($objUSAJobs->getJobListing());
?>
```


