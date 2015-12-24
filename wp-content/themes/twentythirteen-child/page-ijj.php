<?php
/**
 * Template Name: IJJ - LV
 *
 */
?>


<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<?php
		// get the current page url (used for rel canonical and open graph tags)
		global $current_url;
		$current_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
	    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sm.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-med.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-lg.png" />
	    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/poy2014.css">
	    	    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/ijj-lv.css">
	    <script src="http://d3js.org/d3.v3.min.js"></script>
		<script src="http://d3js.org/topojson.v1.min.js"></script>
		<script src="http://datamaps.github.io/scripts/datamaps.usa.min.js"></script>





	    <!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<?php include_once("analyticstracking.php") ?>

		<div class="main-container" style="position:relative">
	  		<header class="poy-header">
	  			<div class="poy-head-inner">
	  				<div class="poy-logo">
	  					<a href="http://www.vivelohoy.com"><img src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/images/hoy-logo.png"></a>

                        <div class="poy-share"><span style="padding-top: 8px; display: inline-block">COMPÁRTELO:</span>
                            <?php
                                $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
                                $facebook_share_link .= urlencode(get_permalink());
                            ?>
                            <a style="border-bottom:none !important" class="twitter-share-link" href="" target="_blank">
                                <span class="genericon genericon-twitter" style="color: #55acee; margin: 0; width: 35px"></span>
                            </a>
                            <a style="border-bottom:none !important" href="<?php echo $facebook_share_link; ?>" style="padding-right:15px" target="_blank">
                                <span class="genericon genericon-facebook" style="margin-right: 0; color:#3b5998; width: 35px"></span>
                            </a>
                        </div>

                    </div>

	  			</div>
	  		</header>
	  		<div class="mobile" style="position: relative;">
	  			<img width="100%" src="http://www.luciovilla.com/wp-content/uploads/2015/01/ijj3.jpg">

		  		<div class="ijj-title">
		  			<h1>Access to healthcare in the US for undocumented children</h1>
		  			<p>By Lucio Villa</p>
		  		</div>
			</div>
	  		<div class="ijj-content">
	  			<p>Currently there is no national federally funded program that provided health care to undocumented
	  				children in the US.</p>

				<p>Emergency health care is however available to undocumented immigrants through the Emergency Medical
					Treatment and Active Labor Act (EMTALA) of 1986. The law states, “any patient arriv­ing at an Emer­gency
					Depart­ment (ED) in a hos­pi­tal that par­tic­i­pates in the Medicare pro­gram must be given an ini­tial
					screen­ing, and if found to be in need of emer­gency treat­ment (or in active labor), must be treated
					until sta­ble.”</p>

				<p>Some states and local governments use their funds to offer health care to undocumented children. In
					the State of Illinois, the All Kids Act offers health coverage to children under the age of 19 and
					even undocumented children.</p>

				<p>As of 2004, 21 states used their funds to provide health care to some or all undocumented children
					who are not able to apply for Medicaid or State Children's Health Insurance Program (SCHIP). States
					like Florida have capped their funding and have a waiting list for undocumented children under SCHIP.
					District of Columbia also offer health care to undocumented children and its capped at around 800
					children, with a one-to-two month waiting list.</p>

		  		<article>
		          <div class="map-title">
		          	<h3>States Offering Healthcare to Undocumented Children</h3>
		          	<span>The Kaiser Commission on Medicaid and the Uninsured: 2004</span>
	      		  </div>
		          <div class="map" id="map_election" style="position:relative; width:860px; height: 500px; margin: 0 auto"></div>
		          <script data-info="Map source for US Election map and labels plugin">
					var election = new Datamap({
					  scope: 'usa',
					  element: document.getElementById('map_election'),
					  geographyConfig: {
					   popupTemplate: function(geography, data) {
					      return '<div class="hoverinfo"><strong>' + geography.properties.name + '</strong> <br />' +  data.electoralVotes + ' </div>'
					    },
					    highlightBorderWidth: 3
					  },

					  fills: {
					  'health': '#A6E1F5',
					  defaultFill: '#C2C2C2'
					},
					data:{
					  "AZ": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "CO": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "DE": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified or other lawfully residing immigrants. Subject to availability of state funds.'
					  },
					  "FL": {
					      "fillKey": "health",
					      "electoralVotes": 'Children regardless of immigration status. Funding is capped; current waiting list.'
					  },
					  "GA": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "HI": {
					      "fillKey": "health",
					      "electoralVotes": 'Lawful permanent residents who arrived on or after August 22, 1996, PRUCOL immigrants, and children who are citizens of the Freely Associated States.'
					  },
					  "ID": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "IL": {
					      "fillKey": "health",
					      "electoralVotes": 'Children who are qualified immigrants or lawfully residing immigrants and other qualified immigrants who are victims of domestic violence.'
					  },
					  "IN": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "IA": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "KS": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "KY": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "LA": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "MD": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified immigrants.'
					  },
					  "ME": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified immigrants and PRUCOLs.'
					  },
					  "MA": {
					      "fillKey": "health",
					      "electoralVotes": 'Children’s coverage regardless of immigration status with cost-sharing for those with incomes over poverty level.'
					  },
					  "MN": {
					      "fillKey": "health",
					      "electoralVotes": 'Prenatal care and victims of torture regardless of immigration status. Other qualified immigrants and other lawfully residing immigrants.'
					  },
					  "MI": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "MS": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "MO": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "MT": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "NC": {
					      "fillKey": " ",
					      "electoralVotes": 'N/A'
					  },
					  "NE": {
					      "fillKey": "health",
					      "electoralVotes": 'Prenatal care regardless of immigration status. Other qualified immigrants.'
					  },
					  "NV": {
					      "fillKey": " ",
					      "electoralVotes": 'N/A'
					  },
					  "NH": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "NJ": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified immigrants.'
					  },
					  "NY": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified immigrants and PRUCOLs. No immigration test for pregnant women seeking prenatal care or children.'
					  },
					  "ND": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "NM": {
					      "fillKey": "health",
					      "electoralVotes": 'PRUCOLs that arrived prior to August 22, 1996.'
					  },
					  "OH": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "OK": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "OR": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "PA": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified immigrants and PRUCOLs.'
					  },
					  "RI": {
					      "fillKey": "health",
					      "electoralVotes": 'Children’s coverage regardless of immigration status.'
					  },
					  "SC": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "SD": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "TN": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "TX": {
					      "fillKey": "health",
					      "electoralVotes": "Qualified immigrants."
					  },
					  "UT": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "WI": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "VA": {
					      "fillKey": "health",
					      "electoralVotes": 'Qualified immigrants and PRUCOLs.'
					  },
					  "VT": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "WA": {
					      "fillKey": "health",
					      "electoralVotes": 'all immigrant children are eligible for Basic Health, which has limited benefits, cost-sharing, and a waiting list.'
					  },
					  "WV": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "WY": {
					      "fillKey": "health",
					      "electoralVotes": 'Certain qualified battered immigrants and immigrants paroled into the U.S. for more than one year. Coverage for the latter group is limited to one year.'
					  },
					  "CA": {
					      "fillKey": "health",
					      "electoralVotes": ' Qualified immigrants and PRUCOLs. SCHIP limited to qualified immigrants.'
					  },
					  "CT": {
					      "fillKey": "health",
					      "electoralVotes": ' Qualified or other lawfully residing immigrants.'
					  },
					  "AK": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "AR": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "AL": {
					      "fillKey": "",
					      "electoralVotes": 'N/A'
					  },
					  "DC": {
					  	"fillKey": "health",
					  	"electoralVotes": ' Children regardless of immigration status; capped at around 800 children; current one to two month waiting list.'
					  }
					}
					});
					election.labels();
			        </script>
		        </article>
					<p>Throughout the US, there are other providers that offer health care to undocumented children. They
					are public/non-profit hospitals, migrant health and federally qualified community health centers
					(FQHC). The FQHCs are non-profit centers that receive grants under Section 330 of the Public Health
					Service Act (PHS) of 1944.</p>

					<p>Since the passing of the Personal Responsibility and Work Opportunity Act (PRWORA) of 1996,
						undocumented immigrants who had Permanent Residence Under Color of Law (PRUCOL) status were
						eligible for Medicaid, but PRWORA removed their eligibility. This has made a big impact on
						contributing to the high rates of undocumented children with no access to health care. Although
						there are some options for undocumented children to have access to healthcare, many parents do
						not know about these options due to the fear of deportation or just because they are not aware
						of these options.</p>

					<p>In 2002, 40% of undocumented children who live in the states that offer health care still had
						no health insurance and 57% were uninsured in states that did not offer health care.</p>

					<p>For the children who do take advantage of the health care options in their state, they face a
						new struggle after they are no longer considered children.</p>

					<div style="max-width: 620px; margin: 0 auto; margin-bottom:30px"><img width="100%" src="http://www.luciovilla.com/projects/care/img/3.jpg"></div>

					<p>Jorge Mariscal, who is now 26 years old, received medical treatment under the All Kids Act of
						Illinois when he was diagnosed with kidney failure at age 16. When he no longer was able to get
						treatment through the All Kids Act, his mother reached out to the community of Little Village.
						Through protests, rallies and a 3-week hunger strike they were able to get a pro-bono kidney
						transplant at Loyola Medical University in 2012.</p>


					<br><br>
					<p> - This story was made possible through the Institute for Justice and Journalism's Immigration in the Heartland fellowship.</p>




	  		</div>




  		</div>












		<?php render_omniture_tag(); ?>
		<?php wp_footer(); ?>
	</body>
</html>
