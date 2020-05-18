<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
    <ul class="nav nav-pills ranges">
        <li class="active"><a href="#" data-range='7'>7 Days</a></li>
        <li><a href="#" data-range='30'>30 Days</a></li>
        <li><a href="#" data-range='60'>60 Days</a></li>
        <li><a href="#" data-range='90'>90 Days</a></li>
    </ul>
    <div id="myfirstchart" style="height: 250px; width:400px; margin:0 auto;"></div>
    <script>
        $(function() {
          function requestData(days, chart){
            $.ajax({
              type: "GET",
              dataType: 'json',
              url: "./testchart", 
              data: { days: days }
            })
            .done(function( data ) {
              chart.setData(data);
            })
            .fail(function() {
              alert( "error occured" );
            });
          }       
          var chart = new Morris.Line({
            element: 'myfirstchart',
            data: [0, 0], 
            xkey: 'date', 
            ykeys: ['value'], 
            labels: ['Orders']
          });
            requestData(7, chart);
        
          $('ul.ranges a').click(function(e){
            e.preventDefault();
            var el = $(this);
            days = el.attr('data-range');
            requestData(days, chart);
          })
        });
    </script>

    
</body>
</html>