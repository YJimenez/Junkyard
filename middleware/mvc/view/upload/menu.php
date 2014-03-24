        <section> 
        	       
            <ul class="menu">
	            <li>
		            <a href="index.php">Video Upload</a>
	            </li>
	            <li>
		            |
	            </li>
	             <li>
		            <a href="?section=localVideos">Local Videos</a>
	            </li>
	             <li>
		            |
	            </li>
	             <li>
		            <a href="?section=ooyalaVideos">Ooyala Videos</a>
	            </li>
	             <li>
		            |
	            </li>
	             <li>
		            <a href="?section=newLabel">New Label</a>
	            </li>
	            <li>
		            |
	            </li>
	            <li>
		            <a href="?section=newPlaylist">New Playlist</a>
	            </li>
	            <?php if($_SESSION['ooyalaUser']['admin']) { ?>
	            <li>
		            |
	            </li>
	            <li>
		            <a href="admin.php">System Admin</a>
	            </li>
	            <?php } ?>
	            <li>
		            |
	            </li>
	            <li>
		            <a href="?section=exit">Exit</a>
	            </li>
            </ul>
        </section>
