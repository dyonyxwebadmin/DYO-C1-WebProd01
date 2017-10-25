Simple CMS System Setup:

1) Create data structure
	
		CREATE TABLE `site_content` (
		  `id` int(11) NOT NULL,
		  `path` varchar(64) DEFAULT NULL,
		  `block` varchar(45) DEFAULT NULL,
		  `content` text,
		  `start_date` datetime DEFAULT NULL,
		  `end_date` datetime DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8$$
		
2) Include CSS:

	@import url("/core/cms/css/cms.css");
	
	or 
	
    <link href="/core/cms/css/cms.css" rel="stylesheet">		
	
3) Include JS:

	<script src="/core/cms/js/cms.js"></script>
	
4) Set the content block tag:

	<?php cms("team_content"); ?>




	<?php cms("header-p-3", "::Lipsum", true, 50); ?>


	
	NOTE: make sure you set a unique tag id for the block!