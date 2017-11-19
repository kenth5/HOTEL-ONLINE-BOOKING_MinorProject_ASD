<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
</head>
<body>
    
                    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
  <script>
    var table = document.getElementById('tableID'),
  cells = table.getElementsByTagName('td');

for (var i = 0, len = cells.length; i < len; i++) {
  cells[i].onclick = function() {
    console.log(this.innerHTML);
  };
}
    </script>

<table id="tableID">
  <thead>
    <tr>
      <th>Column heading 1</th>
      <th>Column heading 2</th>
      <th>Column heading 3</th>
      <th>Column heading 4</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>43</td>
      <td>23</td>
      <td>89</td>
      <td>5</td>
    </tr>
    <tr>
      <td>4</td>
      <td>3</td>
      <td>0</td>
      <td>98</td>
    </tr>
    <tr>
      <td>10</td>
      <td>32</td>
      <td>7</td>
      <td>2</td>
    </tr>
  </tbody>
</table>
</body>
</html>