
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
                
                <form action="?section=adminEditProperties" method="post">
                    <table align="center" width="80%">
                         <?php if($success==1) { ?>
                    <tr>
                        <th colspan="2" class="success">Property <?php echo $property_name; ?> edited</th>
                    </tr>
                    <?php } 
                        if($success==2) { ?>
                    <tr>
                        <th colspan="2" class="errorS">Property <?php echo $property_name; ?> already exists in the middleware</th>
                    </tr>
                    <?php } 
                    ?>
                       <tr>
                            <th colspan="2">Edit Property</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Property:</td>
                            <td>
                                <input type="text" id="property_name" name="property_name" value="<?php echo $property[0]['property_name'];?>">
                                <?php if($errorName) echo "<span class='error'>The property must contain a minimum of 1 character</span>"; ?>
                            </td>
                        </tr>
                      
                        <tr>
                            <td>Group:</td>
                            <td>
                                <select id="group" name="group">
                                    <?php foreach($groups as $group) { 
                                        $selected=$property[0]['fkgroup']==$group['idGroup']?"selected='selected'":""; ?>
                                    <option value="<?php echo $group['idGroup'];?>" <?php echo $selected; ?>><?php echo $group['group_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="id" id="id" value="<?php echo $property[0]['idProperty'];?>">
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