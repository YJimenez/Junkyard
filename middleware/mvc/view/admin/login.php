
<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Website Title</title>
    </head>
 
    <body>
 
        <header>
            <nav>
            </nav>
        </header>
 
        <section>        
            <article>
                Admin Login:<br>
				<form action="" method="post" autocomplete="on">
				  User:<input type="text" name="user" autofocus><br>
				  Password: <input type="password" name="password"><br>
				  <input type="submit">
				</form> 
                <?php if ($error==1) 
                            echo "Wrong Username or Password";
                        else if($error==2)
                            echo "Username and Password can't be empty";
                            ?>
            </article>
        </section>
 
        <aside>
        </aside>
 
        <footer>
        </footer>
    </body> 
</html>