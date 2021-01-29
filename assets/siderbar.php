<!-- Sidebar  -->

<aside id="sidebar_left" class="nano affix">
    <!-- Sidebar Left Wrapper  -->
    <div class="sidebar-left-content nano-content">
        <!-- Sidebar Header -->
        <header class="sidebar-header">
            <!-- Sidebar - Logo -->
            <div class="sidebar-widget logo-widget">
                <div class="media">
                    <a class="logo-image" href="#">
                        <!-- <img src="assets/img/logo.png" alt="" class="img-responsive"> -->
                    </a>
                    <div class="logo-slogan">
                        <div id="site_title"><?=$siteTitle?><span class="text-info"></span></div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /Sidebar Header -->
        <!-- Sidebar Menu  -->
        <ul class="nav sidebar-menu" id="menuList">
        <?php
            if($_SESSION["role"] == 1){
        ?>    
            <li>
                <a class="accordion-toggle menu-open" href="#">
                    <span class="caret"></span>
                    <span class="sidebar-title">Admin</span>
                    <span class="sb-menu-icon fa fa-home"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="active">
                        <a href="#" onclick="getViews('usermanage')">
                        User manage
                    </a>
                    </li>
                    <li>
                        <a href="#" onclick="getViews('article')">
                        Add article
                    </a>
                    <li>
                        <a href="#" onclick="getViews('articleCategory')">
                        Add article category
                    </a>
                    <li>
                        <a href="#" onclick="getViews('titlemanager')">
                        Title manage
                    </a>
                    </li>
                </ul>
            </li>
        <?php }?>
        <?php 
            $sqls = "SELECT * FROM article_category";
            $results = $conn -> query($sqls); 
            $index = 0;      
            while ($rows = $results -> fetch_row()) { 
                $index++;   
        


                $cnt = 0;
                    
                $sql = "SELECT * FROM article_content WHERE category = '".$rows[1]."'";

                if($_SESSION["role"] == 2){

                   $sql = "SELECT article_content.*  FROM article_content, article_role WHERE article_content.article_id = article_role.article_id and article_role.user_id = '".$_SESSION["id"]."' and article_content.category = '".$rows[1]."'";

                  
                }

                $result = $conn -> query($sql); 

                while ($row = $result -> fetch_row()) {  
                    $cnt++;
                }

                $result = $conn -> query($sql); 

                if($cnt > 0){

        ?>


            <li>
                <a class="accordion-toggle" href="#">
                    <span class="caret"></span>
                    <span class="sidebar-title"><?=$rows[1]?> Article List</span>
                    <span class="sb-menu-icon fa fa-share-square-o"></span>
                </a>
            

                <ul class="nav sub-nav" id="<?=$rows[1]?>_article_list">
                    
                    <?php                    

                    
                        $index = 0;      
                        while ($row = $result -> fetch_row()) {  
                           ?>
                                <li>
                                    <a href="#" onclick= "articleSelRead('<?=$row[1]?>')"><?=$row[2]?></a>
                                </li> 
                           <?php
                        }
                    
                    ?>                           
                </ul>
               
           
            </li>
            <?php  }

        }?>
        </ul>
        <!-- /Sidebar Menu  -->
    </div>
    <!-- /Sidebar Left Wrapper  -->
</aside>
<!-- /Sidebar -->
