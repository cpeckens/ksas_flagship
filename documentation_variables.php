<?
// ************POST TYPE: FIELDS OF STUDY - SLUG: studyfields************
$taxonomies_4_metabox = array( 
	'id' => 'taxonomies',
	'title' => 'Taxonomies',
	'page' => array('studyfields'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(

				
				array(
					'name' 			=> 'Discipline',
					'desc' 			=> '',
					'id' 				=> 'ecpt_discipline',
					'class' 			=> 'ecpt_discipline',
					'type' 			=> 'multicheck',
					'rich_editor' 	=> 1,			
					'options' => array('Humanities','Social Sciences','Natural Sciences'),
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Structure',
					'desc' 			=> '',
					'id' 				=> 'ecpt_structure',
					'class' 			=> 'ecpt_structure',
					'type' 			=> 'select',
					'rich_editor' 	=> 1,			
					'options' => array('Department','Interdisciplinary','The Arts'),
					'max' 			=> 0				
				),
				)
);			
			

$basicinformation_5_metabox = array( 
	'id' => 'basicinformation',
	'title' => 'Basic Information',
	'page' => array('studyfields'),
	'context' => 'normal',
	'priority' => 'default',
	'fields' => array(

				
				array(
					'name' 			=> 'Phone Number',
					'desc' 			=> '',
					'id' 				=> 'ecpt_phonenumber',
					'class' 			=> 'ecpt_phonenumber',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Email Address',
					'desc' 			=> '',
					'id' 				=> 'ecpt_emailaddress',
					'class' 			=> 'ecpt_emailaddress',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Majors',
					'desc' 			=> 'Separate with commas',
					'id' 				=> 'ecpt_majors',
					'class' 			=> 'ecpt_majors',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Minors',
					'desc' 			=> 'Separate with commas',
					'id' 				=> 'ecpt_minors',
					'class' 			=> 'ecpt_minors',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Degrees Offered',
					'desc' 			=> 'Separate with commas',
					'id' 				=> 'ecpt_degreesoffered',
					'class' 			=> 'ecpt_degreesoffered',
					'type' 			=> 'text',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Location',
					'desc' 			=> 'Building and room number only',
					'id' 				=> 'ecpt_location',
					'class' 			=> 'ecpt_location',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				)
);			
			

$websiteurls_6_metabox = array( 
	'id' => 'websiteurls',
	'title' => 'Website URLs (do NOT include http://)',
	'page' => array('studyfields'),
	'context' => 'normal',
	'priority' => 'default',
	'fields' => array(

				
				array(
					'name' 			=> 'Homepage',
					'desc' 			=> 'Required for all',
					'id' 				=> 'ecpt_homepage',
					'class' 			=> 'ecpt_homepage',
					'type' 			=> 'text',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Faculty page',
					'desc' 			=> 'Only for departments',
					'id' 				=> 'ecpt_facultypage',
					'class' 			=> 'ecpt_facultypage',
					'type' 			=> 'text',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Undergraduate program page',
					'desc' 			=> 'Only for departments',
					'id' 				=> 'ecpt_undergraduatepage',
					'class' 			=> 'ecpt_undergraduatepage',
					'type' 			=> 'text',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Graduate program page',
					'desc' 			=> 'Only for departments',
					'id' 				=> 'ecpt_graduatepage',
					'class' 			=> 'ecpt_graduatepage',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				)
);			
			

$calloutbox_7_metabox = array( 
	'id' => 'calloutbox',
	'title' => 'Callout Box',
	'page' => array('studyfields'),
	'context' => 'normal',
	'priority' => 'default',
	'fields' => array(

				
				array(
					'name' 			=> 'Title',
					'desc' 			=> '',
					'id' 				=> 'ecpt_title',
					'class' 			=> 'ecpt_title',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Content',
					'desc' 			=> 'Please format as bulleted list',
					'id' 				=> 'ecpt_content',
					'class' 			=> 'ecpt_content',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
				)
);			
			

$maincontent_8_metabox = array( 
	'id' => 'maincontent',
	'title' => 'Main Content',
	'page' => array('studyfields'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

				
				array(
					'name' 			=> 'Section 1 Content',
					'desc' 			=> 'This is the main description',
					'id' 				=> 'ecpt_section1',
					'class' 			=> 'ecpt_section1',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Section 2 Heading',
					'desc' 			=> 'This field is optional.  Defaults to: What can you do with your degree?',
					'id' 				=> 'ecpt_section2heading',
					'class' 			=> 'ecpt_section2heading',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Section 2 Content',
					'desc' 			=> '',
					'id' 				=> 'ecpt_section2content',
					'class' 			=> 'ecpt_section2content',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Section 3 Heading',
					'desc' 			=> 'This field is optional. Defaults to: Related programs and centers',
					'id' 				=> 'ecpt_section3heading',
					'class' 			=> 'ecpt_section3heading',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Section 3 Content',
					'desc' 			=> '',
					'id' 				=> 'ecpt_section3content',
					'class' 			=> 'ecpt_section3content',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 1,			
					'max' 			=> 0				
				),
				)
);			
			

			

$topsection_10_metabox = array( 
	'id' => 'topsection',
	'title' => 'Top Section',
	'page' => array('studyfields'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

				
				array(
					'name' 			=> 'Headline',
					'desc' 			=> '',
					'id' 				=> 'ecpt_headline',
					'class' 			=> 'ecpt_headline',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Subhead',
					'desc' 			=> '',
					'id' 				=> 'ecpt_subhead',
					'class' 			=> 'ecpt_subhead',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Image',
					'desc' 			=> 'This is the image that displays on the landing page',
					'id' 				=> 'ecpt_image',
					'class' 			=> 'ecpt_image',
					'type' 			=> 'upload',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				)
);			
			
$indexing_11_metabox = array( 
	'id' => 'indexing',
	'title' => 'Indexing',
	'page' => array('studyfields'),
	'context' => 'side',
	'priority' => 'default',
	'fields' => array(

				
				array(
					'name' 			=> 'Index Image',
					'desc' 			=> 'This is the thumbnail image that displays on the fields of study index page',
					'id' 				=> 'ecpt_indeximage',
					'class' 			=> 'ecpt_indeximage',
					'type' 			=> 'upload',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Keywords',
					'desc' 			=> 'These will not be displayed.  These are for search terms only. No commas necessary',
					'id' 				=> 'ecpt_keywords',
					'class' 			=> 'ecpt_keywords',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				)
);			
			
// ************POST TYPE - BIG IDEAS - SLUG: evergreen************

$imageuploads_3_metabox = array( 
	'id' => 'imageuploads',
	'title' => 'Image Uploads',
	'page' => array('evergreen'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

				
				array(
					'name' 			=> 'Full Image',
					'desc' 			=> '',
					'id' 				=> 'ecpt_fullimage',
					'class' 			=> 'ecpt_fullimage',
					'type' 			=> 'upload',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				array(
					'name' 			=> 'Tablet Image',
					'desc' 			=> '',
					'id' 				=> 'ecpt_tabletimage',
					'class' 			=> 'ecpt_tabletimage',
					'type' 			=> 'upload',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				array(
					'name' 			=> 'Mobile Image',
					'desc' 			=> '',
					'id' 				=> 'ecpt_mobileimage',
					'class' 			=> 'ecpt_mobileimage',
					'type' 			=> 'upload',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				)
);

// ************DEPARTMENT SPOTLIGHTS************
				array(
					'name' 			=> 'Video',
					'desc' 			=> 'Insert iframe code here. This is for department spotlights online',
					'id' 				=> 'ecpt_spotlightvideo',
					'class' 			=> 'ecpt_spotlightvideo',
					'type' 			=> 'textarea',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
							
				array(
					'name' 			=> 'Gallery',
					'desc' 			=> 'Insert gallery short code here.  This is for department spotlights only.',
					'id' 				=> 'ecpt_gallery',
					'class' 			=> 'ecpt_gallery',
					'type' 			=> 'text',
					'rich_editor' 	=> 0,			
					'max' 			=> 0				
				),
				)
);		

//**********TAXONOMY: ACADEMIC DEPARTMENT - Slug: academicdepartment**************
	function add_academicdepartment_terms() {
		wp_insert_term('Anthropology', 'academicdepartment',  array('description'=> '','slug' => 'anthropology'));
		wp_insert_term('Biology', 'academicdepartment',  array('description'=> '','slug' => 'bio'));
		wp_insert_term('Biophysics', 'academicdepartment',  array('description'=> '','slug' => 'biophysics'));
		wp_insert_term('Chemistry', 'academicdepartment',  array('description'=> '','slug' => 'chemistry'));
		wp_insert_term('Classics', 'academicdepartment',  array('description'=> '','slug' => 'classics'));
		wp_insert_term('Cognitive Science', 'academicdepartment',  array('description'=> '','slug' => 'cogsci'));
		wp_insert_term('Earth and Planetary Sciences', 'academicdepartment',  array('description'=> '','slug' => 'eps'));
		wp_insert_term('Economics', 'academicdepartment',  array('description'=> '','slug' => 'econ'));
		wp_insert_term('English', 'academicdepartment',  array('description'=> '','slug' => 'english'));
		wp_insert_term('German and Romance Languages', 'academicdepartment',  array('description'=> '','slug' => 'grll'));
		wp_insert_term('History', 'academicdepartment',  array('description'=> '','slug' => 'history'));
		wp_insert_term('History of Art', 'academicdepartment',  array('description'=> '','slug' => 'arthist'));
		wp_insert_term('History of Science and Technology', 'academicdepartment',  array('description'=> '','slug' => 'host'));
		wp_insert_term('Humanities', 'academicdepartment',  array('description'=> '','slug' => 'humanities'));
		wp_insert_term('Mathematics', 'academicdepartment',  array('description'=> '','slug' => 'math'));
		wp_insert_term('Near Eastern Studies', 'academicdepartment',  array('description'=> '','slug' => 'neareast'));
		wp_insert_term('Philosophy', 'academicdepartment',  array('description'=> '','slug' => 'philosophy'));
		wp_insert_term('Physics and Astronomy', 'academicdepartment',  array('description'=> '','slug' => 'physics'));
		wp_insert_term('Political Science', 'academicdepartment',  array('description'=> '','slug' => 'polisci'));
		wp_insert_term('Psychological and Brain Sciences', 'academicdepartment',  array('description'=> '','slug' => 'pbs'));
		wp_insert_term('Sociology', 'academicdepartment',  array('description'=> '','slug' => 'soc'));
		wp_insert_term('Writing Seminars', 'academicdepartment',  array('description'=> '','slug' => 'writing'));
		
//**********TAXONOMY: PCI AFFILIATION - Slug: affiliation**************

	function add_affiliation_terms() {
		wp_insert_term('Africana Studies', 'affiliation',  array('slug' => 'africana'));
		wp_insert_term('Archaeology', 'affiliation',  array('slug' => 'archaeology'));	
		wp_insert_term('Astrophysical Sciences', 'affiliation',  array('slug' => 'astro'));
		wp_insert_term('Behavioral Biology', 'affiliation',  array('slug' => 'behavbio'));
		wp_insert_term('Biophysical Research', 'affiliation',  array('slug' => 'biophys'));
		wp_insert_term('Financial Economics', 'affiliation',  array('slug' => 'cfe'));
		wp_insert_term('China STEM', 'affiliation',  array('slug' => 'chinastem'));
		wp_insert_term('CMDB Program', 'affiliation',  array('slug' => 'cmdb'));
		wp_insert_term('East Asian', 'affiliation',  array('slug' => 'eastasian'));
		wp_insert_term('Embryology', 'affiliation',  array('slug' => 'embryo'));
		wp_insert_term('Expository Writing', 'affiliation',  array('slug' => 'ewp'));
		wp_insert_term('Film and Media', 'affiliation',  array('slug' => 'film'));
		wp_insert_term('Applied Economics', 'affiliation',  array('slug' => 'iae'));
		wp_insert_term('International Studies', 'affiliation',  array('slug' => 'international'));
		wp_insert_term('Jewish Studies', 'affiliation',  array('slug' => 'jewish'));
		wp_insert_term('Language Education', 'affiliation',  array('slug' => 'cledu'));
		wp_insert_term('Latin American Studies', 'affiliation',  array('slug' => 'plas'));
		wp_insert_term('Materials Research', 'affiliation',  array('slug' => 'materials'));
		wp_insert_term('Mind Brain Institute', 'affiliation',  array('slug' => 'mindbrain'));
		wp_insert_term('Modern German Thought', 'affiliation',  array('slug' => 'maxkade'));
		wp_insert_term('Museums and Society', 'affiliation',  array('slug' => 'museums'));
		wp_insert_term('Neuroscience', 'affiliation',  array('slug' => 'neuroscience'));
		wp_insert_term('Odyssey', 'affiliation',  array('slug' => 'odyssey'));
		wp_insert_term('Osher Lifelong', 'affiliation',  array('slug' => 'osher'));
		wp_insert_term('Policy Studies', 'affiliation',  array('slug' => 'policystudies'));
		wp_insert_term('Premodern Europe', 'affiliation',  array('slug' => 'singleton'));
		wp_insert_term('Public Health', 'affiliation',  array('slug' => 'publichealth'));
		wp_insert_term('Theatre Arts', 'affiliation',  array('slug' => 'theatre'));
		wp_insert_term('Women Gender and Sexuality', 'affiliation',  array('slug' => 'wgs'));
		wp_insert_term('Writing Center', 'affiliation',  array('slug' => 'writingcenter'));
	}

//**********POST TYPE: PEOPLE - Slug: people**************

//**********POST TYPE: PROFILES/SPOTLIGHTS - Slug: **************
?>