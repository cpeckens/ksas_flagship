<?php
require_once TEMPLATEPATH . "/assets/functions/GoogleSearch.php";
get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<h2>Search Results</h2>
		<section>

<?php 
try {
    $search = new KSAS_GoogleSearch();
    $resultsPageNum = 1;
    if (array_key_exists('resultsPageNum', $_REQUEST)) {
        $resultsPageNum = $_REQUEST['resultsPageNum'];
    }
    $resultsPerPage = 10;
    $baseQueryURL = 'http://search.johnshopkins.edu/search?site=krieger_collection&client=ksas_frontend';
    $results = $search->query($_REQUEST['q'], $baseQueryURL, $resultsPageNum, $resultsPerPage);
     
    $hits = $results->getNumHits();
    $displayQuery = $results->getDisplayQuery();
    $docTitle = 'Search Results';
    ?>
            <div class="section" style="clear: none; width: 450px;">

    <?php
    if ($hits > 0) {
        ?>
                <div id="search-summary">
                    Results <strong><?php echo $results->getFirstResultNum() ?> - <?php echo $results->getLastResultNum() ?></strong> of about <strong><?php echo $hits ?></strong>
                </div>
            </div>
             
            <div class="section listing" id="search-results">
                <ul>
        <?php
        while ($result = $results->getNextResult()) {
            // note what results are PDFs
            $pdfNote = '';
            if (preg_match('{application/pdf}', $result['mimeType'])) {
                $pdfNote = '<span class="doctypenote">[PDF]</span> ';
            }
            ?>
                    <li>
                        <h4><?php echo $pdfNote ?><a href="<?php echo $result['path'] ?>"><?php echo $result['title'] ?></a></h4>
            <?php
            if (array_key_exists('description', $result) && $result['description']) {
                ?>
                        <p><?php echo $result['description'] ?></p>
                <?php
            }
            ?>
                        <div class="url"><?php echo $result['localURL'] ?> - <?php echo $result['sizeHumanReadable'] ?></div>
                    </li>
            <?php
        }
        ?>
                </ul>
            </div>
             
            <div class="section">
        <?php
            $notices = $results->getNotices();
            foreach ($notices as $notice) {
                ?>
                <p class="notice"><?php echo $notice ?></p>
                <?php
            }
        ?>
                <div id="search-pages">
                    Result page: 
        <?php
        foreach ($results->getResultsetLinks() as $resultsetLink) {
            print "$resultsetLink ";
        }
        ?>
                    <?php echo $results->getNextLink() ?> <img class="more" src="/images/layout/bullet.gif" alt="&gt;" />
                </div>
                 
                <form class="search-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                    <fieldset>
                        <input type="text" class="input-text" name="query" value="<?php echo $displayQuery ?>" />
                        <input type="submit" class="input-submit" value="Search" />
                        <a href="/search/help.html" class="search-help">Search help</a>
                    </fieldset>
                </form>
            </div>
        <?php
    } else {
        // no hits
        ?>
            </div>
             
        <?php
            $notices = $results->getNotices();
            foreach ($notices as $notice) {
                ?>
            <p class="notice"><?php echo $notice ?></p>
                <?php
            }
        ?>
             
            <p style="font-weight: bold;">There are no pages matching your search.</p>
        <?php
    }
} catch (KSAS_GoogleSearchException $e) {
    $docTitle = "Search Temporarily Unavailable";
    ?>
    <div class="section">
        <p>We're sorry, the search engine is temporarily unavailable. Please try your search again later.</p>
    </div>
    <?php
} ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>  