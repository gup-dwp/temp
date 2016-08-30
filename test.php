<??>
<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('visualization','1', {packages: ['corechart','line']});
google.charts.setOnLoadCallback(runQueries);

function runQueries() {
  var spreadsheetKey = "19Uc0FgtNDp9EfFhiHZJHG0ax8ZCtdvxSkbZryiOxSKo&gid=1690305366";

  var getSessionsToComplete = new google.visualization.Query('http://spreadsheets.google.com/tq?key='+spreadsheetKey+'&range=D17:F17');
//  getSessionsToComplete.send(drawSessionsToComplete);

  var getCompletionRate = new google.visualization.Query('http://spreadsheets.google.com/tq?key='+spreadsheetKey+'&range=H4:L6');
//  getCompletionRate.send(drawCompletionRate);

  var getCompletionTime = new google.visualization.Query('http://spreadsheets.google.com/tq?key='+spreadsheetKey+'&range=O3:Q5');
  getCompletionTime.send(drawCompletionTime);
}

function getTimes(time) {
    var hours     = time[0] > 0 ? time[0] + 'h' : '',
        minutes   = time[1] + 'm',
        seconds   = time[2] + 's',
        totalTime = hours + ' ' + minutes + ' ' + seconds;
        return totalTime;
  }

  function getChangeTimes(time) {
    var time = time.replace("-","").split(":"),
        hours = parseInt(time[0]) > 0 ? parseInt(time[0]) + 'h' : '',
        minutes = parseInt(time[1]) > 0 ? parseInt(time[1]) + 'm' : '',
        seconds = parseInt(time[2]) > 0 ? parseInt(time[2]) + 's' : '',
        totalTime = hours + ' ' + minutes + ' ' + seconds;
        return totalTime.trim();
  }
function drawCompletionTime (response) {
    var getData            = response.getDataTable(response),
        timePip1           = getData.getValue(0,0),
        timePip2           = getData.getValue(1,0),
        timeTotal          = getData.getValue(2,0),
        changeTimePip1     = getData.getFormattedValue(0,1),
        changeTimePip2     = getData.getFormattedValue(1,1),
        changeTimeTotal    = getData.getFormattedValue(2,1),
        changePercentPip1  = getData.getValue(0,2),
        changePercentPip2  = getData.getValue(1,2),
        changePercentTotal = getData.getValue(2,2),
        arrowPip1          = changePercentPip1 > 0 ? 'increase' : 'decrease',
        arrowPip2          = changePercentPip2 > 0 ? 'increase' : 'decrease',
        arrowTotal         = changePercentTotal > 0 ? 'increase' : 'decrease';

    $('#stat-4').append('<h3 class="heading-xlarge">' + getTimes(timePip1) + '</h3>'+
      '<p><span class="' + arrowPip1 + '"></span>' + getChangeTimes(changeTimePip1) + ' ' + arrowPip1 + '</p>');
    $('#stat-5').append('<h3 class="heading-xlarge">' + getTimes(timePip2) + '</h3>'+
      '<p><span class="' + arrowPip2 + '"></span>' + getChangeTimes(changeTimePip2) + ' ' + arrowPip2 + '</p>');
    $('#stat-6').append('<h3 class="heading-xlarge">' + getTimes(timeTotal) + '</h3>'+
      '<p><span class="' + arrowTotal + '"></span>' + getChangeTimes(changeTimeTotal) + ' ' + arrowTotal + '</p>');
  }


</script>
<?
?>


    <div class="grid-row">
      <div class="column-one-third">
        <h2 class="heading-medium heading-tile">PIP1 Completions</h2>
        <div id="stat-1" class="stats">
        </div>
      </div>

      <div class="column-one-third">
        <h2 class="heading-medium heading-tile">PIP2 Completions</h2>
        <div id="stat-2" class="stats">
        </div>
      </div>

      <div class="column-one-third">
        <h2 class="heading-medium heading-tile">Sessions to Complete</h2>
        <div id="stat-3" class="stats">
        </div>
      </div>
    </div>

    <div class="grid-row">
      <div class="column-one-third">
        <h2 class="heading-medium heading-tile">PIP1 time to complete</h2>
        <div id="stat-4" class="stats">
        </div>
      </div>
      <div class="column-one-third">
        <h2 class="heading-medium heading-tile">PIP2 time to complete</h2>
        <div id="stat-5" class="stats">
        </div>
      </div>
      <div class="column-one-third">
        <h2 class="heading-medium heading-tile">Total time to complete</h2>
        <div id="stat-6" class="stats">
        </div>
      </div>
    </div>
