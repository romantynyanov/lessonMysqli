<?php
    include( "db_link.php");
    include( "script.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="10;url=http://localhost/mysql/lesson4/" />-->
    <meta name="viewport" content="width=1600">
    <meta charset="UTF-8">
    <title>HOMEWORK 3</title>
    <link rel="stylesheet" href="style.css?i=<?=rand(1,1000) ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="contaner">
        <div>
            <h1 class="h1_dz"><span>&#10077</span>Домашние задание №3 (IN and JOIN)<span>&#10078</span></h1>
        </div>
        <div class="left_block">
            <form action="" method="post">
                <div class="count">
                    <h1>Запросы</h1>
                    <ul>
                        <?php
                        $num_p=0;
                        foreach($arQuery as $key=>$values){
                            $num_p++;
                            if($key==1 || $key==3){
                                $num_p--;
                                continue;
                            }else {
                                echo "<li>";
                                echo '<button type="submit" name="n'.$num_p.'" value="1" class="but" title="'.$values["QUERY"].'">
                                <p class="butt_p"><span>'.$num_p.'.</span>'.$values["DESCRIPTION"].'.</p>
                                </button>';
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </form>
        </div>
        <div class="right_block">
            <div class="display">
                <? if(mysqli_query($link,"SELECT * FROM `workers`" )): ?>
                <table>
                    <caption>workers</caption>
                    <thead>
                        <tr>
                            <?php
                        
                         $result=mysqli_query($link,"SELECT * FROM `workers` ");
                         foreach(($arWor = mysqli_fetch_assoc($result)) as $key=>$values){
                             if($key=="departament_id"){
                                 echo '<td>d_id</td>';
                             }else{
                                   echo '<td>'.$key.'</td>';
                            }
                         }
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          out("SELECT * FROM `workers`");
                        ?>
                    </tbody>
                </table>
                <p>
                    <?php 
               /* $result = mysqli_query($link,$arQuery[6]["QUERY"]);
                while($arWor = mysqli_fetch_assoc($result)){
                    echo '<pre>';
                    print_r($arWor);
                    echo '</pre>';
                }*/
            // Количество работников с зарплатой  300$.    
          /* if($_POST['n2']){
                $result = mysqli_query($link,$arQuery[1]["QUERY"]);
                while($arWor = mysqli_fetch_assoc($result)){
                    echo 'Количество работников с зарплатой 300$: '.$arWor[count];
                }
            } */        
                    ?>
                </p>
                <? else: ?>
                <!-- **********Создание таблицы workers*************  -->
                <?php
                if(($_POST['n1']) && !(mysqli_query($link,"SELECT * FROM `workers`" ))){
                    mysqli_query($link,$arQuery[0]["QUERY"]);
                    if((mysqli_query($link,"SELECT * FROM `workers`" ))){
                        mysqli_query($link,$arQuery[1]["QUERY"]); 
                    }      
                    echo "<div class='display'><table><caption>workers</caption><thead>
                    <tr><td>id</td><td>author</td><td>article</td></tr></thead><tbody>";
                    out("SELECT * FROM `workers`");  
                    echo "</tbody></table></div>";
                 }      
                ?>
                <? endif;?>
            </div>

            <!-- ********* 2 **************  -->

            <? if(mysqli_query($link,"SELECT * FROM `departament`" )): ?>
            <div class="display">
                <table>
                    <caption>departament</caption>
                    <thead>
                        <tr>
                            <?php
                         $result=mysqli_query($link,"SELECT * FROM `departament` ");
                         foreach(($arWor = mysqli_fetch_assoc($result)) as $key=>$values){
                            echo '<td>'.$key.'</td>';
                            }
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Вывод из базы содержимого
                        out("SELECT * FROM `departament` ");  
                        ?>
                    </tbody>
                </table>
            </div>
            <? else: ?>
            <?php
            if(($_POST['n2']) && !(mysqli_query($link,"SELECT * FROM `departament`" ))){
                mysqli_query($link,$arQuery[2]["QUERY"]);
                if((mysqli_query($link,"SELECT * FROM `departament`" ))){
                    mysqli_query($link,$arQuery[3]["QUERY"]); 
                }      
                echo "<div class='display'><table><caption>pages</caption><thead><tr><td>id</td>
                <td>author</td><td>article</td></tr></thead><tbody>";
                out("SELECT * FROM `departament` ");  
                echo "</tbody></table></div>";
             }      
            ?>
            <? endif;?>
        </div>
        <div class="clear"></div>

        <!-- ************ 3 ***********  -->

        <? if(mysqli_query($link,"SELECT * FROM `departament`" )): ?>
        <div class="display">
            <table>
                <caption>IN AND JOIN</caption>
                <thead>
                    <tr>
                        <?php
                        if($_POST['n3'] || $_POST['n4'] || $_POST['n5']){
                            if($_POST['n3']){
                              $result=mysqli_query($link,$arQuery[4]["QUERY"]);  
                            }
                           if($_POST['n4']){
                               $result=mysqli_query($link,$arQuery[5]["QUERY"]);
                           }
                            if($_POST['n5']){
                               $result=mysqli_query($link,$arQuery[6]["QUERY"]);
                           }
                        }else{
                              $result=result("SELECT * FROM `departament` ");
                        }
                        foreach(($arWor = mysqli_fetch_assoc($result)) as $key=>$values){
                             echo '<td>'.$key.'</td>';
                         
                         }
                    ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // Вывод из базы содержимого
                     if($_POST['n3']){
                        out($arQuery[4]["QUERY"]);  
                                 }
                    if($_POST['n4']){
                        out($arQuery[5]["QUERY"]);  
                                 }
                    if($_POST['n5']){
                        out($arQuery[6]["QUERY"]);  
                                 }
                      
                        ?>
                </tbody>
            </table>
        </div>

        <? endif;?>
    </div>
</body>

</html>
