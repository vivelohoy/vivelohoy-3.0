<?php

                      function print_author_html( $author = null ) {
                      	global $post;
                            ?>

<?php

	$custom_args = array(
      'post_type'     => 'post',
      'posts_per_page' => 1,
	  'category_name' => 'opinion',
	  'author_name' => $author,
	  'no_found_rows' => true
	);
	$custom_query = new WP_Query( $custom_args );

    if ( $custom_query->have_posts() ) {
        while ( $custom_query->have_posts() ) {
            $custom_query->the_post();

            $post_excerpt = get_the_excerpt();
            $post_title = get_the_title();
?>

    <h2 class="colm-title">
		<a href="http://www.newyorker.com/news/john-cassidy/jeb-bushs-call-for-war">
			<span itemprop="headline"><?php echo $post_title; ?></span>
		</a>
	</h2>
	<p class="p-summary">
		<?php echo $post_title; ?>
	</p>

<?php
        }  // ends while ( $custom_query->have_posts() )
    } // ends if ( $custom_query->have_posts() )
    wp_reset_query();
?>
<!-- end ul.slides -->
<?php
}

?>




<div id="columnistas">

    <h5 class="popping">COLUMNISTAS</h5>
    <div class="stories">

		<article class="single-columnist" style="padding-right: 3%;">
			<figure class="content-image-wrapper">
				<a href="http://www.vivelohoy.com/author/raulgbuisan">
					<img src="http://www.vivelohoy.com/wp-content/uploads/2015/05/r-150x150.jpg">
				</a>
			</figure>

  			<section>
				<h4 class="rubric">
					<a href="http://www.vivelohoy.com/author/raulgbuisan">Raúl González Buisán</a>
				</h4>
	      		<?php print_author_html('raulgbuisan'); ?>
			</section>
		</article>

		<article class="single-columnist" style="padding-right: 3%;">
			<figure class="content-image-wrapper">
				<a href="http://www.vivelohoy.com/author/gabriel-muhr">
					<img src="http://www.vivelohoy.com/wp-content/uploads/2014/09/gmur-150x150.jpg" alt="">
				</a>
			</figure>

  			<section>
				<h4 class="rubric">
					<a href="http://www.vivelohoy.com/author/gabriel-muhr">Gabriel Muhr</a>
				</h4>
	      		<h2 class="colm-title">
	      			<a href="http://www.newyorker.com/news/john-cassidy/jeb-bushs-call-for-war">
	      				<span itemprop="headline">Jeb Bush’s Call for War</span>
	      			</a>
	      		</h2>
				<p class="p-summary" itemprop="description">
					Was this just another example of Jeb mangling his words? Apparently not.
				</p>
			</section>
		</article>

		<article class="single-columnist">
			<figure class="content-image-wrapper">
				<a href="http://www.vivelohoy.com/author/rafael_duque" title="" itemprop="url">
					<img src="http://www.vivelohoy.com/wp-content/uploads/2014/12/Rafael-Duque-Picture-150x150.jpeg" alt="">
				</a>
			</figure>

  			<section>
				<h4 class="rubric">
					<a href="http://www.vivelohoy.com/author/rafael_duque">Rafael Duque</a>
				</h4>
	      		<h2 class="colm-title">
	      			<a href="http://www.newyorker.com/news/john-cassidy/jeb-bushs-call-for-war">
	      				<span itemprop="headline">Jeb Bush’s Call for War</span>
	      			</a>
	      		</h2>
				<p class="p-summary" itemprop="description">
					Was this just another example of Jeb mangling his words? Apparently not.
				</p>
			</section>
		</article>

		<article class="single-columnist" style="padding: 20px 3% 0 0;">
			<figure class="content-image-wrapper">
				<a href="http://www.vivelohoy.com/author/oscar-muller-creel">
					<img src="http://0.gravatar.com/avatar/315115f684f5aec2017b26e03f60ae75?s=120&d=http%3A%2F%2Fwww.vivelohoy.com%2Fwp-content%2Fuploads%2F2014%2F09%2Fsquare_logo-150x150.png" alt="">
				</a>
			</figure>

  			<section>
				<h4 class="rubric">
					<a href="http://www.vivelohoy.com/author/oscar-muller-creel">Óscar Müller Creel</a>
				</h4>
	      		<h2 class="colm-title">
	      			<a href="http://www.newyorker.com/news/john-cassidy/jeb-bushs-call-for-war">
	      				<span itemprop="headline">Jeb Bush’s Call for War</span>
	      			</a>
	      		</h2>
				<p class="p-summary" itemprop="description">
					Was this just another example of Jeb mangling his words? Apparently not.
				</p>
			</section>
		</article>

		<article class="single-columnist" style="padding: 20px 3% 0 0;">
			<figure class="content-image-wrapper">
				<a href="http://www.vivelohoy.com/author/francisco-martin-moreno">
					<img src="http://www.vivelohoy.com/wp-content/uploads/2015/07/Screen-Shot-2015-07-01-at-4.20.04-PM-150x150.png" alt="">
				</a>
			</figure>

  			<section>
				<h4 class="rubric">
					<a href="http://www.vivelohoy.com/author/francisco-martin-moreno">Francisco Martín Moreno</a>
				</h4>
	      		<h2 class="colm-title">
	      			<a href="http://www.newyorker.com/news/john-cassidy/jeb-bushs-call-for-war">
	      				<span itemprop="headline">Jeb Bush’s Call for War</span>
	      			</a>
	      		</h2>
				<p class="p-summary" itemprop="description">
					Was this just another example of Jeb mangling his words? Apparently not.
				</p>
			</section>
		</article>

		<article class="single-columnist" style="padding: 20px 0 0;">
			<figure class="content-image-wrapper">
				<a href="http://www.newyorker.com/news/john-cassidy" title="" itemprop="url">
					<img src="http://www.newyorker.com/wp-content/assets/dist/img/header_graphics/contributors/cassidy.png" alt="">
				</a>
			</figure>

  			<section>
				<h4 class="rubric">
					<a href="http://www.newyorker.com/news/john-cassidy" title="John Cassidy" itemprop="articleSection">John Cassidy</a>
				</h4>
	      		<h2 class="colm-title">
	      			<a href="http://www.newyorker.com/news/john-cassidy/jeb-bushs-call-for-war">
	      				<span itemprop="headline">Jeb Bush’s Call for War</span>
	      			</a>
	      		</h2>
				<p class="p-summary" itemprop="description">
					Was this just another example of Jeb mangling his words? Apparently not.
				</p>
			</section>
		</article>

	</div>

</div>



<style type="text/css">

#columnistas {
    padding: 50px 0 30px;
    text-align: center;
    border-bottom: 1px solid #ccc;
    position: relative;
    width: 100%;
    vertical-align: baseline;
}
.single-columnist{
	box-sizing: content-box;
    padding-bottom: 0;
    width: 31.33%;
    float: left;
    padding: 20px 0;
    position: relative;
    text-align: center;
}
.single-columnist img{
	    margin: 0 auto;
    max-width: 70px;
}

.single-columnist.section{
	width: 100%;
	float: right;
}
.rubric{
	    color: #df3331;
    font-size: 12px;
    line-height: 13px;
    margin-bottom: 12px;
}
.single-columnist h2{
	    font-size: 20px;
    line-height: 23px;
        margin: 0 0 8px;
}
.p-summary{
	font-size: 17px;
    line-height: 21px;
    margin-bottom: 0;
}
.stories{
	overflow: visible;
    position: relative;
    vertical-align: top;
    box-sizing: border-box;
	margin: 0;
    padding: 0;
    border: 0;
    font-size: 1.6rem;
    font: inherit;
    text-align: center;
}
.stories:after{
	    content: "";
    display: table;
    clear: both;
}
.colm-title a{
   	color: #333 !important;
    border-bottom: none;
}
.rubric a{
	color:#EF3224 !important;
	border-bottom: none;
}

</style>