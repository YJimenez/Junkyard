
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
                <form action="?section=adminEditUsers" method="post">
                    <table align="center" width="80%">
                         <?php if($success==1) { ?>
                    <tr>
                        <th colspan="7" class="success">User <?php echo $username; ?> edited</th>
                    </tr>
                    <?php } ?>
                       <tr>
                            <th colspan="2">Edit User</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Username:</td>
                            <td>
                                <input type="text" id="username" name="username" readonly="readonly" value="<?php echo $user[0]['userL'];?>">
                                <?php if($errorName) echo "<span class='error'>The username must contain a minimum of 3 character</span>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>
                                <input type="password" id="password" name="password">
                                <?php if($errorPass) echo "<span class='error'>The password must contain a minimum of 3 character</span>"; ?>
                            </td>
                        </tr>
                        <tr class="tdgray">
                            <td>Repeat password:</td>
                            <td>
                                <input type="password" id="password2" name="password2">
                                <?php if($errorPassC) echo "<span class='error'>The passwords don't match</span>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Profile:</td>
                            <td>
                                <select id="profile" name="profile">
                                    <?php foreach($profiles as $profile) { 

                                           $selected=$user[0]['idProfile']==$profile['idProfile']?"selected='selected'":""; 
                                    ?>
                                    <option value="<?php echo $profile['idProfile'];?>" <?php echo $selected; ?>><?php echo $profile['profile_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="tdgray">
                            <td>Property:</td>
                            <td>
                                <select id="property" name="property">
                                    <?php foreach($properties as $property) { 
                                        $selected=$user[0]['idProperty']==$property['idProperty']?"selected='selected'":""; 
                                        ?>
                                    <option value="<?php echo $property['idProperty'];?>" <?php echo $selected; ?>><?php echo $property['property_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Admin:</td>
                            <td>
                                <input id="admin" name="admin" type="checkbox" <?php echo $user[0]['admin']?"checked":"";?> value="1">
                                <input type="hidden" name="id" id="id" value="<?php echo $user[0]['idlogin']; ?>">
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