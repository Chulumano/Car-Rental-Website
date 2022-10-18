<?php

	// connect with database
	$conn = new PDO("mysql:host=localhost;dbname=faqdb", "root", "");

	// fetch all FAQs from database
	$sql = "SELECT * FROM faqs";
	$statement = $conn->prepare($sql);
	$statement->execute();
	$faqs = $statement->fetchAll();

	

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!-- apply some styles -->
<style>

	
	.accordion_one .panel-group {
	    border: 1px solid #f1f1f1;
	    margin-top: 100px
	}
	a:link {
	    text-decoration: none
	}
	.accordion_one .panel {
	    background-color: transparent;
	    box-shadow: none;
	    border-bottom: 0px solid transparent;
	    border-radius: 0;
	    margin: 0
	}
	.accordion_one .panel-default {
	    border: 0
	}
	.accordion-wrap .panel-heading {
	    padding: 0px;
	    border-radius: 0px
	}
	h4 {
	    font-size: 18px;
	    line-height: 24px
	}
	.accordion_one .panel .panel-heading a.collapsed {
	    color: #999999;
	    display: block;
	    padding: 12px 30px;
	    border-top: 0px
	}
	.accordion_one .panel .panel-heading a {
	    display: block;
	    padding: 12px 30px;
	    background: #fff;
	    color: #313131;
	    border-bottom: 1px solid #f1f1f1
	}
	.accordion-wrap .panel .panel-heading a {
	    font-size: 14px
	}
	.accordion_one .panel-group .panel-heading+.panel-collapse>.panel-body {
	    border-top: 0;
	    padding-top: 0;
	    padding: 25px 30px 30px 35px;
	    background: #fff;
	    color: #999999
	}
	.img-accordion {
	    width: 81px;
	    float: left;
	    margin-right: 15px;
	    display: block
	}
	.accordion_one .panel .panel-heading a.collapsed:after {
	    content: "\2b";
	    color: #999999;
	    background: #f1f1f1
	}
	.accordion_one .panel .panel-heading a:after,
	.accordion_one .panel .panel-heading a.collapsed:after {
	    font-family: 'FontAwesome';
	    font-size: 15px;
	    width: 36px;
	    line-height: 48px;
	    text-align: center;
	    background: #F1F1F1;
	    float: left;
	    margin-left: -31px;
	    margin-top: -12px;
	    margin-right: 15px
	}
	.accordion_one .panel .panel-heading a:after {
	    content: "\2212"
	}
	.accordion_one .panel .panel-heading a:after,
	.accordion_one .panel .panel-heading a.collapsed:after {
	    font-family: 'FontAwesome';
	    font-size: 15px;
	    width: 36px;
	    height: 48px;
	    line-height: 48px;
	    text-align: center;
	    background: #F1F1F1;
	    float: left;
	    margin-left: -31px;
	    margin-top: -12px;
	    margin-right: 15px
	}
</style>
    <title>CustomerCare</title>

<!-- include CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />

<!-- nav bar -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- include JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<!-- nav bar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>


<body>
      <!-- nav bar -->
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Ready Online Rentals</a>
            </div>
					<ul class="nav navbar-nav">
						<li><a href="#">Home</a></li>
							<li><a href="#">Cart</a></li>
								<li><a href="#">Contact us</a></li>
									<li><a href="#">Showroom</a></li>
									<li><a href="#">CustomerCare</a></li>
									</ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Register</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

	<h1>CustomerCare : Frequently Asked Questions</h1>
	
	<div class="container">
        <div class="header">
            <h4>Submit your questions</h4>
        </div>

        <form action="connect.php" method="post" class="form" id="form">
            <div class="form-control ">
                <label for="question">Question</label>
                <input id="question" name="question" type="text" placeholder="Enter your Question">
            </div>
			<br>
            <input id="button" type="submit" name="Post" value="Post">
            
        </form>
    </div>
         
<!-- show all FAQs in a panel -->
<!-- <div class="container" style="margin-top: 50px; margin-bottom: 50px;"> -->
	<div class="row">
		<div class="col-md-12 accordion_one">
		    <div class="panel-group">
		    	<?php foreach ($faqs as $faq): ?>
			        <div class="panel panel-default">

			        	<!-- button to show the question -->
			            <div class="panel-heading">
			                <h4 class="panel-title">
			                	<a data-toggle="collapse" data-parent="#accordion_oneLeft" href="#faq-<?php echo $faq['id']; ?>" aria-expanded="false" class="collapsed">
			                		<?php echo $faq['question']; ?>
			                	</a>
			                </h4>
			            </div>

			            <!-- accordion for answer -->
			            <div id="faq-<?php echo $faq['id']; ?>" class="panel-collapse collapse" aria-expanded="false" role="tablist" style="height: 0px;">
			                <div class="panel-body">
			                	<div class="text-accordion">
			                        <?php echo $faq['answer']; ?>
			                    </div>
			                </div>
			            </div>
			        </div>
		        <?php endforeach; ?>
		    </div>
		</div>
	</div>
<!-- </div> -->

</body>

</html>