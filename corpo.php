<?php
    include './conexao.php';
    session_start();
?>
<html>
    <head>
        <title>User Login</title>
        <style>
            img{
                width: 150px;
                height: auto;
                border: 1px dotted #000;
                padding: 5px;
            }
        </style>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
        if($_SESSION["name"]) {
        ?>
            <table width="1000px" border="0" cellspacing="0">
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>Produto</strong></td>
                    <td><strong>Valor</strong></td>
                    <td><strong>Imagem</strong></td>
                    <td><strong>#</strong></td>
                </tr>
                <?php
                    $resultado = mysqli_query($conexao,"SELECT * FROM produto");
                    while($aux = $resultado->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$aux["id"]."&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td>".$aux["name"]."&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td>".$aux["valor"]."&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td><img src='images/".$aux["imagem"]."'>&nbsp;&nbsp;&nbsp;</td>";
                        if($_SESSION["tipo"]==0){
                            echo "<td><a href='*'>Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        }
                        echo "</tr>";  
                    }
                ?>
            </table>
            Efetue o LOGOFF <a href="logout.php" title="Logout">aqui.
        <?php
            }else header("Location:index.php");;
        ?>
    </body>
</html>