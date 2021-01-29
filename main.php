<?php
include('config.php');
if(empty($_SESSION["id"]) || $_SESSION["id"] == 0){
    header('Location: index.php');
}
?>
<?php

$sql = "SELECT * FROM site_title";
$result = $conn -> query($sql); 
$siteTitle = "";      
while ($row = $result -> fetch_row()) { 
    $siteTitle = $row[1];
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title id="headTitle"><?=$siteTitle?></title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme" />
    <meta name="description" content="AdminK - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include("assets/css.php");?>
    <!-- Magnific popup -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="assets/js/plugins/c3charts/c3.min.css">
   
   
</head>
<script type="text/javascript">
    function userRoleEdit(index, sel){
        var rol = 2;
        if($("#fs_"+index).prop("checked") == true){
            rol = 1;
        }

        $.ajax({
            url:"server/userRoleEdit.php",
            method:"POST",
            data: {role:rol , sel: sel},            
            
            success:function(data){         
                
                // var txt = '<li><a href="index2.html">'+$("#title").val()+'</a></li>';

                // $("#article_list").append(txt);         
            }
        })
    }
    function articleInsert(){


        $.ajax({
            url:"server/articleInsert.php",
            method:"POST",
            data: {title: $("#title").val() , content: $("#comment").val(), category: $("#category").val()},            
            
            success:function(data){ 

                var txt = '<li><a href="#" onclick="articleSelRead(\''+ data +'\')">'+ $("#title").val() +'</a></li>';
                
                var obj = $("#category").val() +"_article_list";
                
                               
                $("#"+ obj).append(txt);         
            }
        })

    }
    var editsel = 0;
    function articleUpdate(){
        

        $.ajax({
            url:"server/articleUpdate.php",
            method:"POST",
            data: {title: $("#edittitle").val() , content: $("#editcomment").val(), sel:editsel},         
            
            success:function(data){        
                
                 $("#html_comment").html($("#editcomment").val()); 

            }
        })

    }    
    

    var selview= "usermanage";

    function getViews(views){

        if(views != selview){            

            
            $("#"+views).show();
            $("#"+selview).hide();
            
            selview = views;          
        }

    }

    var userListCnt = 0;

    function articleSelRead(selid){
        
        for(i = 1; i < userListCnt+1; i++){
            
            $("#articlerol_"+i).prop("checked", false);

        }

        getViews("articleedit");


        editsel = selid;        

        $.ajax({
            url:"server/articleSelRead.php",
            method:"POST",
            data: {sel:editsel},         
            
            success:function(data){         
            
                data = JSON.parse(data);

                $("#edittitle").val(data[2]);
                $("#articleTitle").html(" "+data[2]);
                $("#editcomment").val(data[3]);
                $("#html_comment").html(data[3]);
            }
        })

        $.ajax({
            url:"server/articleSelRolRead.php",
            method:"POST",
            data: {article_id : editsel},         
            
            success:function(data){ 
                
                data = JSON.parse(data);              
               

                for(var index = 0; index < data.length; index++){
                   
                   var ss = data[index];
                   $("[user="+ ss +"]").prop("checked", true);

                }
            }
        })
    }

    function articleRolEdit(index, sel){
        
        var rol = 0;
        if($("#articlerol_"+index).prop("checked") == true){
            rol = 1;
        }

        $.ajax({
            url:"server/articleRolEdit.php",
            method:"POST",
            data: {article_id : editsel , user_id : sel, rol : rol},         
            
            success:function(data){ 

            }
        })

    }

    var articleCategoryUpdateSelId = 0;
    var articleCategoryUpdateSelIndex = 0;

    function articleCategoryInsert() {

        if(articleCategoryUpdateSelId > 0){

            $.ajax({
            url:"server/articleCategoryUpdate.php",
            method:"POST",
            data: {sel : articleCategoryUpdateSelId, name : $("#categoryName").val()},         
            
            success:function(data){ 
                //alert(data);categoryTb
               // alert($("#categoryTb_name_"+articleCategoryUpdateSelIndex).html());

                    $("#categoryTb_name_"+articleCategoryUpdateSelIndex).html($("#categoryName").val());

                    articleCategoryUpdateSelId = 0;
                    articleCategoryUpdateSelIndex = 0;
                }
            })

        }else{
            $.ajax({
                url:"server/articleCategoryInsert.php",
                method:"POST",
                data: {categoryName : $("#categoryName").val()},         
                
                success:function(data){ 
                    //alert(data);categoryTb

                    var num = $("#categoryTb").children().length;
                    num++;

                    var obj = '<tr id="categoryTb_'+ num +'"><td class="fs15 fw600">'+ num +'.</td><td class="hidden-xs" id="categoryTb_name_'+ num +'">'+ $("#categoryName").val() +'</td><td class="text-right">';

                    
                    obj += '<a style="cursor: pointer;" onclick="articleCategoryUpdate(\''+ data +'\',\'' + $("#categoryName").val() + '\', ' + num +')">Edit</a> ';
                    obj += ' <a style="cursor: pointer;" onclick="articleCategoryDel(\''+ data +'\', ' + num + ')">Delete</a>';

                    
                    obj +='</td></tr>';
                                                               
                    $("#categoryTb").append(obj);

                               
                    var option = document.createElement("option");
                    option.text = $("#categoryName").val();
                    option.value = $("#categoryName").val();                

                    
                    var select = document.getElementById("category");
                    select.appendChild(option);


                    obj = '<li><a class="accordion-toggle" href="#"><span class="caret"></span><span class="sidebar-title">'+ $("#categoryName").val() +' Article List</span><span class="sb-menu-icon fa fa-share-square-o"></span></a>';
                    obj += '<ul class="nav sub-nav" id="'+ $("#categoryName").val()  +'_article_list"  style=""> </ul></li>';

                    $("#menuList").append(obj);

                }
            })
        }
    }
    function articleCategoryUpdate(sel, name, index){

        articleCategoryUpdateSelId = sel;
        articleCategoryUpdateSelIndex = index;
        $("#categoryName").val(name);
        
    }

    function titleManagerInsert(){

        $.ajax({

            url:"server/titleInsert.php",
            method:"POST",
            data: {titleManagertxt : $("#titleManagertxt").val()},         
            
            success:function(data){         

                $("#site_title").html($("#titleManagertxt").val());     
                $("#headTitle").html($("#titleManagertxt").val());   
            }
        })
    }

    function articleCategoryDel(sel, rowNum){

        if(window.confirm("Delete?")){

            $.ajax({
            url:"server/articleCategoryDel.php",
            method:"POST",
            data: {sel : sel},         
            
            success:function(data){ 
                //alert(data);categoryTb

                 

                    $('#categoryTb_'+rowNum).remove(); 

                    articleCategoryUpdateSelId = 0;
                    articleCategoryUpdateSelIndex = 0;

                }
            })

        }

    }
</script>
<body class="dashboard-page with-customizer">
    <!-- Body Wrap  -->
    <div id="main">
        <!-- Header  -->
        <?php include("assets/head.php");?>
        <!-- /Header -->
        <!-- Sidebar  -->
        <?php include("assets/siderbar.php");?>
        <!-- /Sidebar -->
        <!-- Main Wrapper -->
        <section id="content_wrapper">
            <!-- Topbar -->

<!-------------------------------    usermanage.php     ---------------------------------------->

            <div id="usermanage" style="display: ''">
                <header id="topbar" class="alt">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-link">
                                <a href="index.html">Admin</a>
                            </li>
                            <li class="breadcrumb-current-item">User manage</li>
                        </ol>
                    </div>
                </header>
                <!-- /Topbar -->
                <!-- Content -->
                <section id="content" class="table-layout animated fadeIn">
                    <!-- Column Center -->
                    <div class="chute chute-center">
                        <!-- AllCP Info -->
                        <div class="allcp-panels fade-onload">
                            <div class="panel-heading">
                              <span class="panel-title pn"><span class="fa fa-star-o"></span> User manage</span>
                            </div>
                            <div class="panel-body p5 mt20">
                                <div class="table-responsive">
                                    
                                    <div class="bs-component">
                                        <table class="table mbn table-striped allcp-form theme-info btn-gradient-grey">
                                            <thead>
                                                <tr class="hiden">
                                                    <th class="w30">No.</th>
                                                    <th class="hidden-xs">Name</th>
                                                    <th class="w175 text-right">UserName</th>
                                                    <th class="w175 text-right">Email</th>
                                                    <th class="w175 text-right">Admin</th>

                                                </tr>
                                            </thead>
                                            <tbody>                                                                                             
                                            <?php 
                                            $sql = "SELECT * FROM users";
                                            $result = $conn -> query($sql); 
                                            $index = 0;      
                                            while ($row = $result -> fetch_row()) { 
                                                $index++;   
                                            ?>
                                                <tr>
                                                    <td class="fs15 fw600"><?=$index?>.</td>
                                                    <td class="hidden-xs"><?=$row[3]?></td>
                                                    <td class="w175 text-right"><?=$row[4]?></td>
                                                    <td class="w175 text-right"><?=$row[5]?></td>
                                                    <td class="text-right">
                                                        <div class="flipswitch switch-info-light switch-inline text-left">
                                                            <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="fs_<?=$index?>" 
                                                                onclick="userRoleEdit(<?=$index?>, <?=$row[0]?>)"
                                                               
                                                            <?php
                                                                if($row[7] == 1){
                                                            ?>
                                                                checked="checked"
                                                            <?php }?>
                                                            >

                                                            <label class="flipswitch-label no-br" for="fs_<?=$index?>">
                                                                <div class="flipswitch-inner no-yes"></div>
                                                                <div class="flipswitch-switch"></div>
                                                            </label>

                                                        </div>
                                                    </td>
                                                </tr>                                              
                                                
                                            <?php }?> 
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Quick Links -->
                        <div>    
                    </div>
                    <!-- /Column Center -->
                </section>

            </div>
<!-------------------------------    article category manager.php     ---------------------------------------->

            <div id="articleCategory" style="display: none">
                <header id="topbar" class="alt">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-link">
                                <a href="index.html">Admin</a>
                            </li>
                            <li class="breadcrumb-current-item">Article category manage</li>
                        </ol>
                    </div>
                </header>
                <!-- /Topbar -->
                <!-- Content -->
                <section id="content" class="table-layout animated fadeIn">
                    <!-- Column Center -->
                    <div class="chute chute-center">
                        <!-- AllCP Info -->
                        <div class="allcp-panels fade-onload">
                            <div class="panel-heading">
                              <span class="panel-title pn"><span class="fa fa-star-o"></span> article category</span>
                            </div>


                            <div class="panel-body p5 mt20">
                               <div class="allcp-form col-xs-12">
                                   <div class="panel">
                                        <div class="panel-body pn">                                           
                                              
                                            <!-- Basic -->
                                            <div class="row mn mln15">
                                                
                                                <div class="col-md-6 ">
                                                    <div class="section">
                                                        <label class="field">
                                                            <input type="text" name="categoryName" id="categoryName" class="gui-input" placeholder="Article  category">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="section">
                                                        <div class="panel-footer text-left">
                                                            <button type="button" class="btn btn-primary mb5" onclick="articleCategoryInsert()"> SAVE CATEGORY NAME </button>                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>

                                        <div class="panel-body p5 mt20">

                                            <div class="table-responsive">
                                                
                                                <div class="bs-component">
                                                    <table class="table mbn table-striped allcp-form theme-info btn-gradient-grey">
                                                        <thead>
                                                            <tr class="hiden">
                                                                <th class="w30">No.</th>                                                    
                                                                <th class="hidden-xs">category</th>                                                    
                                                                <th class="w175 text-right">Edit / Del</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="categoryTb">                                                                                             
                                                        <?php 
                                                        $sql = "SELECT * FROM article_category";
                                                        $result = $conn -> query($sql); 
                                                        $index = 0;      
                                                        while ($row = $result -> fetch_row()) { 
                                                            $index++;   
                                                        ?>
                                                            <tr id="categoryTb_<?=$index?>">
                                                                <td class="fs15 fw600" id="categoryTb_num_<?=$index?>"><?=$index?>.</td>
                                                                <td class="hidden-xs" id="categoryTb_name_<?=$index?>"><?=$row[1]?></td>                                                   
                                                                <td class="text-right">
                                                                    <a style="cursor: pointer;" onclick="articleCategoryUpdate('<?=$row[0]?>','<?=$row[1]?>','<?=$index?>')">Edit</a>

                                                                    <a style="cursor: pointer;" onclick="articleCategoryDel('<?=$row[0]?>', '<?=$index?>')">Delete</a>
                                                                </td>
                                                            </tr>                                              
                                                            
                                                        <?php }?> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>


                                </div>



                            </div>

                            
                            <!-- Quick Links -->
                        <div>    
                    </div>
                    <!-- /Column Center -->
                </section>

            </div>

<!-------------------------------    article.php     ---------------------------------------->

<!-------------------------------    article.php     ---------------------------------------->

            <div id="article" style="display:none;">

                <header id="topbar" class="alt">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-link">
                                <a href="index.html">Admin</a>
                            </li>
                            <li class="breadcrumb-current-item">Add article</li>
                        </ol>
                    </div>
                </header>
                <!-- /Topbar -->
                <!-- Content -->
                <section id="content" class="table-layout animated fadeIn">
                    <!-- Column Center -->
                    <div class="chute chute-center">
                        <!-- AllCP Info -->
                        <div class="allcp-panels fade-onload">
                            <div class="panel-heading">
                              <span class="panel-title pn"><span class="fa fa-star-o"></span> Add article</span>
                            </div>
                            

                            <div class="panel-body p5 mt20">
                               <div class="allcp-form col-xs-12">
                                   <div class="panel">
                                        <div class="panel-body pn">
                                            <form method="post" action="#" id="form-ui">
                                              
                                                <!-- Basic -->
                                                <div class="row mn mln15">
                                                    <div class="col-md-6 ">
                                                        <div class="section">
                                                            <label class="field select">
                                                            <select id="category" name="category">
                                                            <?php 
                                                                $sql = "SELECT * FROM article_category";
                                                                $result = $conn -> query($sql); 
                                                                $index = 0;      
                                                                while ($row = $result -> fetch_row()) { 
                                                                    $index++;   
                                                            ?>
                                                                <option value="<?=$row[1]?>"><?=$row[1]?></option>

                                                            <?php }?>
                                                            </select>
                                                            <i class="arrow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="section">
                                                            <label class="field">
                                                                <input type="text" name="title" id="title" class="gui-input" placeholder="Article Titel">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mn mln15">
                                                    <div class="col-md-12 ">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="comment" placeholder="Article Content"></textarea>
                                                                <span class="field-icon">
                                                                    <i class="fa fa-list"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>                                            
                                                </div>

                                                <div class="panel-footer text-right">
                                                    <button type="button" class="btn btn-primary mb5" onclick="articleInsert()"> Add article</button>                                             
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Quick Links -->
                        <div>    
                    </div>
                    <!-- /Column Center -->
                </section>

            </div>


            <div id="titlemanager" style="display:none;">

                <header id="topbar" class="alt">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-link">
                                <a href="index.html">Admin</a>
                            </li>
                            <li class="breadcrumb-current-item">Title manage</li>
                        </ol>
                    </div>
                </header>
                <!-- /Topbar -->
                <!-- Content -->
                <section id="content" class="table-layout animated fadeIn">
                    <!-- Column Center -->
                    <div class="chute chute-center">
                        <!-- AllCP Info -->
                        <div class="allcp-panels fade-onload">
                            <div class="panel-heading">
                              <span class="panel-title pn"><span class="fa fa-star-o"></span> Title manage</span>
                            </div>
                            

                            <div class="panel-body p5 mt20">
                               <div class="allcp-form col-xs-12">
                                   <div class="panel">
                                        <div class="panel-body pn">
                                            <form method="post" action="#" id="form-ui">
                                              
                                                <!-- Basic -->
                                                <div class="row mn mln15">
                                                    <div class="col-md-6 ">
                                                        <div class="section">                                                             
                                                            <label class="field">                                                                

                                                                <input type="text" name="titleManagertxt" id="titleManagertxt" class="gui-input" value="<?=$siteTitle?>" placeholder="Insert site title.">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">

                                                         <div class="panel-footer text-left">
                                                            <button type="button" class="btn btn-primary mb5" onclick="titleManagerInsert()"> Save title</button>                                             
                                                
                                                        </div>
                                                    </div>

                                                </div>                                               

                                                

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Quick Links -->
                        <div>    
                    </div>
                    <!-- /Column Center -->
                </section>

            </div>
<!-------------------------------  articleEdit.php  ------------------------------------->

            <div id="articleedit" style="display:none;">
                <header id="topbar" class="alt">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-link">
                                <a href="index.html">Admin</a>
                            </li>
                            <li class="breadcrumb-current-item">Edit article</li>
                        </ol>
                    </div>
                </header>
                <!-- /Topbar -->
                <!-- Content -->
                <section id="content" class="table-layout animated fadeIn">
                    <!-- Column Center -->
                    <div class="chute chute-center">
                        <!-- AllCP Info -->
                        <div class="allcp-panels fade-onload">
                            <div class="panel-heading">
                              <span class="panel-title pn"><span class="fa fa-star-o" id="articleTitle"> </span></span>
                            </div>
                            <div class="panel-body p5 mt20">
                               <div class="allcp-form col-xs-12">
                                   <div class="panel">
                                        <div class="panel-body pn">
                                            <form method="post" action="#" id="form-ui">
                                              
                                                <!-- Basic -->
                                                <div>
                                                    <div class="col-md-12 ">
                                                        <div class="col-md-12 ">
                                                            <div class="section">
                                                                <label class="field">
                                                                    <input type="text" name="edittitle" id="edittitle" class="gui-input" placeholder="Article Titel" value="">
                                                                </label>
                                                            </div>                                                  
                                                        </div>  
                                                        <div class="col-md-12 ">
                                                            <div class="section">
                                                                <label class="field prepend-icon">
                                                                    <textarea class="gui-textarea" id="editcomment" placeholder="Article Content" style="height: 300px"></textarea>
                                                                    <span class="field-icon">
                                                                        <i class="fa fa-list"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>                                          
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="col-md-12 ">
                                                            <div class="section">
                                                                <label class="field prepend-icon">
                                                                    <div id="html_comment" placeholder="<html></html>" style="height: 375px; overflow: auto;">                                                                  

                                                                    </div>  

                                                                </label>
                                                            </div>

                                                        </div>     
                                                                                              
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-right">
                                                    <button type="button" class="btn btn-primary mb5" onclick="articleUpdate()"> Edit article</button>                                               
                                                </div>

                                            </form>
                                        </div>

                                        <div class="panel-body p5 mt20">
                                            <div class="table-responsive">
                                                
                                                <div class="bs-component">
                                                    <table class="table mbn table-striped allcp-form theme-info btn-gradient-grey">
                                                        <thead>
                                                            <tr class="hiden">
                                                                <th class="w30">No.</th>
                                                                <th class="hidden-xs">Name</th>
                                                                <th class="w175 text-right">UserName</th>
                                                                <th class="w175 text-right">Email</th>
                                                                <th class="w175 text-right">Admin</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                                                             
                                                        <?php 
                                                        $sql = "SELECT * FROM users";
                                                        $result = $conn -> query($sql); 
                                                        $index = 0;      
                                                        while ($row = $result -> fetch_row()) { 
                                                            $index++;   
                                                        ?>
                                                            <tr>
                                                                <td class="fs15 fw600"><?=$index?>.</td>
                                                                <td class="hidden-xs"><?=$row[3]?></td>
                                                                <td class="w175 text-right"><?=$row[4]?></td>
                                                                <td class="w175 text-right"><?=$row[5]?></td>
                                                                <td class="text-right">
                                                                    <div class="flipswitch switch-info-light switch-inline text-left">
                                                                        <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="articlerol_<?=$index?>"
                                                                            onclick="articleRolEdit(<?=$index?>, <?=$row[0]?>)" user="<?=$row[0]?>"
                                                                        >

                                                                        <label class="flipswitch-label no-br" for="articlerol_<?=$index?>">
                                                                            <div class="flipswitch-inner no-yes"></div>
                                                                            <div class="flipswitch-switch"></div>
                                                                        </label>

                                                                    </div>
                                                                </td>
                                                            </tr>                                              
                                                            
                                                        <?php }?> 
                                                        <script type="text/javascript"> userListCnt = <?=$index?>;</script>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- Quick Links -->
                        <div>    
                    </div>
                    <!-- /Column Center -->
                </section>
            </div>



            <!-- /Content -->
            <?php include("assets/foot.php");?>
        </section>
        <!-- /Main Wrapper -->
    </div>
    <!-- /Body Wrap  -->
    <!-- Scripts -->
    <!-- jQuery -->
    <script src="assets/js/jquery/jquery-1.12.3.min.js"></script>
    <script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- AnimatedSVGIcons -->
    <script src="assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
    <script src="assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
    <script src="assets/fonts/animatedsvgicons/js/svgicons.js"></script>
    <script src="assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
    <!-- Scroll -->
    <script src="assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- HighCharts Plugin -->
    <script src="assets/js/plugins/highcharts/highcharts.js"></script>
    <!-- Magnific Popup Plugin -->
    <script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>
    <!-- Plugins -->
    <script src="assets/js/plugins/c3charts/d3.min.js"></script>
    <script src="assets/js/plugins/c3charts/c3.min.js"></script>
    <script src="assets/js/plugins/circles/circles.js"></script>
    <!-- Jvectormap JS -->
    <script src="assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
    <script src="assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
    <script src="assets/js/plugins/jvectormap/assets/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Theme Scripts -->
    <script src="assets/js/utility/utility.js"></script>
    <script src="assets/js/demo/demo.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demo/widgets_sidebar.js"></script>
    <script src="assets/js/pages/dashboard1.js"></script>
    <script src="assets/js/demo/widgets.js"></script>
    <!-- /Scripts -->
</body>
</html>
