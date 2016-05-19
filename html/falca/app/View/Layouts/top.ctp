<?php echo $this->element('header'); ?>

<?php 
                    $user = AuthComponent::user('which');
					
					$photo = AuthComponent::user('photo');
					
if($user != '' && $photo == ''){
?>
       <div class="container-fluid">
            <div class="row">
                
                    <h3 class="text-center"><a href="/falca/users/edit"><div id="flashMessage" class="urge">プロフィールを充実させよう。</div></a></h3>
               
            </div>
        </div>
<?php
}
?>

<div class="container-fluid header">
  <div class="row img-desc">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center header-desc">さあ、からだを動かそう</h1>
    </div>
   <br>
   <br>
  </div>
    <div class="row text-center header-search">
          <form class="navbar-form navbar-left" role="search"  method="post" action="http://www.mosio.me/else/geo-done-aws.php">
        <div class="form-group">
          <input type="text"  name="name" class="form-control" placeholder="どちらにお住まいですか?">
<select name="purpose">

<option value="all">目的</option> <option value="weight">痩せたい</option> <option value="train">鍛えたい</option> <option value="stress">ストレス発散したい</option> <option value="exercise">健康を保ちたい</option>
</select>

<select name="category">

<option value="all">ジャンル</option> <option value="bodymake">ボディメイク</option> <option value="diet">ダイエット</option> <option value="fasting">ファスティング</option> <option value="recovery">カラダ回復</option> <option value="yoga">ヨガ</option> <option value="pilates">ピラティス</option> <option value="activity">アクティビティ</option> <option value="food">フード</option>
</select>
        </div>
        <button type="submit" class="btn btn-default">検索</button>
      </form>
  </div>
</div>
 

<div class="container">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">エリア</h1>
    </div>
  </div>
  
  <div class="row">
    <a href="http://www.mosio.me/falca/items/maps?lat=35.0212466&lng=135.7555968&purp=all">
    <div class="text-justify col-sm-8 kyoto">
    <h6 class="text-center area-desc">京都</h6>
     </div>
	 </a>
	<a href="http://www.mosio.me/falca/items/maps?lat=34.6862971&lng=135.5196609&purp=all"> 
    <div class="text-justify col-sm-8 osaka">
    <h6 class="text-center area-desc">大阪</h6>
     </div>
	 </a>
    </div>
    
    <div class="row">
	<a href="http://www.mosio.me/falca/items/maps?lat=34.6912688&lng=135.1830706&purp=all"> 
    <div class="text-justify col-sm-8 hyogo">
    <h6 class="text-center area-desc">兵庫</h6>
     </div>
	 </a>
	<a href="http://www.mosio.me/falca/items/maps?lat=35.6894875&lng=139.6917064&purp=all">  
    <div class="text-justify col-sm-8 tokyo">
    <h6 class="text-center area-desc">東京</h6>
     </div>
	 </a>
    </div>
    
        <div class="row">
	<a href="http://www.mosio.me/falca/items/maps?lat=34.3965603&lng=132.4596225&purp=all"> 	
    <div class="text-justify col-sm-8 hiroshima">
    <h6 class="text-center area-desc">広島</h6>
     </div>
	 </a>
	<a href="http://www.mosio.me/falca/items/maps?lat=33.6065756&lng=130.4182970&purp=all">  
    <div class="text-justify col-sm-8 hukuoka">
   <h6 class="text-center area-desc">福岡</h6>
     </div>
	 </a>
    </div>
	
	<br/>
    <br/>    
    <div class="row text-center">
    <a href="http://www.mosio.me/falca/abouts/"><button type="button" class="btn btn-lg btn-default">mosioについて</button></a>
    </div>
    
	</div>
    
  <hr>
  
 <?php echo $this->element('footer'); ?>