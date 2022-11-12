<!DOCTYPE html>
<html>
<title>Guardian Associate</title>
<head>
	<title>Guardian Associate</title>
	<link rel="stylesheet" type="text/css" href="inc/css/style.css"></head>
<body>
	<header>
		<div id="logo">
			<div class="shop">
			Guardian Associate
			</div>
		</div>
	 
        <div id="search-bar">
    Search  <input type="text" id="search"  autocomplete="off" placeholder="Date,Name,CNIC">
  </div>
        <div id='error-message'></div>
        <div id='success-message'></div>
<style>

.ul {
        padding: 0;
        list-style: none;
        /* background: #f2f2f2; */
		background-color: #566c2b;
    }
    ul li {
        display: inline-block;
        position: relative;
        line-height: 21px;
        text-align: left;
    }
    ul li a {
        display: block;
        padding: 8px 25px;
        color: #333;
        text-decoration: none;
    }
    ul li a:hover {
        color: #fff;
        background: #939393;
    }
    ul li ul.dropdown {
        min-width: 100%; /* Set width of the dropdown */
        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown {
        display: block; /* Display the dropdown */
    }
    ul li ul.dropdown li {
        display: block;
    }
</style>
    <ul class="menu">
        <li>
            <a href="#">Menu▾</a>
            <ul class="dropdown">
                <li><a href="#" class="setting">Password Change</a></li>
                <li><a href="http://localhost/map/index.php">Logout</a></li>

				<!-- <li><a href="<?=$baseurl?>/logout.php">Logout</a></li> -->

				
			</li>
            </ul>
        </li>
    </ul>
	</header>


    <!-- preventBack home page  -->

	<script type="text/javascript">
  function preventBack(){window.history.forward()};
  setTimeout("preventBack()");
        window.onunload=function(){null;}
        </script>