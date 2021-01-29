<?php
include('config.php');
if(empty($_SESSION["id"]) || $_SESSION["id"] == 0){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>MicroOffice - A Responsive Bootstrap 3 Admin Dashboard Template</title>
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
            data: {title: $("#title").val() , content: $("#comment").val()},            
            
            success:function(data){ 

                var txt = '<li><a href="#" onclick="articleSelRead(\''+ data +'\')">'+ $("#title").val() +'</a></li>';
                
                $("#article_list").append(txt);         
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
    
    
    function articleSelRead(selid){
        
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
               

                for(var index = 1; index < data.length; index++){
                   
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
<!-------------------------------  articleEdit.php  ------------------------------------->
    
            <div id="articleedit">
                <header id="topbar" class="alt">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-link">
                                <a href="index.html">View</a>
                            </li>
                            <li class="breadcrumb-current-item">View article</li>
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
                              <span class="panel-title pn"><span class="fa fa-star-o" id="articleTitle"> Welcome!</span></span>
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
                                                                <label class="field prepend-icon">
                                                                    <div id="html_comment" placeholder="<html></html>" style="height: 700px; overflow: auto;">                                                                  

                                                                    </div>  

                                                                </label>
                                                            </div>

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
