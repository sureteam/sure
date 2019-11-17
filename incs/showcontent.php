<br />
<br />
<div class="hold">
<div class="show"> <ul> <li> <a href="index.php"> Home </a>&raquo;</li> 
     <li> <a href="index.php?id=<?php echo $_GET['id'];?> & catname=<?php echo $_GET['catname'];?>"> <?php echo $_GET['catname'];?> </a> </li></ul> </div>
     <!--close show-->
   <?php $catname = $_GET['catname'];
   $categoryid = $_GET['id'];
   //get these two in sessions
   
   
   ?>    
<div id="tabswrap">
      
      <div id="organic-tabs">
					
    		<ul id="explore-nav">
                <li id="ex-featured"><a rel="featured" href="#" class="current">Featured Books</a></li>
                <!--<li id="ex-core"><a rel="core" href="#">New Books</a></li>
                <li id="ex-jquery"><a rel="jquerytuts" href="#">Used Books</a></li>
                <li id="ex-classics" class="last"><a rel="classics" href="#">All categories</a></li>-->
            </ul>
    		
    		<div id="all-list-wrap">
    		
    			<div id="featured">
    			  <?php include("incs/featured.php");?>
                    
    			</div><!--Featured-->
        		 
        		 <div id="core">
                   <?php //include("incs/newbooks.php");?> 
                   
        		 </div><!---Core-->
        		 
        		 <div id="jquerytuts">
        		    <?php //include("incs/usedbooks.php");?>
                    
        		 </div><!--Tuts-->
        		 
        		
        		 
   		    </div> <!-- END List Wrap -->
		 
		 </div> <!-- END Organic Tabs -->
	
	</div>
    </div><!--close hold-->