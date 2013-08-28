<?php				// Get a SimplePie feed object from the specified feed source.
					$rss2 = fetch_feed('http://www.rssmix.com/u/3798813/rss.xml');
					if (!is_wp_error( $rss2 ) ) { // Checks that the object is created correctly 
					    // Figure out how many total items there are, but limit it to 3. 
					    $maxitems2 = $rss2->get_item_quantity(5); 
					
					    // Build an array of all the items, starting with element 0 (first element).
					    $rss_items2 = $rss2->get_items(0, $maxitems2); 
					}else {echo 'Not an RSS feed';}	
					?>
					
					    <?php foreach ( $rss_items2 as $item2 ) :  
						    	$url = $item2->get_permalink();
								$parse = parse_url($url);
								$source = $parse['host'];
								$author = $item2->get_authors();
								$student = $author[0]->get_email();
								$guest = $parse['path'];
								$title = esc_html( $item2->get_title() );
								switch($source) {
									case 'prometheus-journal.com' :
										$source_name = 'Prometheus: Undergraduate Journal of Philosophy';
										$subject = 'Philosophy';
									break;
									case 'jhucapetown.blogspot.com' :
										$source_name = 'Public Health Studies in Capetown';
										$subject = 'Public Health';
									break;
									case 'hopkinsmuseumclub.wordpress.com' :
										$source_name = 'Hopkins Museum Club';
										$subject = 'Museum Studies';
									break;
									case 'galwaygirlfall2013.wordpress.com' :
										$source_name = 'Galway Girl: Adventures in Ireland and Beyond';
										$student = 'Rachel S.';
										$subject = 'Political Science';
									break;
									case 'jhuphagehunters.wordpress.com' :
										$source_name = 'Phage Hunters';
										$subject = 'Biology';
									break;
									case 'blogs.hopkins-interactive.com' :
										$source_name = 'Hopkins Interactive';
										$subject = '';
										switch($student) {
											case 'Miranda B.' :
												$source_name = 'Miranda Writes';
												$subject = 'Political Science';
											break;
											case 'Kate T.' :
												$source_name = 'The Breezeway';
												$subject = 'ChemBE and French';
											break;
											case 'Tess T.' :
												$source_name = 'Jay Talking';
												$subject = 'History';
											break;
											case 'Allysa D.' :
												$source_name = 'Life Without Sound';
												$subject = 'International Studies';
											break;
											case 'Lucie F.' :
												$source_name = 'The Lucie Show';
												$subject = 'Writing Seminars';
											break;
											case 'Sydney R.' :
												$source_name = 'Talk Nerdy to Me';
												$subject = 'Biomedical Engineering';
											break;
											case 'Nick G.' :
												$source_name = 'Thoughts of Nick';
												$subject = 'Computer Science and Economics';
											break;
											case 'Trish L.' :
												$source_name = 'Welcome to Lalaland';
												$subject = 'Neuroscience';
											break;
											case 'Kaitlyn C.' :
												$source_name = 'Across the Spectrum';
												$subject = 'International Studies';
											break;
											case 'Ian H.' :
												$source_name = 'Europlan';
												$subject = 'Materials Science and Engineering';
											break;
											case 'Erics Z.' :
												$source_name = 'Books, Thoughts, and Polka Dots';
												$subject = 'Economics';
											break;
											case 'Joseph S.' :
												$source_name = 'Oh, the Humanities!';
												$subject = 'Art History';
											break;
											case 'Kevin C.' :
												$source_name = 'For Cryan Out Loud';
												$subject = 'History';
											break;
											case 'Zoe J.' :
												$source_name = 'A Wise Fool';
												$subject = 'Psychology and English';
											break;
											case 'Ruthie C.' :
												$source_name = 'Ruth Be Told';
												$subject = 'English';
											break;
											case 'Admissions_Shelly' :
												$student = 'Admissions Staff';
												$subject = '';
												$source_name = 'Hopkins Insider';
											break;
											}
									break;
									}
								if (strpos($guest,'guest') !== false) {
									 $student = 'Guest Post';
									 $source_name = 'Hopkins Interactive';
									 $subject = '';
								}

					    ?>
					    <article>
					        <a href="<?php echo esc_url( $url ); ?>">
					        	<h4><?php if( empty($title) == true ) { echo '(Untitled)'; } else { echo $title; } ?></h4>
					        	<p><b>Author:</b>&nbsp;<?php  echo $student; if (empty($subject) == false) { echo ' (' . $subject . ')'; }?><br>
					        	<b>Source:</b>&nbsp; <?php echo $source_name; ?></p>
					        </a>
					    </article>
					    <?php endforeach; ?>