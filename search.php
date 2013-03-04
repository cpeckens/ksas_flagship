<?php
require TEMPLATEPATH . "/assets/functions/Resty.php";
$router->set("/search", function () use ($router) {
    $results = array();
    $perPage = 10;
    $paginationInfo = array();

    if (isset($_GET["q"])) {
        $page = (isset($_GET["page"]) && $_GET["page"] > 1) ? $_GET["page"] : 1;
        
        // We often use Resty as a simple HTTP request/response library
        // See: https://github.com/fictivekin/resty.php
        $http = new Resty();
        $http->setBaseUrl("http://search.johnshopkins.edu/");
        
        $queryData = array(
            "q" => $_GET["q"],
            "site" => "krieger_collection", //Collection Name
            "client" => "krieger_frontend", //
            "output" => "xml_no_dtd"
            );

        if ($page > 1) {
            $queryData["start"] = ($_GET["page"] - 1) * $perPage;
        }
        
        $response = $http->get("/search", $queryData);

        if (is_string($response)) {
            $response = simplexml_load_string($response);
        }
        
        // GoogleSearchResultSet defined here: https://gist.github.com/4612172
        $google = new GoogleSearchResultSet($response);

        if (!isset($google->results)) {
            
            // No results returned
            $google->results = 0;
        
        } else {

            // Send information about pagination into the view
            // NOTE: Outside of Twig, we have to access $google->results
            $totalCount = $google->results->rCount;

            $paginationInfo["pagination"] = array (
                "pageCount" => ceil($totalCount / $perPage),
                "hasPrevious" => $page > 1,
                "hasNext" => (($page * $perPage) < $totalCount),
                "currentPage" => $page
            );

            // Create a page link array with 5 values, with the current page in the center (if possible)
            $start = $page - 2;
            if ($start < 1) { $start = $page - 1; }
            if ($start < 1 ) { $start = $page; }

            $paginationInfo["pagination"]["pageLinks"] = array_keys(array_fill($start, 5, "filler"));

        }

    }
   
    // Render the Twig view, defined: https://gist.github.com/4612315
    View::render("pages/hub/search", (array) $paginationInfo + (array) $google);
    
    
});

