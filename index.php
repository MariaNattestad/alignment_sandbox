<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Play with alignments">
      <meta name="author" content="Maria Nattestad">
      
      <title>Alignment Sandbox</title>
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap theme -->
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      
      <link href="css/bootstrap-switch.min.css" rel="stylesheet">
      <link href="css/theme.css" rel="stylesheet">
      <link rel="icon" type="image/png" href="bucket13.png"/>
      <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 100px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }
      .jumbotron {
          background-color:#5cb85c;
          color:#fff;
      }
      .colorful1 {
        background-color:#7C53CF;
        color:#fff;
      }
      .colorful2 {
        background-color:#f0ad4e;
        color:#fff;
      }
      .colorful3 {
        background-color:#d9534f;
        color:#fff;
      }
      #results_well {
        background:#5bc0de;
      }
    </style>

      
      <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"> -->
     
   </head>
   <body role="document">
    <div id="wrap">
      <div class="container theme-showcase" role="main">
     <div class="jumbotron" >
        <h1>Alignment Sandbox</h1>
        <p>Play with it!</p>
     </div>
     <div class="page-header" >
        <h1>Input</h1>
     </div>
     <div class="row" >
        <div class="col-lg-14">
           <form action="" method="post">
           <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon colorful1">Sequence 1</span>
             <input type="text" name="seq1" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['seq1']));} else {echo "TGTAGTACCTATTTCAGGAATTTCTATAAACACTCTCACATAAGATGATCTGCAAACTCATCTGAGCTTTGG";} ?> >
        
          </div>
        </p>
              <p>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon colorful1" >Sequence 2</span>
                     <input type="text" name="seq2" class="form-control" value = <?php if (!empty($_POST)) {
                     echo strtoupper(escapeshellcmd($_POST['seq2']));} else {echo "TAAAAGAAATAGGGTCTTGCTTTGTCATTTCATTAACATATATAATAAGGCACTTTCCTTAAATGAATATTCTT";} ?> >
                     
                  </div>
              </p>


              <p>
              <div class="input-group input-group-lg">
                <span class="input-group-addon colorful2">Match score</span>
                 <input type="number" min="0" name="match" class="form-control" value = <?php if (!empty($_POST)) {
                 echo strtoupper(escapeshellcmd($_POST['match']));} else {echo "2";} ?> >
                 
              </div>
              </p>


             <p>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon colorful2">Mismatch penalty</span>
                   <input type="number" min="0" name="mismatch" class="form-control" value = <?php if (!empty($_POST)) {
                   echo strtoupper(escapeshellcmd($_POST['mismatch']));} else {echo "1";} ?> >
                  
                </div>
                </p>
       <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon colorful3">Gap start penalty</span>
             <input type="number" min="0" name="gap_start" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['gap_start']));} else {echo "1";} ?> >
            
          </div>
          </p>
       <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon colorful3">Gap extend penalty</span>
             <input type="number" step="1" min="0" name="gap_extend" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['gap_extend']));} else {echo "1";} ?> >
             
          </div>
          </p>


          <p>
          <div class="input-group input-group-lg">
            <span class="input-group-addon colorful3">Gap decay</span>
             <input type="number" step="0.01" name="gap_decay" class="form-control" value = <?php if (!empty($_POST)) {
             echo strtoupper(escapeshellcmd($_POST['gap_decay']));} else {echo "0";} ?> >
             
          </div>
          </p>


          <p>
            <input type="checkbox" data-size="large" name="global" data-on-text="Global" data-off-text="Local" value="-global" <?php if (!empty($_POST)) { if (!empty($_POST['global'])) { echo "checked"; };} else { echo "checked";}  ?> >
          </p>
          <p>Gap decay above 0 must be used with local alignment only</p>
          <button class="btn btn-primary btn-lg" type="submit">Start!</button>
           </form>
        </div>
     </div>
     <div class="page-header">
        <h1>Results</h1>
     </div>
     <div class="row">
        <div class="col-lg-14">
           <div class="well well-lg" id="results_well">
            <samp ><pre><?php if (!empty($_POST)) {
             $global=" ";
             if (!empty($_POST['global'])) {  $global = escapeshellcmd($_POST['global']);};
             if ($global=="-global") {echo "Global alignment\n__________________\n\n";} else {echo "Local alignment\n__________________\n\n";};
             $seq1 = escapeshellcmd($_POST['seq1']);
             $seq2 = escapeshellcmd($_POST['seq2']);
             $match = escapeshellcmd($_POST['match']);
             $mismatch = escapeshellcmd($_POST['mismatch']);
             $gap_start = escapeshellcmd($_POST['gap_start']);
             $gap_extend = escapeshellcmd($_POST['gap_extend']);
             $gap_decay = escapeshellcmd($_POST['gap_decay']);
             
echo shell_exec('swalign-master/bin/swalign -wrap 100 "'.$seq1.'" "'.$seq2.'" -m "'.$match.'" -mm "'.$mismatch.'" -gap "'.$gap_start.'" -gapext "'.$gap_extend.'" "'.$global.'" -gapdecay "'.$gap_decay.'" ');
             }
             ?></pre></samp>
           </div>
        </div>
     </div>

</div>
</div> 

<div id="push"></div>
   
    <div id="footer">
      <div class="container">
        <p class="muted credit">
            <div class="bs-docs-social"> 
          <a href="https://twitter.com/intent/tweet?button_hashtag=AlignmentSandbox" class="twitter-hashtag-button" data-related="marianattestad" data-url="http://qb.cshl.edu/alignmentsandbox">Tweet #AlignmentSandbox</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </div>
            <p>Built by Maria Nattestad. <a href="http://twitter.com/marianattestad">@marianattestad</a>
            </p><p>Alignments by <a href="https://github.com/mbreese/swalign"> swalign </a></p>
    
      </div> 
</div>  

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="bootstrap-switch.min.js"></script>
      <script> $("[name='global']").bootstrapSwitch(); </script>
   </body>
</html>






