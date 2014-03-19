
<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/admin/adminStyle.css"/>
        <script type="text/javascript" src="js/admin/main.js"></script>
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
                        <th colspan="4" class="success">Group <?php echo $group_name; ?> added</th>
                    </tr>
                    <?php } 
                        if($success==2) { ?>
                    <tr>
                        <th colspan="4" class="errorS">Group <?php echo $group_name; ?> already exists in the middleware</th>
                    </tr>
                    <?php } 
                        if($success==3) { ?>
                    <tr>
                        <th colspan="4" class="success">Group <?php echo $group_name; ?> deleted</th>
                    </tr>
                    <?php } 
                    ?>
                    <tr>
                        <th colspan="4">Groups list</th>
                    </tr>
                    <tr>
                        <th>Group</th>
                        <th>Edit</th>
                        <th>Status</th>
                    </tr>
                    
                        <?php foreach($groups as $group) { 
                                $class=$class=="tdgray"?"":"tdgray";
                                $status=$group['activeG']?"<span class='green'>Active</span>":"<span class='error'>Inactive</span>";
                                echo "<tr class='".$class."'>";
                                echo "<td>".$group['group_name']."</td>";
                                echo '<td align="center" class="pointer" onclick="javascript:window.location.href =\'?section=adminEditGroups&id='.$group['idGroup'].'\'">Edit</td>';
                                echo '<td align="center" class="pointer" onclick="javascript:window.location.href =\'?section=adminChange&status='.$group['activeG'].'&id='.$group['idGroup'].'&change=groups\'">'.$status.'</td>';
                                echo "</tr>";

                         } ?>

                </table>
 <br>
                <form action="?section=adminGroups" method="post">
                    <table align="center" width="80%">
                       <tr>
                            <th colspan="2">Add Group</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Group:</td>
                            <td>
                                <input type="text" id="group_name" name="group_name" value="<?php echo $group_name?$group_name:'';?>">
                                <?php if($errorName) echo "<span class='error'>The group must contain a minimum of 1 character</span>"; ?>
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