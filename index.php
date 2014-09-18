<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>Alignment Sandbox</title>
      <!-- Bootstrap core CSS -->
      <link href="bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap theme -->
      <link href="bootstrap-theme.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="theme.css" rel="stylesheet">
      <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"> -->
	 
   </head>
   <body role="document">
      <div class="container theme-showcase" role="main">
	 <div class="jumbotron">
	    <h1>Alignment Sandbox</h1>
	    <p>Play with it!</p>
	 </div>
	 <div class="page-header">
	    <h1>Input</h1>
	 </div>
	 <div class="row">
	    <div class="col-lg-14">
	       <form action="" method="post">
		   <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Sequence 1</span>
		     <input type="text" name="seq1" class="form-control" value = <?php if (!empty($_POST)) {
		     echo strtoupper(escapeshellcmd($_POST['seq1']));} else {echo "GATTTACA";} ?> >
        
          </div>
      </p>
          <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Sequence 2</span>
             <input type="text" name="seq2" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['seq2']));} else {echo "GATACA";} ?> >
             
          </div>
      </p>
       <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Mismatch penalty</span>
             <input type="text" name="mismatch" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['mismatch']));} else {echo "1";} ?> >
            
          </div>
          </p>
       <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Gap start penalty</span>
		     <input type="text" name="gap_start" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['gap_start']));} else {echo "1";} ?> >
            
          </div>
          </p>
       <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Gap extend penalty</span>
             <input type="text" name="gap_extend" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['gap_extend']));} else {echo "1";} ?> >
             
          </div>
          </p>
       
          

		 
		  <span class="input-group-btn"><button class="btn btn-primary" type="submit">Start!</button></span>
	       </form>
	    </div>
	 </div>
	 <div class="page-header">
	    <h1>Results</h1>
	 </div>
	 <div class="row">
        <div class="col-lg-14">
           <div class="well well-lg"> <p class="text-area">
		  <?php if (!empty($_POST)) {
		     $seq1 = escapeshellcmd($_POST['seq1']);
             $seq2 = escapeshellcmd($_POST['seq2']);
             $mismatch = escapeshellcmd($_POST['mismatch']);
             $gap_start = escapeshellcmd($_POST['gap_start']);
             $gap_extend = escapeshellcmd($_POST['gap_extend']);
		     
             echo nl2br(shell_exec('./align "'.$seq1.'" "'.$seq2.'" "'.$mismatch.'" "'.$gap_start.'" "'.$gap_extend.'"'));
		     }
		     ?>
		     </p>
	       </div>
	    </div>
	 </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
   </body>
</html>






