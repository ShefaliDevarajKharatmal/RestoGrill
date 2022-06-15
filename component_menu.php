<?php

function component_menu($productname, $productprice, $productid, $productv, $productimg){
    $element = "

 
    

        <div class=\"box\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"image\">
                <img src=\"$productimg\" alt=\"\">
            </div>

            <div class=\"content\">
             
                <center><h3>$productname 
                </h3>
                

                <button type = \"submit\" class = \" btn btn-warning my-1\" name = \"like\">
                <i class = 'fas fa-heart' style = 'color: white' height: 25px width: 25px></i></button>
                <input type='hidden' name='product_id' value='$productid'>

                <button type = \"submit\" class = \"btn btn-warning my-1\" name = \"add\">
                <i class = 'fas fa-shopping-cart' height: 25px width: 25px></i></button>

                <input type='hidden' name='product_id' value='$productid'>


                <span>  </span>
                <span class=\"price\">₹$productprice</span></center>
            </div>
            </form>
        </div>
          
    ";
        echo $element;
    }


    //<?php if($productv == 0) :
       // <i class='fa fa-circle fa-1x fa-1x' style='color: green'></i>
     //else : 
      //  <i class='fa fa-circle fa-1x fa-1x' style='color: red'></i>    


    function cartElement($productname, $productprice, $productid, $productv, $productimg){
        $element = "
        <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
    <div class=\"product\">
        <img src=\"$productimg\">
    <div class=\"col-md-6\">
        
        <h2 class=\"product-name\">$productname</h2>
        <h2 class=\"product-price\">₹$productprice</h2>
        <h2 class=\"product-quantity\">Qnt: <input value=\"1\" name=\"\">
        <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
        
        </h2>
    </div>
                 
</div>
";
        echo $element;
    }



function favsElement($productname, $productprice, $productid, $productv, $productimg){
        $element = "
        
    <div class=\"product\">
        <img src=\"$productimg\">
    <div class=\"col-md-6\">
        <h2 class=\"product-name\">$productname</h2>
        <h2 class=\"product-price\">₹$productprice</h2></form>


        <form style=\"width:150px; display:inline-block;\" action=\"index.php?action=add&id=$productid\" method=\"post\" class=\"cart-items\">
        <button type = \"submit\" class = \"btn btn-warning my-1\" name = \"add\">
        <i class = 'fas fa-shopping-cart' height: 25px width: 25px></i></button>
        <input type='hidden' name='product_id' value='$productid'></form>

        <form style=\"width:300px; display:inline-block;\" action=\"favs.php?action=remove&id=$productid\" method=\"post\" class=\"favs-items\">
        <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">
        <i class='fa fa-trash' height: 25px width: 25px></i></button>
        <input type='hidden' name='product_id' value='$productid'></form>
        </h2>
    </div>
    <div class=\"col-md-3 py-5\">
    <div style=\"text-align:center\">
    
    </div>
</div>                          
</div>
";
        echo $element;
    }
?>


