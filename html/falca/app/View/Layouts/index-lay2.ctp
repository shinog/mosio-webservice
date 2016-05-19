<?php echo $this->element('header'); ?>


<div class="container-fluid header">
  <div class="row img-desc">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0">
      <h1 class="text-center header-desc">さあ、からだを動かそう</h1>
    </div>
   <br>
   <br>
  </div>
    <div class="row text-center header-search">
          <form class="navbar-form navbar-left" role="search"  method="post" action="http://liveself.me/search/geo-done.php">
        <div class="form-group">
          <input type="text"  name="name" class="form-control" placeholder="どちらにお住まいですか?">
<select name="purpose">

<option value="weight">痩せたい</option> <option value="train">鍛えたい</option> <option value="stress">ストレス発散したい</option> <option value="exercise">健康を保ちたい</option>
</select>
        </div>
        <button type="submit" class="btn btn-default">検索</button>
      </form>
  </div>
</div>
  <hr>
  <hr>

<div class="container">

  <hr>
  <div class="row">
    <div class="text-justify col-sm-4"> Click here to select this<strong> column.</strong> Always place your content within a column. Columns are indicated by a dashed blue line. </div>
    <div class="col-sm-4 text-justify"> You can <strong>resize a column</strong> using the handle on the right. Drag it to increase or reduce the number of columns.</div>
    <div class="col-sm-4 text-justify"> You can <strong>offset a column</strong> using the handle on the left. Drag it to increase or reduce the offset. </div>
  </div>
  <hr>
  <div class="row">
    <div class="text-center col-md-12">
      <div class="well">
      <form>
          <input type="text" placeholder="どちらにお住まいですか?">
        <button type="submit">検索</button>
      </form></div></div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-4 text-center">
      <h4>FALCAについて</h4>
      <p>Quickly add buttons to your page by using the button component in the insert panel. </p>
    </div>
    <div class="text-center col-sm-4">
      <h4>レッスンを購入する</h4>
      <p>Using the insert panel, add labels to your page by using the label component.</p>
      </div>
    <div class="text-center col-sm-4">
      <h4>レッスンを登録する</h4>
      <p>You can also add glyphicons to your page from within the insert panel.</p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <p>Copyright &copy; 2015 FALCA, Inc. All Rights Reserved</p>
    </div>
  </div>
  <hr>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="http://liveself.me/design/index-new/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="http://liveself.me/design/index-new/js/bootstrap.js"></script>
</body>
</html>
