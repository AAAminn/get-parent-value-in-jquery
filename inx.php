<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Admin Panel</title>
</head>
<style>

    table, th, td {
        border: 1px solid black;
    }
</style>
<script type="text/javascript">

  function Edit_Sub_Save(ColEdit) {
    console.log(ColEdit);
  }
  function EditWithId(id) {
    var ColArrVal = [];
    var ColNameArray = [];
    var elem = $("#" + id).parent().parent().parent();
    console.log(elem[0]);
    var SelectRowsClassName = (elem[0].className);
    var ColNameArray = [];
    var Columns = $('#ColName').text();
    Columns = Columns.replace(' ', '');
    Columns = Columns.replace(/[\t\n]+/g, '');
    var Arr = Columns.split(' ');
    ColNameArray = $.map(Arr, function (v) {
      return v === "" ? null : v;
    });
    var ColNameArray = ColNameArray.slice(0, -1);
    var ColEdit = {}
    $("#mytable tbody tr[class=" + SelectRowsClassName + "] td  input").change(function (e) {
      ColArrVal[ColNameArray[e.target.dirName]] = e.target.value;
      ColEdit[id] = ColArrVal;
      console.log(ColEdit);
    });
    var elemb = document.getElementById(id);
    elemb.innerHTML = ('Save');
    elemb.className = 'Edt';
    elemb.setAttribute('onclick', 'EditSubSave(' + ColEdit + ')');
  }

  function DeleteWithId(id) {
    if (id.length === 0) {
      alert(' This Rows Can not Edit ');
    }
    else {
      $("#" + id).parent().parent().parent()[0].remove();
    }
  }
</script>
<body>
<div class="row">
    <button type="button" style="float:right;margin-bottom: 10px;"
            class="btn btn-info " onclick="AddRow()">Add Employee
    </button>
    <button type="button" style="float:right;margin-bottom: 10px;"
            class="btn btn-info " onclick="sort()">sort
    </button>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered">
                <thead class="ColumnsName" id="ColName">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>btn</th>
                </tr>
                </thead>
                <tbody>
                <tr class="1">
                    <td><input dirname="0" value="1"></td>
                    <td><input dirname="1" value="Amin"></td>
                    <td><input dirname="2" value="Shz"></td>
                    <td>
                        <div class="buttons">
                            <button id="1" onclick="EditWithId(this.id)">
                                Edit
                            </button>
                            <button id="1" class="btn btn-danger"
                                    onclick="DeleteWithId(this.id)">Delete
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="2">
                    <td><input dirname="0" value="2"></td>
                    <td><input dirname="1" value="Mrz"></td>
                    <td><input dirname="2" value="Shz"></td>
                    <td>
                        <div class="buttons">
                            <button id="2" onclick="EditWithId(this.id)">
                                Edit
                            </button>
                            <button id="2" class="btn btn-danger"
                                    onclick="DeleteWithId(this.id)">Delete
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="Submit">
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div>
    <div id="response"></div>
</div>
</body>
</html>
