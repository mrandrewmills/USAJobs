# USAJobs

a PHP utility class for USAJobs' new Search API (circa October 2015)

## Contents

[Frequently Asked Questions](#frequently-asked-questions)

[Tutorial](#tutorial)

## Frequently Asked Questions

Q. WHAT IS THIS EXACTLY?

USAJobs announced they would replace their existing Search API in October 2015. Although the new API is not much more complicated, there were enough differences (i.e. required request headers) that making a PHP utility/helper class seemed potentially helpful to others.

This is a work in progress, and if other PHP developers want to help identify and/or resolve issues, please feel free to do so.

Q. WHERE CAN I GET AN API KEY?

You can request an API Key from the [USAJobs.gov Developer website](https://developer.usajobs.gov/Search-API/Request-API-Key).

Please don't contact me about issues with your API Key. I do not work for USAJobs, and will not be able to help you.

Q. WHY DO I GET A 503/SERVICE UNAVAILABLE ERROR WHEN I USE YOUR CLASS?

You're probably not using any query parameters to filter the results. For some reason, when you run a query for job listings without any filtering, the USAJobs server returns a 503 error (_presumably timing out before it can return the results?_).  

Fortunately, if you add one query parameter (e.g. Organization=TR) to filter search results, that prevents the 503 Error from happening. 

So, stop being a jerk by asking for all jobs listed on USAJobs.gov (*"I kid, I kid, I joke with you." - Triumph the Insult Comic Dog*), and make more reasonable requests by narrowing your query with parameters before invoking the getJobListing() method.

Not sure what query parameters you can use? USAJobs.gov has [fairly decent documentation](https://developer.usajobs.gov/Search-API/API-Query-Parameters).

## Tutorial

To use the USAJobs utility class in your PHP code, you must first include it.

```html
<?php

	require_once 'USAJobs.class.php';
```

To use this class, you must have an API Key. If you don't have an API Key, you can request one from the [USAJobs.gov Developer website](https://developer.usajobs.gov/Search-API/Request-API-Key). 

Once you have your API Key, use it to initialize an instance/object of our USAJobs class, like so:

```html

	// initialize the object with email address and API Key you received from USAJobs website
	$objUSAJobs = new USAJobs("YourEmailAddress","YourAPIKeyValue");
```

*IMPORTANT NOTE:* If you invoke the getJobListing() method without first setting _any_ query filtering parameters, the USAJobs web server will return a 503 Error/Service Unavailable error.

In the next step of our example, I'm going to limit my search results to jobs within the Department of Interior that contain the keyword of "archeologist."

```html

	// let's set a keyword parameter
	$objUSAJobs->setKeyword("archeologist");
	
	// let's limit our search to jobs listed within the Department of The Interior
	$objUSAJobs->setOrganization("IN");
```

Once you've set your query parameters as desired, use the getJobListing() method to get the matching search results. The results will be returned in JSON format, so you'll probably want to decode them if you want to do any further manipulation on the server side.

```html
	// retrieve the job listings that match our criteria
	$jobsJSON = $objUSAJobs->getJobListing();
	
	// since results are in JSON format, we must decode them
	$jobs = json_decode($jobsJSON);
?>
```

In the example above, $jobs is a complex PHP variable. I'd suggest dumping it with a [print_r function](http://php.net/manual/en/function.print-r.php) to get a sense of the structure returned by the Search API. You'll find it contains both the job listings and metadata about the query.
