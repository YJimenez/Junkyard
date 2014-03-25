
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
                <table align="center" width="80%">
                    <?php if($success==1) { ?>
                    <tr>
                        <th colspan="7" class="success">User <?php echo $username; ?> added</th>
                    </tr>
                    <?php } 
                        if($success==2) { ?>
                    <tr>
                        <th colspan="7" class="errorS">User <?php echo $username; ?> already exists in the middleware</th>
                    </tr>
                    <?php } 
                    ?>
                    <tr>
                        <th colspan="7">Users list</th>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <th>Profile</th>
                        <th>Property</th>
                        <th>Group</th>
                        <th>Edit</th>
                        <th>Status</th>
                        <th>System admin</th>
                    </tr>
                        
                        <?php 
                            foreach ($users as $user) {
                                $class=$class=="tdgray"?"":"tdgray";
                                $status=$user['actL']?"<span class='green'>Active</span>":"<span class='error'>Inactive</span>";
                                $isAdmin=$user['admin']?"<span class='green'>Yes</span>":"<span class='error'>No</span>";

                                echo "<tr class='".$class."'>";
                                echo "<td>".$user['userL']."</td>";
                                echo "<td>".$user['profile_name']."</td>";
                                echo "<td>".$user['property_name']."</td>";
                                echo "<td>".$user['group_name']."</td>";
                                echo '<td align="center" class="pointer" onclick="javascript:window.location.href =\'?section=adminEditUsers&id='.$user['idlogin'].'\'">Edit</td>';
                                echo '<td align="center" class="pointer" onclick="javascript:window.location.href =\'?section=adminChange&status='.$user['actL'].'&id='.$user['idlogin'].'&change=ac\'">'.$status.'</td>';
                                echo '<td align="center" class="pointer" onclick="javascript:window.location.href =\'?section=adminChange&status='.$user['admin'].'&id='.$user['idlogin'].'&change=a\'">'.$isAdmin.'</td>';
                                echo "</tr>";

                        } ?>
                        
                </table>
                <br>
                <form action="admin.php?section=adminUsers" method="post">
                    <table align="center" width="80%">
                       <tr>
                            <th colspan="2">Add User</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Username:</td>
                            <td>
                                <input type="text" id="username" name="username" value="<?php echo $username?$username:'';?>">
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
                                    <?php foreach($profiles as $profile) { ?>
                                    <option value="<?php echo $profile['idProfile'];?>"><?php echo $profile['profile_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="tdgray">
                            <td>Property:</td>
                            <td>
                                <select id="property" name="property">
                                    <?php foreach($properties as $property) { ?>
                                    <option value="<?php echo $property['idProperty'];?>"><?php echo $property['property_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Admin:</td>
                            <td><input id="admin" name="admin" type="checkbox" value="1"></td>
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