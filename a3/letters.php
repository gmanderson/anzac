<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  require_once("tools.php");

  top_module("ANZAC Douglas Raymond Baker - Letters Home - Letters &amp; Post Cards");
?>
			
		<nav id="sub-nav">
			<ul>
				<li>
					<a href="#1914">1914</a>
				</li>
				<li>
					<a href="#1915">1915</a>
				</li>
				<li>
					<a href="#1916">1916</a>
				</li>
				<li>
					<a href="#1917">1917</a>
				</li>
				<li>
					<a href="#1918">1918</a>
				</li>
			</ul>
		</nav>
		
		<main>
			<h2>Letters & Postcards</h2>
			
			<?php
			
			$associativeRecords = loadDocuments("http://titan.csit.rmit.edu.au/~e54061/wp/letters-home.txt");
			
			?>
			
			<?php
			
			displayCorrespondence($associativeRecords);
		?>
		
			<article id="1914">
				<h3>1914</h3>
				
				<section>
					<h4>December</h4>
					<ol>
						<li>December 11th. 1914. Mena Camp</li>
						
						<li>December, 27th. Mena Camp</li>
					</ol>
				</section>
		
			</article>
		
		</main>
		
<?php

bottom();

?>