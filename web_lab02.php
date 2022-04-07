<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>AJAX Pagination - Lab 2</title>
    <style>
    body{
        background-color: powderblue;
        
    }
    table{
        background-color: red;
        font-size: 16px;
        font-family: Ariel;
    }
    tr,td{
        background-color: yellow;
    }
    .pagination{
        float:left;
        width:100%;
    }
    .botoom_link{
        float:left;
        width:100%;
    }
    .content{
        float:left;
        width:100%;}
        ul{
            list-style:none;
            float:left;
            margin:0;
            padding: 0;
        }
        li{
            width: 50px;
            height: 25px;
            background-color: blue;
            color: white;
            list-style:none;
            float:left;
            margin-right:16px;
            padding:5px;
            border:solid 2px black;
        }
        li:hover{
            background-color: green;
            color: white;
            border: solid 2px black;
            cursor:pointer;
        }
        </style>
        </head>
        
        <body>
            
            <?php
            include("./db_connect.php");
            $per_page = 20;
            $query = $conn->prepare("SELECT * FROM students");
            $query->execute();
            $result=$query->get_result();
            
            $count = mysqli_num_rows($result);
            $pages = ceil($count/$per_page);
            ?>
            
            <center>
            <h2><u>Pagination with Jquery AJAX, MySQL and PHP</u></h2>
    </center>
            <div id="content_container"></div>

            <div id="loading">
                <img src="loading.gif"/></div>
                <div class="pagination" style="padding:10px;">
                <ul id="paginate">
                    
                    <?php
                    for($i=1; $i<=$pages; $i++){
                        echo'<li id="'.$i.'">'.$i.'</li>';
                    }
                    ?>
                    </ul>
                </div>
                
                <script>
                function hideLoading() {
                    $("#loading").fadeOut('slow');
                    };
                    
                    $("#paginate li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
                    $("#content_container").load("ajaxpagination.php?page=1", hideLoading());
                    $("#paginate li").click(function(){
                        $("#paginate li").css({'border' : 'solid #dddddd 1px'}).css({'color' : '#0063DC'});
                        $(this).css({'color':'#FF0084'}).css({'border' : 'none'});
                        var page_num = this.id;
                        $("#content_container").load("ajaxpagination.php?page=" + page_num, hideLoading());
                        });
                        </script>
                    </div>
                    
                    <script>
                    $(document).ready(function(){
                        $("#content_container").load("ajaxpagination.php?page=1",hideLoading());
                        });
                    </script>
                    </body>
                    </html>