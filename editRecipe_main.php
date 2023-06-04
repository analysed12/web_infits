<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Infits</title>
        <?php require('constant/head.php');?>
        
        <style>
            @font-face {
                font-family: 'NATS';
                src:url('font/NATS.ttf.woff') format('woff'),
                    url('font/NATS.ttf.svg#NATS') format('svg'),
                    url('font/NATS.ttf.eot'),
                    url('font/NATS.ttf.eot?#iefix') format('embedded-opentype'); 
                font-weight: normal;
                font-style: normal;
            }
            body {
                    font-family: 'NATS', sans-serif !important;
            }
            .sub-1{
                display: flex;
                flex-direction: row;
                justify-content: center;
            
               }
            .image{
                width:27%;
                padding:60px 20px;
            }
            .img-content h1{
                font-size: 35px;
                padding:90px 80px 20px;
            }
            .image-2{
                display: flex;
                flex-direction: row;
                height: 38px;
                transform: translate(20%, -140%);
                background-color: #fff;
                color: #A3A1A1;
                gap:8px;
                line-height: 20px ;
                font-size: 20px;
                padding:10px;
                width: 100px;
                border: none;
                box-shadow: 0px 0px 25px rgba(255, 255, 255, 0.75);
                border-radius: 10px;
                
            }
            .edit button{
                position: absolute;
                left: 81rem;
                top: 131px;
                width:150px;
                height: 46px;
                font-size: 23px;
                color: #fff;
                background: #D257E6;
                border: none;
                box-shadow: 0px 1.7px 5px rgba(0, 0, 0, 0.25);
                border-radius: 10px;
            }
            .img-sub-content{
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                height: 180px;
                width: 330px;
                padding: 0px 60px;
                align-items: center;
            }
            .img-sub-content h3{
                font-size: 'NATS';
                color: #9C5EF4;
                font-size: 28px;
                line-height: 8px;
                font-weight: 400;
                margin-top: 20px;
            }
            .img-sub-content p{
                font-size: 'NATS';
                color: #858383;
                font-weight: 400;
                font-size: 20px;
                line-height: 30px;
            }
            .sub-content{
                display: flex;
                flex-direction: column;
            }
            .tab{
                margin-top:-15px;
                margin-left:35%;
                width: 60%;
            }
            .tab button {
                background-color: inherit;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                font-size: 24px;
                width:150px;
                line-height: 30px;
            }
            .tab button:hover {
                background-color: #AA5DF1;
                color:white;
                border-radius: 50px;
            }
            .tab button.active {
                border-radius: 50px;
                color: #fff;
                background-color: #AA5DF1;
            }
          
                #Ingredients{
                display: grid;
            
            grid-template-columns: repeat(2, minmax(auto, 1fr));
                margin-left: 150px;
               
                width:400px;
                gap: 20px 80px;
               
            }
            
            li {
                color: #9C5EF4;
                width:70%;
                line-height: 40px;
            }
            li span {
                color: black;
            }
            #Directions{
                width: 80%;
                justify-content: center;
                font-size: 25px;
                line-height: 50px;
                margin-left: 15rem;
                justify-content: center;
                margin-right: auto;
            }
            .ing{
                display: flex;
                flex-direction: row;
                gap:20px;
                color: #000;

            }
            .ing img{
                width:60.15px;
                height: 63px;
                background-color: #E7E7E7;
                border-radius: 10px;
                align-items: center;
                gap: 20px;
            }
            .ing h4{
                width:200px;
                line-height: 58px;
                font-size: 22px;
            }
            .ing p{
                width:80px;
                line-height: 58px;
                font-size: 20px;
            }
 
            .checkbox-container {
                position: relative;
                cursor: pointer;
            }
            .checkbox-container input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }
            .checkmark {
                position: absolute;
                top:20px;
                height: 20px;
                width: 20px;
                border: 1px solid #AA5DF1;
                border-radius: 50%;
            }
            .checkbox-container:hover input ~ .checkmark {
                background-color: #ccc;
            }
            .checkbox-container input:checked ~ .checkmark {
                background-color: #AA5DF1;
            }
            .checkmark:after {
                content: "✓";
                position: absolute;
                display: none;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 14px;
                color: white;
            }
            .checkbox-container input:checked ~ .checkmark:after {
                display: block;
            }
            @media screen and (max-width:720px){
                .sub-1{
                    display: flex !important;
                    flex-direction: column !important;
                
                    margin-right: auto !important;
                    justify-content: center !important;
                }
                .edit button{
                width:auto;
                left:80%;
                right: 10px;
                top:200px !important;
               }

            }
           @media screen and (max-width:1300px){
               .sub-1{
                margin-left: auto;
                margin-right: auto;
                width: 100%;
               }
               .image{
                margin-top: 80px;
              width:55%;
               margin-left: auto;
                margin-right: auto;
               }
               .img-content  {
                
                margin-top: 80px;
                margin-left: auto;
                margin-right: auto;

               }
               .edit button{
                width:auto;
                left:80%;
                right: 10px;
                
               }
                .sub-content{
                    overflow: hidden;
                } 
             
                #Ingredients{
                    display: flex;
                    flex-direction:column;
                    flex-wrap: wrap;
                    height:650px;
               
                    gap:5px;
                    margin-left: auto;
                    margin-right: auto;
                }
                #Directions{
                    margin-left: 20%;
                    margin-right: auto;
                  
                }
            }
            
            @media screen and (min-width:400px) and (max-width:768px){ 
               .sub-1{
                    display: flex;
                    flex-direction: column;
                    margin-left: -70px;
                    margin-right: auto;
                }
                .image{
                    justify-content: center;
                    margin-right: auto;
                    margin-left: auto;
                }
                .img-content{
                    margin-top: -150px;
                    margin-left: 150px;
                    margin-right: auto;
                }
                .sub-2{
                    margin-top: 20px;
                    margin-left: -50px;
                }
              
            }
             
            @media screen and (min-width:400px) and (max-width:483px){
                .img-content{
                    margin-left: 80px;
                }
                #Ingredients{
                    padding:20px;
                    margin-right: 20px;
                    margin-left: 50px;
                    width:auto;
                    overflow-y: scroll;
                }
                #Directions{
                    padding:20px;
                    width: 100%;
                }
                                
            }
             
            @media screen and (max-width:400px){
                .sub-1{
                    display: flex;
    flex-direction: column;
   
    margin-right: auto;
    justify-content: center;
                }
                .image{
                    margin-top: -10px;
                    position: absolute;
                    width:100%;
                }
                .img-content{
                    margin-top:60%;
                    justify-content: center;
                }
                .img-content h1{
                    width:100%;
                    margin-right: 130px;
                }
                .image-2{
                    width:41%;
                }
                .image img{
                  width: 100%;
                  margin-left: 10px;
                }
                .tab{
                    margin-top: 20px;
                    justify-content: center;
                }
                #Ingredients{
                    padding:20px;
                    margin-right: 20px;
                    width:auto;
                    overflow-y: scroll;
                }
                #Directions{
                    width:100%;
                }
            }
            

        </style>
    </head>
    <body>
        <div class="main-content">
            <div class="sub-content">
               <div class="sub-1">
                <div class="edit">
                    <button>Edit</button>
                </div>
               <div class="img-main">    
                    <div class="image">
                        <img src="<?=$DEFAULT_PATH?>assets/images/recipe_detail.svg">
                        <div class="image-2">
                            <img src="<?=$DEFAULT_PATH?>assets/images/time-2.svg" style="width:20px; height: 20px; align-items:center;">
                            <p> 20 min</p>
                        </div>
                    </div>
                </div>
                    <div class="img-content">
                        <h1>Recipe Name</h1>
                        <div class="img-sub-content">
                            <h3>298</h3> <p>Calories</p>                      
                            <h3>10g</h3><p>Protein</p>
                            <h3>4g</h3><p>Fats</p>
                            <h3>54</h3><p>Carbs</p>
                        </div>
                    </div>
                </div>
                <div class="sub-2">
                    <div class="tab">
                        <button class="tablinks active" onclick="openTab(event, 'Ingredients')" >Ingredients</button>
                        <button class="tablinks" onclick="openTab(event, 'Directions')">Directions</button>
                    </div>
                
                    <div id="Ingredients" class="tabcontent">
                        <div class="ing">
                            <img src="<?=$DEFAULT_PATH?>assets/images/flour.svg">
                            <h4>All Purpose Flour</h4>
                            <p>1 Cup</p>
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="ing">
                            <img src="<?=$DEFAULT_PATH?>assets/images/salt.svg">
                            <h4>Salt</h4>
                            <p>1/4 tbsp</p>
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                   
                        <div class="ing">
                            <img src="<?=$DEFAULT_PATH?>assets/images/sugar.svg">
                            <h4>Sugar</h4>
                            <p>2 tbsp</p>
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                   
                        <div class="ing">
                            <img src="<?=$DEFAULT_PATH?>assets/images/oil.svg">
                            <h4>Cooking Oil</h4>
                            <p></p>
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="ing">
                            <img src="<?=$DEFAULT_PATH?>assets/images/flour-2.svg">
                            <h4>Whole Wheat Flour</h4>
                            <p>2/3 Cup</p>
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                   
                        <div class="ing">
                            <img src="<?=$DEFAULT_PATH?>assets/images/b-powder.svg">
                            <h4>Baking Powder</h4>
                            <p>21/2 tbsp</p>
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                   
                            <div class="ing">
                                <img src="<?=$DEFAULT_PATH?>assets/images/milk.svg">
                                <h4>Milk</h4>
                                <p>11/2 Cup</p>
                                <label class="checkbox-container" >
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                    
                    </div>

                    <div id="Directions" class="tabcontent">
                        <ul>
                            <li><span>In a large bowl, mix all-purpose flour, whole wheat flour, salt, baking powder and sugar.</span></li>
                            <li><span>Stir in milk bananas just until moistered.</span></li>
                            <li><span>Heat a lightly oiled griddle or frying pan over medium high heat.</span></li>
                            <li><span>Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake.</span></li>
                            <li><span>Brown on both sides and serve hot.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        </script>
 <?php require('constant/scripts.php');?>
    </body>
</html>