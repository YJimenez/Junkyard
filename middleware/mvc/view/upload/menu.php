        <section> 
        	       
            <ul class="menu">
	            
	            <?php if($_SESSION['ooyalaUser']['profile']==1||$_SESSION['ooyalaUser']['admin']) { ?>
	            <li>
		            <a href="index.php">Video Upload</a>
	            </li>
	            <li>
		            |
	            </li>
	            <?php } ?>
				
				<?php if($_SESSION['ooyalaUser']['profile']<=2||$_SESSION['ooyalaUser']['admin']) { ?>

	             <li>
		            <a href="?section=localVideos">Local Videos</a>
	            </li>
	             <li>
		            |
	            </li>
	            <?php } ?>

	            <?php if($_SESSION['ooyalaUser']['profile']==1||$_SESSION['ooyalaUser']['profile']==3||$_SESSION['ooyalaUser']['admin']) { ?>
	             <li>
		            <a href="?section=ooyalaVideos">Ooyala Videos</a>
	            </li>
	             <li>
		            |
	            </li>
	            <?php } ?>

	            <?php if($_SESSION['ooyalaUser']['profile']==1||$_SESSION['ooyalaUser']['admin']) { ?>
	             <li>
		            <a href="?section=newLabel">New Label</a>
	            </li>
<<<<<<< HEAD
	            <li>
		            |
	            </li>
	            <li>
		            <a href="?section=newPlaylist">New Playlist</a>
	            </li>
	            <?php if($_SESSION['ooyalaUser']['admin']) { ?>
=======

>>>>>>> FETCH_HEAD
	            <li>
		            |
	            </li>
	            <?php } ?>
	            
	            <?php if($_SESSION['ooyalaUser']['admin']) { ?>
	            
	            <li>
		            <a href="admin.php">System Admin</a>
	            </li>
	           
	            
	            <li>
		            |
	            </li>
	             <?php } ?>
	            <li>
		            <a href="?section=exit">Exit</a>
	            </li>
            </ul>
        </section>
