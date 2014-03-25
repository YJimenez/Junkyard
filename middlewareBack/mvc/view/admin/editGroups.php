
<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/admin/adminStyle.css"/>
        <title>Middleware Admin</title>
    </head>
 
    <body>
 
        <header>
            <nav>
                <?php include "view/admin/menu.php"; ?>
            </nav>
        </header>
 
        <section>        
            <article>
             
                 <br>
                
                <form action="?section=adminEditGroups" method="post">
                    <table align="center" width="80%">
                         <?php if($success==1) { ?>
                    <tr>
                        <th colspan="2" class="success">Group <?php echo $property_name; ?> edited</th>
                    </tr>
                    <?php } 
                        if($success==2) { ?>
                    <tr>
                        <th colspan="2" class="errorS">Group <?php echo $property_name; ?> already exists in the middleware</th>
                    </tr>
                    <?php } 
                    ?>
                       <tr>
                            <th colspan="2">Edit Group</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Group:</td>
                            <td>
                                <input type="text" id="group_name" name="group_name" value="<?php echo $group[0]['group_name'];?>">
                                <?php if($errorName) echo "<span class='error'>The Group must contain a minimum of 1 character</span>"; ?>
                                <input type="hidden" name="id" id="id" value="<?php echo $group[0]['idGroup'];?>">
                            </td>
                        </tr>
                      
                       
                        
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit">
                            </td>
                        </tr>
                    </table>
                </form>
                
            </article>
        </section>
 
        <aside>
        </aside>
 
        <footer>
        </footer>
    </body> 
</html>